<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentProfile;
use App\Models\Year;
use Illuminate\Http\Request;
 use Illuminate\Pagination\LengthAwarePaginator;

class SemesterController extends Controller
{
    public function index()
    {
        $schoolYears = SchoolYear::with('semesters')->orderByDesc('is_active')->orderByDesc('id')->get();
        $activeSchoolYear = SchoolYear::where('is_active', true)->with('semesters')->first();
        $activeSemester = Semester::where('is_current', true)->first();

        // Check if students already validated in this active semester
        $hasStudents = $activeSemester 
            ? StudentProfile::where('semester_id', $activeSemester->id)->exists() 
            : false;

        return view('semester.index', compact('schoolYears', 'activeSchoolYear', 'activeSemester', 'hasStudents'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'semester' => 'required|string|in:1st,2nd,Summer',
        'is_current' => 'nullable|boolean', // added this to get the checkbox
    ]);

    $activeSchoolYear = SchoolYear::where('is_active', true)->first();

    if (!$activeSchoolYear) {
        return back()->withErrors(['No active School Year found. Please create one first.']);
    }

    if (Semester::where('school_year_id', $activeSchoolYear->id)
                ->where('semester', $validated['semester'])->exists()) {
        return back()->withErrors(['This semester already exists for this School Year.']);
    }

    // If 'is_current' is checked, make this the current semester and deactivate the others
    $isCurrent = $request->has('is_current') ? true : false;

    if ($isCurrent) {
        // Deactivate other semesters in this School Year
        Semester::where('school_year_id', $activeSchoolYear->id)
                ->update(['is_current' => false]);
    }

    $newSemester = Semester::create([
        'school_year_id' => $activeSchoolYear->id,
        'semester' => $validated['semester'],
        'is_current' => $isCurrent,
    ]);

    return redirect()->route('semester.index')->with('success', 'New Semester created.');
}


    public function storeSchoolYear(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $startYear = date('Y', strtotime($validated['start_date']));
        $endYear = date('Y', strtotime($validated['end_date']));
        $schoolYearStr = $startYear . '-' . $endYear;

        if (SchoolYear::where('school_year', $schoolYearStr)->exists()) {
            return back()->withErrors(['This School Year already exists.']);
        }

        // Deactivate old school year + semesters
        $prev = SchoolYear::where('is_active', true)->first();
        if ($prev) {
            $prev->update(['is_active' => false]);
            Semester::where('school_year_id', $prev->id)->update(['is_current' => false]);
        }

        $newSchoolYear = SchoolYear::create([
            'school_year' => $schoolYearStr,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'is_active' => true,
        ]);

        // Create 1st Semester under new school year automatically
        Semester::create([
            'school_year_id' => $newSchoolYear->id,
            'semester' => '1st',
            'is_current' => true,
        ]);

        return redirect()->route('semester.index')->with('success', 'New School Year & 1st Semester created.');
    }

  

 public function validateStudentsForm(Request $request, $semesterId)
    {
        $newSemester = Semester::with('schoolYear')->findOrFail($semesterId);

        $allPreviousSemesterIds = Semester::where('id', '<', $semesterId)->pluck('id')->toArray();

        $students = Student::whereHas('profiles', function ($q) use ($allPreviousSemesterIds) {
            $q->whereIn('semester_id', $allPreviousSemesterIds);
        })
        ->with(['profiles' => function ($q) use ($allPreviousSemesterIds) {
            $q->whereIn('semester_id', $allPreviousSemesterIds);
        }])
        ->get();

        // Attach latest profile and validated flag
        $students = $students->map(function ($student) use ($newSemester) {
        $student->latestProfile = $student->profiles->sortByDesc('semester_id')->first();

        $validatedProfile = StudentProfile::where('student_id', $student->id)
            ->where('semester_id', $newSemester->id)
            ->first();

        $student->validatedProfile = $validatedProfile; // assign if exists
        $student->alreadyValidated = $validatedProfile !== null;

        return $student;
    });


        // Apply filters
        if ($request->filled('filter_course')) {
            $students = $students->filter(function ($student) use ($request) {
                return $student->latestProfile && $student->latestProfile->course === $request->filter_course;
            });
        }

        if ($request->filled('filter_year_level')) {
            $students = $students->filter(function ($student) use ($request) {
                return $student->latestProfile && $student->latestProfile->year_level === $request->filter_year_level;
            });
        }

        if ($request->filled('filter_section')) {
            $students = $students->filter(function ($student) use ($request) {
                return $student->latestProfile && $student->latestProfile->section === $request->filter_section;
            });
        }

        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $students = $students->filter(function ($student) use ($search) {
                return str_contains(strtolower($student->student_id), $search) ||
                       str_contains(strtolower($student->first_name), $search) ||
                       str_contains(strtolower($student->last_name), $search);
            });
        }

        // Paginate
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $paginated = new LengthAwarePaginator(
            $students->forPage($currentPage, $perPage),
            $students->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $courses = Course::all();
        $years = Year::all();
        $sections = Section::all();

        return view('semester.validate_students', [
            'students' => $paginated,
            'newSemester' => $newSemester,
            'courses' => $courses,
            'years' => $years,
            'sections' => $sections
        ]);
    }

    public function processValidateStudents(Request $request, $semesterId)
    {
        $validated = $request->validate([
            'selected_students' => 'required|array',
            'selected_students.*' => 'exists:students,id',
        ]);

        $studentsData = $request->input('students', []);
        $semester = Semester::findOrFail($semesterId);

        foreach ($validated['selected_students'] as $studentId) {
            if (!isset($studentsData[$studentId])) continue;

            $data = $studentsData[$studentId];

            if (empty($data['course']) || empty($data['year_level']) || empty($data['section'])) continue;

            $exists = StudentProfile::where('student_id', $studentId)
                                    ->where('semester_id', $semester->id)
                                    ->exists();
            if ($exists) continue;

            StudentProfile::create([
                'student_id'  => $studentId,
                'semester_id' => $semester->id,
                'course'      => $data['course'],
                'year_level'  => $data['year_level'],
                'section'     => $data['section'],
            ]);
        }

        return redirect()
            ->route('semester.validate', $semester->id)
            ->with('success', 'Selected students validated to the new semester.');
    }

}
