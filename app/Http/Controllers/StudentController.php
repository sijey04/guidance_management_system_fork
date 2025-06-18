<?php

namespace App\Http\Controllers;

use App\Models\contract;
use App\Models\Post;
use App\Models\semester;
use App\Models\Student;
use App\Models\StudentProfile;
use App\Models\StudentSemesterEnrollment;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $query = Student::withCount('contracts')
                        ->with(['enrollments.semester']);

        // Search (by ID, First Name, Last Name)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('student_id', 'like', "%{$search}%")
                ->orWhere('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        // Sort (by selected field)
        if ($request->filled('sort_by')) {
            $sortField = $request->input('sort_by');
            $sortDirection = $request->input('sort_direction', 'asc'); // default to 'asc'

            $query->orderBy($sortField, $sortDirection);
        }

        $students = $query->paginate(15)->appends($request->all());

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
    {   $validated = $request->validate([
    'student_id' => ['required', 'string', 'max:50', 'unique:students'],
    'first_name' => ['required', 'string', 'max:255'],
    'middle_name' => ['nullable', 'string', 'max:255'],
    'last_name' => ['required', 'string', 'max:255'],
    'birthday' => ['required', 'date'],
    'suffix' => ['nullable', 'string', 'max:10'],
    'gender' => ['nullable', 'string', 'max:10'],
    'enrollment_status' => ['nullable', 'string', 'max:50'],
    'course_year' => ['required', 'in:' . implode(',', config('student.course_years'))],
    'section' => ['required', 'in:' . implode(',', config('student.sections'))],
    'year' => ['nullable', 'integer', 'min:1'],
    'home_address' => ['nullable', 'string', 'max:255'],
    'father_occupation' => ['nullable', 'string', 'max:100'],
    'mother_occupation' => ['nullable', 'string', 'max:100'],
    'parent_guardian_name' => ['required', 'string', 'max:255'],
    'parent_guardian_contact' => ['required', 'string', 'max:255'],
    'number_of_sisters' => ['nullable', 'integer', 'min:0'],
    'number_of_brothers' => ['nullable', 'integer', 'min:0'],
    'ordinal_position' => ['nullable', 'integer', 'min:1'],
    'enrolled_semester' => ['nullable', 'string', 'max:50'],
    'enrollment_date' => ['nullable', 'date'],
    'is_enrolled' => ['required', 'boolean'],
]);


    $student = Student::create($validated);

$activeSemester = Semester::where('is_current', true)->first(); 

if (!$activeSemester) {
    return redirect()->back()->with('error', 'No active semester set. Please set an active academic year and semester first.');
}

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
public function show(Student $student)
{
    $activeSemester = Semester::where('is_current', true)->first();
    $semesters = Semester::all();

    // Get the student's profile for the active semester
    $profile = $student->profiles()
                ->where('semester_id', $activeSemester->id ?? null)
                ->first();

    // Get ALL historical profiles (for enrollment history)
    $allProfiles = $student->profiles()->with('semester')->get();

    return view('student.profile', compact('student', 'semesters', 'activeSemester', 'profile', 'allProfiles'));
}




public function enrollmentHistory(Student $student)
{
    $allProfiles = $student->profiles()
                ->with('semester')
                ->get()
                ->sortByDesc(function($profile) {
                    return ($profile->semester && $profile->semester->is_current)
                        ? 999999
                        : ($profile->semester->school_year ?? 0);
                });

    return view('student.enrollment', compact('student', 'allProfiles'));
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{

    $student = Student::findOrFail($id);
    $activeSemester = Semester::getActiveSemester();

    $currentSemester = Semester::where('is_active', true)->first();
$profile = $student->profiles()->where('semester_id', $currentSemester->id)->first();



    return view('student.editStudent', compact('student', 'profile'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $validatedStudent = $request->validate([
            'student_id' => 'required|unique:students,student_id,' . $student->id,
            'first_name' => ['required', 'string', 'max:255'], 
            'middle_name' => ['nullable', 'string', 'max:255'], // NEW
            'last_name' => ['required', 'string', 'max:255'],
           'birthday' => ['required', 'date'],
            'suffix' => ['nullable', 'string', 'max:10'], // NEW
            'gender' => ['nullable', 'string', 'max:10'],
            'enrollment_status' => ['nullable', 'string', 'max:50'], 
            'year' => ['nullable', 'integer', 'min:1'],
            'home_address' => ['nullable', 'string', 'max:255'],
            'father_occupation' => ['nullable', 'string', 'max:100'],
            'parent_guardian_name' => ['required', 'string', 'max:255'],
            'parent_guardian_contact' => ['required', 'string', 'max:255'],
            'mother_occupation' => ['nullable', 'string', 'max:100'],
            'number_of_sisters' => ['nullable', 'integer', 'min:0'],
            'number_of_brothers' => ['nullable', 'integer', 'min:0'],
            'ordinal_position' => ['nullable', 'integer', 'min:1'],
            'enrolled_semester' => ['nullable', 'string', 'max:50'],
            'enrollment_date' => ['nullable', 'date'],
        ]);

        $student->update($validatedStudent);

        
       return redirect()->route('students.profile', ['id' => $student->id])->with('success', 'Student updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }

    // app/Http/Controllers/StudentController.php

public function profile($id){
    $student = Student::findOrFail($id);
    $activeSemester = Semester::where('is_current', true)->first(); // ADD THIS LINE
    $semesters = Semester::all();
    $profile = $student->profiles()->where('semester_id', $activeSemester->id ?? null)->first();
    $allProfiles = $student->profiles()->with('semester')->get();

    return view('student.profile', compact('student', 'activeSemester', 'semesters', 'profile', 'allProfiles'));
}


//    public function enrollment($id){
//     $student = Student::findOrFail($id);
//     $semesters = Semester::all(); 
//     $allProfiles = $student->profiles()
//                 ->with('semester')
//                 ->get()
//                 ->sortByDesc(function($profile) {
//                     return ($profile->semester && $profile->semester->is_current)
//                         ? 999999 // active semester on top
//                         : ($profile->semester->school_year ?? 0);
//                 });
//     return view('student.enrollment', compact('student', 'semesters', 'allProfiles')); 
// }

public function counseling($studentId)
{
    $student = Student::with('counselings')->findOrFail($studentId);
    $counselings = $student->counselings;

    return view('student.counseling', compact('student', 'counselings'));
}





  public function showEnrollmentHistory($studentId)
{
    $student = Student::with(['enrollments.semester'])->findOrFail($studentId);

    $semesters = Semester::orderBy('school_year', 'asc')
                        ->orderBy('semester', 'asc')
                        ->get();

    $activeSemester = Semester::where('is_current', true)->first();

    $allProfiles = $student->profiles()
                ->with('semester')
                ->get()
                ->sortByDesc(function($profile) {
                     return ($profile->semester && $profile->semester->is_current)
                         ? 999999 // active semester on top
                         : ($profile->semester->school_year ?? 0);
                 });

    return view('student.enrollment', compact('student', 'semesters', 'activeSemester', 'allProfiles'));
}



// public function enroll($studentId, $semesterId)
// {
//     $student = Student::findOrFail($studentId);

//     // Check if already enrolled
//     $enrollment = StudentSemesterEnrollment::firstOrCreate(
//         ['student_id' => $studentId, 'semester_id' => $semesterId],
//         ['is_enrolled' => true]
//     );

//     // If found but marked unenrolled, update it
//     if (!$enrollment->wasRecentlyCreated) {
//         $enrollment->update(['is_enrolled' => true]);
//     }

//     return redirect()->back()->with('success', 'Student enrolled successfully.');
// }

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

public function enrollAll()
{
    $activeSemester = Semester::where('is_current', true)->first();

    if (!$activeSemester) {
        return redirect()->back()->with('error', 'No active semester set.');
    }

    $students = Student::all();

    foreach ($students as $student) {
        // Check if already enrolled for this semester
        $existing = StudentSemesterEnrollment::where('student_id', $student->id)
                    ->where('semester_id', $activeSemester->id)
                    ->first();

        if (!$existing) {
            StudentSemesterEnrollment::create([
                'student_id' => $student->id,
                'semester_id' => $activeSemester->id,
                'is_enrolled' => true,
            ]);
        } else {
            $existing->update(['is_enrolled' => true]);
        }
    }

    return redirect()->back()->with('success', 'All students enrolled for the active semester.');
}

public function unenrollAll()
{
    $activeSemester = Semester::where('is_current', true)->first();

    if (!$activeSemester) {
        return redirect()->back()->with('error', 'No active semester set.');
    }

    StudentSemesterEnrollment::where('semester_id', $activeSemester->id)
        ->update(['is_enrolled' => false]);

    return redirect()->back()->with('success', 'All students unenrolled for the active semester.');
}
public function deleteAll()
{
    Student::query()->delete(); // This will hard-delete all students

    return redirect()->route('students.index')->with('success', 'All students deleted successfully.');
}

public function updateProfile(Request $request, Student $student)
{
    $request->validate([
        'course_year' => 'required|string',
        'section' => 'required|string',
    ]);

    $activeSemester = Semester::where('is_current', true)->first();

    $student->profiles()->updateOrCreate(
        ['semester_id' => $activeSemester->id],
        [
            'course_year' => $request->course_year,
            'section' => $request->section,
        ]
    );

    return redirect()->back()->with('success', 'Course Year and Section updated successfully.');
}


}