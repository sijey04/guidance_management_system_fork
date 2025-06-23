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

class SemesterController extends Controller
{
    public function index()
{
    $schoolYears = SchoolYear::with('semesters')->orderByDesc('is_active')->orderByDesc('id')->get();
    $activeSchoolYear = SchoolYear::where('is_active', true)->with('semesters')->first();
    $activeSemester = Semester::where('is_current', true)->first();

    // Check if StudentProfile exists for the new active semester
    $hasStudents = $activeSemester ? StudentProfile::where('semester_id', $activeSemester->id)->exists() : false;

    return view('semester.index', compact('schoolYears', 'activeSchoolYear', 'activeSemester', 'hasStudents'));
}




    public function store(Request $request)
    {
        $validated = $request->validate([
            'semester' => 'required|string|in:1st,2nd,Summer',
        ]);

        $activeSchoolYear = SchoolYear::where('is_active', true)->first();

        if (!$activeSchoolYear) {
            return redirect()->back()->withErrors(['Please create an active School Year first.']);
        }

        if (Semester::where('school_year_id', $activeSchoolYear->id)
                    ->where('semester', $validated['semester'])->exists()) {
            return back()->withErrors(['This semester already exists for the active School Year.']);
        }

        $isCurrent = !Semester::where('school_year_id', $activeSchoolYear->id)
                              ->where('is_current', true)->exists();

        Semester::create([
            'school_year_id' => $activeSchoolYear->id,
            'semester' => $validated['semester'],
            'is_current' => $isCurrent,
        ]);

        return redirect()->route('semester.index')->with('success', 'Semester created under active School Year.');
    }

    public function storeSchoolYear(Request $request)
{
    $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date'   => 'required|date|after:start_date',
    ]);

    $startYear = date('Y', strtotime($validated['start_date']));
    $endYear   = date('Y', strtotime($validated['end_date']));
    $schoolYearStr = $startYear . '-' . $endYear;

    if (SchoolYear::where('school_year', $schoolYearStr)->exists()) {
        return back()->withErrors(['School Year already exists.']);
    }

    // Deactivate previous School Year & Semesters
    $previousActive = SchoolYear::where('is_active', true)->first();
    if ($previousActive) {
        $previousActive->update(['is_active' => false]);
        Semester::where('school_year_id', $previousActive->id)->update(['is_current' => false]);
    }

    $newSchoolYear = SchoolYear::create([
        'school_year' => $schoolYearStr,
        'start_date'  => $validated['start_date'],
        'end_date'    => $validated['end_date'],
        'is_active'   => true,
    ]);

    
    Semester::where('is_current', true)->update(['is_current' => false]);

    Semester::create([
        'school_year_id' => $newSchoolYear->id,
        'semester'       => '1st',
        'is_current'     => true,
    ]);

    return redirect()->route('semester.index')->with('success', 'New School Year & 1st Semester created & set as active.');
}


    public function validateStudentsForm(Request $request, $semesterId)
{
    $newSemester = Semester::findOrFail($semesterId);

    // Get previous semester from a different school year
    $previousSemester = Semester::where('id', '<>', $semesterId)
                                ->where('school_year_id', '<>', $newSemester->school_year_id)
                                ->orderByDesc('id')
                                ->first();

    if (!$previousSemester) {
        return back()->with('error', 'No previous semester found.');
    }

    // Base query for students from previous semester
    $query = Student::whereHas('profiles', function ($q) use ($previousSemester) {
        $q->where('semester_id', $previousSemester->id);
    })->with(['profiles' => function ($q) use ($previousSemester) {
        $q->where('semester_id', $previousSemester->id);
    }]);

    // Apply filters if present
    if ($request->filled('filter_course')) {
        $query->whereHas('profiles', function ($q) use ($previousSemester, $request) {
            $q->where('semester_id', $previousSemester->id)
              ->where('course', $request->filter_course);
        });
    }

    if ($request->filled('filter_year_level')) {
        $query->whereHas('profiles', function ($q) use ($previousSemester, $request) {
            $q->where('semester_id', $previousSemester->id)
              ->where('year_level', $request->filter_year_level);
        });
    }

    if ($request->filled('filter_section')) {
        $query->whereHas('profiles', function ($q) use ($previousSemester, $request) {
            $q->where('semester_id', $previousSemester->id)
              ->where('section', $request->filter_section);
        });
    }

    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('student_id', 'like', '%' . $request->search . '%')
              ->orWhere('first_name', 'like', '%' . $request->search . '%')
              ->orWhere('last_name', 'like', '%' . $request->search . '%');
        });
    }

    $students = $query->paginate(10); // Pagination added

    $courses = Course::all();
    $years = Year::all();
    $sections = Section::all();

    return view('semester.validate_students', compact('students', 'newSemester', 'previousSemester', 'courses', 'years', 'sections'));
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
        if (!isset($studentsData[$studentId])) {
            continue; // Skip if no data
        }

        $data = $studentsData[$studentId];

        // Check all required fields are filled
        if (empty($data['course']) || empty($data['year_level']) || empty($data['section'])) {
            continue; // Skip incomplete input
        }

        // Prevent duplicate profiles in the new semester
        $exists = StudentProfile::where('student_id', $studentId)
                                ->where('semester_id', $semester->id)
                                ->exists();
        if ($exists) {
            continue;
        }

        // Insert new validated profile
        StudentProfile::create([
            'student_id'  => $studentId,
            'semester_id' => $semester->id,
            'course'      => $data['course'],
            'year_level'  => $data['year_level'],
            'section'     => $data['section'],
        ]);
    }

    return redirect()->route('semester.index')->with('success', 'Selected students successfully validated into the new semester.');
}
}
