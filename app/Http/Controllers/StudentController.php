<?php

namespace App\Http\Controllers;

use App\Models\contract;
use App\Models\Post;
use App\Models\semester;
use App\Models\Student;
use App\Models\StudentSemesterEnrollment;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $students = Student::withCount('contracts')
                        ->with(['enrollments.semester'])
                        ->paginate(15);

        return view('student.students', compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semesters = semester::all();
        return view('student.create', compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {$validated = $request->validate([
        'student_id' => ['required', 'string', 'max:50', 'unique:students'], // Add student_id validation
            'first_name' => ['required', 'string', 'max:255'], 
            'middle_name' => ['nullable', 'string', 'max:255'], // NEW
            'last_name' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:10'], // NEW
            'age' => ['nullable', 'integer', 'min:0'],
            'gender' => ['nullable', 'string', 'max:10'],
            'enrollment_status' => ['nullable', 'string', 'max:50'],
            'course_year' => ['nullable', 'string', 'max:100'],
            'year' => ['nullable', 'integer', 'min:1'],
            'home_address' => ['nullable', 'string', 'max:255'],
            'father_occupation' => ['nullable', 'string', 'max:100'],
            'mother_occupation' => ['nullable', 'string', 'max:100'],
            'number_of_sisters' => ['nullable', 'integer', 'min:0'],
            'number_of_brothers' => ['nullable', 'integer', 'min:0'],
            'ordinal_position' => ['nullable', 'integer', 'min:1'],
            'enrolled_semester' => ['nullable', 'string', 'max:50'],
            'enrollment_date' => ['nullable', 'date'],
            'is_enrolled' => 'required|boolean',
    ]);

    $student = Student::create($validated);

    // Create enrollment history entry based on form select box
    // StudentController.php

$activeSemester = Semester::where('is_current', true)->first(); // Changed to 'is_current'

if (!$activeSemester) {
    return redirect()->back()->with('error', 'No active semester set. Please set an active academic year and semester first.');
}

// Add enrollment record for the active semester
StudentSemesterEnrollment::create([
    'student_id' => $student->id,
    'semester_id' => $activeSemester->id,
    'is_enrolled' => $request->is_enrolled,
]);


  
    return redirect()->route('student.index')->with('success', 'Student created and enrolled in the active semester.');
    }

    /**
     * Display the specified resource.
     */
   public function show($id)
    {
        $student = Student::with('contracts')->findOrFail($id);

        $contracts = Contract::where('student_id', $id)->with('semester')->get();

        return view('student.profile', compact('student', 'contracts'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    // app/Http/Controllers/StudentController.php

public function profile($id)
    {
        $student = Student::findOrFail($id);
        return view('student.profile', compact('student'));
    }

    public function enrollment($id)
{
    $student = Student::findOrFail($id);
    $semesters = Semester::all(); 
    return view('student.enrollment', compact('student', 'semesters'));
}


    public function showEnrollmentHistory($studentId)
{
    $student = Student::with(['enrollments.semester'])->findOrFail($studentId);
    $semesters = Semester::all();

    return view('student.enrollment', compact('student', 'semesters'));
}
public function enroll($studentId, $semesterId)
{
    $student = Student::findOrFail($studentId);

    // Check if already enrolled
    $enrollment = StudentSemesterEnrollment::firstOrCreate(
        ['student_id' => $studentId, 'semester_id' => $semesterId],
        ['is_enrolled' => true]
    );

    // If found but marked unenrolled, update it
    if (!$enrollment->wasRecentlyCreated) {
        $enrollment->update(['is_enrolled' => true]);
    }

    return redirect()->back()->with('success', 'Student enrolled successfully.');
}
public function unenroll($studentId, $semesterId)
{
    $enrollment = StudentSemesterEnrollment::where('student_id', $studentId)
                                           ->where('semester_id', $semesterId)
                                           ->first();

    if ($enrollment) {
        $enrollment->update(['is_enrolled' => false]);
    }

    return redirect()->back()->with('success', 'Student unenrolled successfully.');
}

public function contract($id)
{
    $student = Student::with('contracts.semester')->findOrFail($id);
    $semesters = Semester::all(); 
    return view('student.contract', compact('student', 'semesters'));
}

}