<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::orderByDesc('is_current')
                             ->orderBy('school_year', 'desc')
                             ->orderBy('semester', 'asc')
                             ->get();

        return view('semester.index', compact('semesters'));
    }

    public function create()
    {
        return view('semester.create');
    }

 public function store(Request $request)
{
    $validated = $request->validate([
        'school_year' => 'required|string',
        'semester'    => 'required|string',
        'is_current'  => 'nullable|boolean',
        'is_active'   => 'nullable|boolean',
    ]);

    if ($request->is_current) {
        Semester::where('is_current', true)->update(['is_current' => false]);
    }

    $newSemester = Semester::create($validated);

    // Do NOT copy students automatically.
    // History of old semester is already saved.

    return redirect()->route('semester.index')->with('success', 'New semester created. Student list is currently empty.');
}

    public function activateSemester($id)
    {
        // Deactivate all
        Semester::where('id', '!=', $id)->update(['is_active' => false]);

        // Activate new semester
        $semester = Semester::findOrFail($id);
        $semester->update(['is_active' => true]);

        // Carry-over logic if needed (usually done in store)
        // Optional here - to avoid double-carry

        return redirect()->back()->with('success', 'Semester activated.');
    }

    public function carryOverProfilesToNewSemester(Semester $newSemester)
{
    $students = Student::all();

    foreach ($students as $student) {
        $latestProfile = $student->profiles()->latest('semester_id')->first();

        // Check if profile already exists for this semester
        $exists = $student->profiles()->where('semester_id', $newSemester->id)->exists();

        if (!$exists && $latestProfile) {
            $student->profiles()->create([
                'semester_id' => $newSemester->id,
                'course_year' => $latestProfile->course_year,
                'section' => $latestProfile->section,
                // also copy personal info
                'home_address' => $latestProfile->home_address,
                'father_occupation' => $latestProfile->father_occupation,
                'mother_occupation' => $latestProfile->mother_occupation,
                'parent_guardian_name' => $latestProfile->parent_guardian_name,
                'parent_guardian_contact' => $latestProfile->parent_guardian_contact,
                'number_of_sisters' => $latestProfile->number_of_sisters,
                'number_of_brothers' => $latestProfile->number_of_brothers,
                'ordinal_position' => $latestProfile->ordinal_position,
                // etc.
            ]);
        }
    }
}

// SemesterController.php

public function carryOverFromPrevious($newSemesterId)
{
    $newSemester = Semester::findOrFail($newSemesterId);

    // Get the last (most recent) semester that is not the new one
    $lastSemester = Semester::where('id', '<>', $newSemesterId)
                            ->orderByDesc('id')->first();

    if (!$lastSemester) {
        return redirect()->back()->with('error', 'No previous semester found.');
    }

    $students = Student::all();

    foreach ($students as $student) {
        $latestProfile = $student->profiles()->where('semester_id', $lastSemester->id)->first();

        if ($latestProfile) {
            // Check if profile already exists for the new semester
            $exists = $student->profiles()->where('semester_id', $newSemester->id)->exists();

            if (!$exists) {
                $student->profiles()->create([
                    'semester_id' => $newSemester->id,
                    'course_year' => $latestProfile->course_year,
                    'section' => $latestProfile->section,
                    'home_address' => $latestProfile->home_address,
                    'father_occupation' => $latestProfile->father_occupation,
                    'mother_occupation' => $latestProfile->mother_occupation,
                    'parent_guardian_name' => $latestProfile->parent_guardian_name,
                    'parent_guardian_contact' => $latestProfile->parent_guardian_contact,
                    'number_of_sisters' => $latestProfile->number_of_sisters,
                    'number_of_brothers' => $latestProfile->number_of_brothers,
                    'ordinal_position' => $latestProfile->ordinal_position,
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'Profiles carried over to the new semester.');
}
public function showValidationForm(Request $request, $semesterId)
{
    $newSemester = Semester::findOrFail($semesterId);

    $lastSemester = Semester::where('id', '<>', $semesterId)
                            ->orderByDesc('id')
                            ->first();

    if (!$lastSemester) {
        return back()->with('error', 'No previous semester found.');
    }

    $query = Student::whereHas('profiles', function($q) use ($lastSemester) {
        $q->where('semester_id', $lastSemester->id);
    })->with(['profiles' => function($q) use ($lastSemester) {
        $q->where('semester_id', $lastSemester->id);
    }]);

    // Filters from GET request
    if ($request->filled('filter_course_year')) {
        $query->whereHas('profiles', function($q) use ($lastSemester, $request) {
            $q->where('semester_id', $lastSemester->id)
              ->where('course_year', $request->filter_course_year);
        });
    }

    if ($request->filled('filter_section')) {
        $query->whereHas('profiles', function($q) use ($lastSemester, $request) {
            $q->where('semester_id', $lastSemester->id)
              ->where('section', $request->filter_section);
        });
    }

    $students = $query->get();

    $courseYears = config('student.course_years');
    $sections = config('student.sections');

    return view('semester.validate_students', compact('newSemester', 'students', 'lastSemester', 'courseYears', 'sections'));
}

public function processValidation(Request $request, $semesterId)
{
    $newSemester = Semester::findOrFail($semesterId);

    // Validate that selected_students exists and is an array
    $request->validate([
        'selected_students' => 'required|array',
        'selected_students.*' => 'exists:students,id',
    ]);

    $studentsInput = $request->input('students', []);
    $selected = $request->input('selected_students', []);

    foreach ($selected as $studentId) {
        if (!isset($studentsInput[$studentId])) {
            continue; // Skip if no data provided
        }

        $studentData = $studentsInput[$studentId];

        // Now validate manually because 'required' is removed from Blade
        if (empty($studentData['course_year']) || empty($studentData['section'])) {
            // You can skip or handle error here if fields are missing
            continue;
        }

        $student = Student::find($studentId);

        $student->profiles()->create([
            'semester_id' => $newSemester->id,
            'course_year' => $studentData['course_year'],
            'section' => $studentData['section'],
        ]);
    }

    return redirect()->route('semester.index')->with('success', 'Selected students validated successfully.');
}
}
