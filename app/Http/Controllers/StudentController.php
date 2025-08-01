<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\CounselingImage;
use App\Models\Course;
use App\Models\Post;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentProfile;
use App\Models\StudentSemesterEnrollment;
use App\Models\Year;
use Illuminate\Http\Request;
 use App\Models\StudentTransition; 
use App\Models\StudentTransitionImage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $activeSemester = Semester::where('is_current', true)->first();

    $courses = Course::all();
    $years = Year::all();
    $sections = Section::all();

    if (!$activeSemester) {
        $students = collect();
    } else {
        $query = Student::withCount(['contracts as contracts_count' => function ($q) use ($activeSemester) {
            $q->where('semester_id', $activeSemester->id);
        }])
        ->whereHas('profiles', function ($q) use ($activeSemester, $request) {
            $q->where('semester_id', $activeSemester->id);

            if ($request->filled('filter_course')) {
                $q->where('course', $request->filter_course);
            }

            if ($request->filled('filter_year_level')) {
                $q->where('year_level', $request->filter_year_level);
            }

            if ($request->filled('filter_section')) {
                $q->where('section', $request->filter_section);
            }
        });

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('student_id', 'like', '%' . $request->search . '%')
                  ->orWhere('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%');
            });
        }

         if ($request->filled('filter_transition')) {
            $query->whereHas('transitions', function ($query) use ($request, $activeSemester) {
                $query->where('semester_id', optional($activeSemester)->id)
                    ->where('transition_type', $request->filter_transition);
            });
        }

        if ($request->filled('sort')) {
    $sort = $request->sort;
    $direction = $request->input('direction', 'asc');
    if (in_array($sort, ['student_id', 'first_name', 'last_name'])) {
        $query->orderBy($sort, $direction);
    } else {
        $query->orderBy('last_name')->orderBy('first_name');
    }
    } else {
        $query->orderBy('last_name')->orderBy('first_name');
    }

        
     //    $sortOrder = $request->get('sort', 'desc'); // default: latest
     //   $query->orderBy('created_at', $sortOrder);

        $students = $query->with('profiles')->paginate(10);
    }

    return view('student.students', compact('students', 'activeSemester', 'courses', 'years', 'sections'));
}






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $years = Year::all();
        $sections = Section::all();
        $semesters = Semester::all();

        

        return view('student.create', compact('semesters', 'courses', 'years', 'sections'));
    }


    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    // Validate Student base info + course, year_level, section inputs
    $validated = $request->validate([
        'student_id' => ['required', 'string', 'max:50', 'unique:students'],
        'first_name' => ['required', 'string', 'max:255'],
        'middle_name' => ['nullable', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'birthday' => ['required', 'date'],
        'suffix' => ['nullable', 'string', 'max:10'],
        'gender' => ['nullable', 'string', 'max:10'],
        'home_address' => ['nullable', 'string', 'max:255'],
        'father_occupation' => ['nullable', 'string', 'max:100'],
        'mother_occupation' => ['nullable', 'string', 'max:100'],
        'parent_guardian_name' => ['required', 'string', 'max:255'],
        'parent_guardian_contact' => ['required', 'string', 'max:255'],
        'number_of_sisters' => ['nullable', 'integer', 'min:0'],
        'number_of_brothers' => ['nullable', 'integer', 'min:0'],
        'ordinal_position' => ['nullable', 'integer', 'min:1'],
        'is_enrolled' => ['required', 'boolean'],
        'fathers_name' => ['nullable', 'string', 'max:255'],
        'mothers_name' => ['nullable', 'string', 'max:255'],
        'student_contact' => ['nullable', 'string', 'max:255'],
        
        // Validate for student_profiles table (course, year_level, section)
        'course' => 'required|exists:courses,course',
        'year_level' => 'required|exists:years,year_level',
        'section' => 'required|exists:sections,section',

         'transition_type' => 'nullable|in:Shifting In,Transferring In',
       // 'transition_date' => 'nullable|date|required_with:transition_type',
        'remark' => 'nullable|string|max:255',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Save the Student first (this goes to 'students' table)
    $student = Student::create([
        'student_id' => $validated['student_id'],
        'first_name' => $validated['first_name'],
        'middle_name' => $validated['middle_name'] ?? null,
        'last_name' => $validated['last_name'],
        'birthday' => $validated['birthday'],
        'suffix' => $validated['suffix'] ?? null,
        'gender' => $validated['gender'] ?? null,
        'home_address' => $validated['home_address'] ?? null,
        'father_occupation' => $validated['father_occupation'] ?? null,
        'mother_occupation' => $validated['mother_occupation'] ?? null,
        'parent_guardian_name' => $validated['parent_guardian_name'],
        'parent_guardian_contact' => $validated['parent_guardian_contact'],
        'number_of_sisters' => $validated['number_of_sisters'] ?? null,
        'number_of_brothers' => $validated['number_of_brothers'] ?? null,
        'ordinal_position' => $validated['ordinal_position'] ?? null,
        'fathers_name' => $validated['fathers_name'] ?? null,
        'mothers_name' => $validated['mothers_name'] ?? null,
        'student_contact' => $validated['student_contact'] ?? null,
    ]);

    // Get the active semester
    $activeSemester = Semester::where('is_current', true)->first();

    if (!$activeSemester) {
        return redirect()->back()->with('error', 'No active semester set.');
    }

    // Insert into student_semester_enrollments table
    StudentSemesterEnrollment::create([
        'student_id' => $student->id,
        'semester_id' => $activeSemester->id,
        'is_enrolled' => $validated['is_enrolled'],
    ]);

    // Insert into student_profiles table (course, year_level, section + other profile info)
    StudentProfile::create([
        'student_id' => $student->id,
        'semester_id' => $activeSemester->id,
        'course' => $validated['course'],
        'year_level' => $validated['year_level'],
        'section' => $validated['section'],
        'home_address' => $validated['home_address'] ?? null,
        'father_occupation' => $validated['father_occupation'] ?? null,
        'mother_occupation' => $validated['mother_occupation'] ?? null,
        'parent_guardian_name' => $validated['parent_guardian_name'],
        'parent_guardian_contact' => $validated['parent_guardian_contact'],
        'number_of_sisters' => $validated['number_of_sisters'] ?? null,
        'number_of_brothers' => $validated['number_of_brothers'] ?? null,
        'ordinal_position' => $validated['ordinal_position'] ?? null,
        'student_contact' => $validated['student_contact'] ?? null,
    ]);

    if ($request->filled('transition_type') && $request->transition_type !== 'None') {
        $transition = StudentTransition::create([
            'student_id' => $student->id,
            'semester_id' => $activeSemester->id,
            'first_name' => $student->first_name,
            'last_name' => $student->last_name,
            'transition_type' => $request->transition_type,
            'transition_date' => now(),
            'remark' => $request->transition_remark,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('transition_images', 'public');

                StudentTransitionImage::create([
                    'student_transition_id' => $transition->id,
                    'image_path' => $path,
                ]);
            }
        }
    }



    return redirect()->route('student.index')->with('success', 'Student created successfully with course, year level, and section.');
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




// public function enrollmentHistory(Student $student)
// {
//     $allProfiles = $student->profiles()
//     ->with('semester')
//     ->get()
//     ->sortByDesc(function ($profile) {
//         return $profile->semester?->id ?? 0; // or use semester.created_at if available
//     });


//     return view('student.enrollment', compact('student', 'allProfiles'));
// }




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

    $validated = $request->validate([
        'student_id' => 'required|unique:students,student_id,' . $student->id,
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'suffix' => 'nullable|string|max:10',
        'birthday' => 'required|date',
        'gender' => 'nullable|string|max:10',
        'home_address' => 'nullable|string|max:255',
        'father_occupation' => 'nullable|string|max:100',
        'mother_occupation' => 'nullable|string|max:100',
        'parent_guardian_name' => 'nullable|string|max:255',
        'parent_guardian_contact' => 'nullable|string|max:255',
        'number_of_sisters' => 'nullable|integer|min:0',
        'number_of_brothers' => 'nullable|integer|min:0',
        'ordinal_position' => 'nullable|integer|min:1',
        'fathers_name' => 'nullable|string|max:255',
        'mothers_name' => 'nullable|string|max:255',
        'student_contact' => 'nullable|string|max:255',
    ]);

    $student->update($validated);

    return redirect()->route('students.profile', ['id' => $student->id])->with('success', 'Student info updated!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $student = Student::findOrFail($id);
    $activeSemester = Semester::where('is_current', true)->first();

    if (!$activeSemester) {
        return redirect()->back()->with('error', 'No active semester set.');
    }

    // Delete ONLY the profile in the active semester
    $student->profiles()->where('semester_id', $activeSemester->id)->delete();

    // Delete ONLY the enrollment in the active semester
    $student->enrollments()->where('semester_id', $activeSemester->id)->delete();

    return redirect()->route('student.index')->with('success', 'Student data removed from the current semester only.');
}



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
    $activeSemester = Semester::where('is_current', true)->first();

    $student = Student::with(['counselings' => function ($query) use ($activeSemester) {
        $query->where('semester_id', $activeSemester->id);
    }])->findOrFail($studentId);

    $counselings = $student->counselings;

    return view('student.counseling', compact('student', 'counselings'));
}


public function referral($studentId)
{
    $activeSemester = Semester::where('is_current', true)->first();

    $student = Student::with(['referrals' => function ($query) use ($activeSemester) {
        $query->where('semester_id', $activeSemester->id);
    }])->findOrFail($studentId);

    $referrals = $student->referrals;

    return view('student.referral', compact('student', 'referrals'));
}








public function showEnrollmentHistory($studentId)
{
    $student = Student::with(['profiles.semester.schoolYear', 'transitions'])->findOrFail($studentId);

    $activeSemester = Semester::where('is_current', true)->first();

    $semesters = Semester::with('schoolYear')
        ->join('school_years', 'semesters.school_year_id', '=', 'school_years.id')
        ->orderBy('school_years.school_year', 'asc')
        ->orderBy('semesters.semester', 'asc')
        ->select('semesters.*')
        ->get();

    // Group profiles by semester, pick the latest profile per semester
    $allProfiles = $student->profiles
        ->sortByDesc('created_at')
        ->groupBy('semester_id')
        ->map(function ($groupedProfiles) use ($student) {
            $latestProfile = $groupedProfiles->first();

            // Attach the transition for this semester directly to the profile
            $transition = $student->transitions
                ->where('semester_id', $latestProfile->semester_id)
                ->first();

            // Append it so the Blade doesn't need to do another DB query
            $latestProfile->transition = $transition;

            return $latestProfile;
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
    $activeSemester = Semester::where('is_current', true)->first();
    $student = Student::with(['contracts' => function ($query) use ($activeSemester) {
        $query->where('semester_id', $activeSemester->id);
    }, 'contracts.semester'])->findOrFail($id);

    $contractTypes = ContractType::all();
    $semesters = Semester::all(); 

    return view('student.contract', compact('student', 'semesters', 'contractTypes'));
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

    return redirect()->back()->with('success', 'Profile updated for current semester only.');
}


public function viewProfile($studentId, $profileId)
{
    $student = Student::findOrFail($studentId);
    $profile = StudentProfile::with('semester')->findOrFail($profileId);

    return view('student.view_profile', compact('student', 'profile'));
}

public function markAsDropped(Request $request, $id)
{
    $student = Student::findOrFail($id);
    $activeSemester = Semester::where('is_current', true)->first();

    if (!$activeSemester) {
        return back()->with('error', 'No active semester found.');
    }

    $request->validate([
        'remark' => 'nullable|string|max:255',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $transition = StudentTransition::create([
        'student_id' => $student->id,
        'semester_id' => $activeSemester->id,
        'first_name' => $student->first_name,
        'last_name' => $student->last_name,
        'transition_type' => 'Dropped',
        'transition_date' => now(),
        'remark' => $request->input('remark'),
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('transition_images', 'public');

            StudentTransitionImage::create([
                'student_transition_id' => $transition->id,
                'image_path' => $path,
            ]);
        }
    }

    return back()->with('success', 'Student has been marked as dropped.');
}

public function import(Request $request)
{
    $request->validate([
    'excel_file' => 'required|file|mimetypes:text/*,application/*',
]);


    Excel::import(new StudentsImport, $request->file('excel_file'));

    return back()->with('success', 'Student data imported successfully!');
}


private function carryOverOngoingRecords(Student $student, Semester $fromSemester, Semester $toSemester)
{
    // Carry over Ongoing Contracts
    $ongoingContracts = $student->contracts()
        ->where('semester_id', $fromSemester->id)
        ->where('status', 'Ongoing')
        ->get();

    foreach ($ongoingContracts as $contract) {
        $student->contracts()->create([
            'semester_id' => $toSemester->id,
            'contract_type_id' => $contract->contract_type_id,
            'status' => 'Ongoing',
            'details' => $contract->details ?? null,
        ]);
    }

    // Carry over Ongoing Counselings
    $ongoingCounselings = $student->counselings()
        ->where('semester_id', $fromSemester->id)
        ->where('status', 'Ongoing')
        ->get();

    foreach ($ongoingCounselings as $counseling) {
        $newCounseling = $student->counselings()->create([
            'semester_id' => $toSemester->id,
            'session_date' => now(), // or copy $counseling->session_date if needed
            'status' => 'Ongoing',
            'remarks' => $counseling->remarks,
        ]);

        // Copy images
        foreach ($counseling->images as $image) {
            \App\Models\CounselingImage::create([
                'counseling_id' => $newCounseling->id,
                'image_path' => $image->image_path,
            ]);
        }
    }
}




}