<?php

namespace App\Http\Controllers;

use App\Models\ContractType;
use App\Models\semester;
use App\Models\Student;
use App\Models\StudentTransition;
use Illuminate\Http\Request;

class StudentTransitionController extends Controller
{
    public function index()
    {
        $transitions = StudentTransition::latest()->paginate(10);

         $semesters = semester::all();
         
    $currentSemester = Semester::where('is_current', true)->first();

    if (!$currentSemester) {
        $students = collect(); // return empty collection if no active semester
    } else {
        // Get students who have profile for current semester (either newly added or validated)
        $students = Student::whereHas('profiles', function ($query) use ($currentSemester) {
            $query->where('semester_id', $currentSemester->id);
        })->with('profiles')->get();
    }
        return view('transitions.index', compact('transitions','students', 'semesters',));
    }

    public function create()
    {
         $currentSemester = Semester::where('is_current', true)->first();

            if (!$currentSemester) {
                return redirect()->back()->with('error', 'No active semester set. Please create and activate a semester first.');
            }

            $students = Student::whereHas('enrollments', function ($query) use ($currentSemester) {
                $query->where('semester_id', $currentSemester->id)
                    ->where('is_enrolled', true);
            })->with('enrollments')->get();

             $semesters = Semester::all();
        return view('transitions.create', compact('students', 'semesters'));
    }

    public function store(Request $request)
{
    $request->validate([
        'student_id' => 'nullable|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'transition_type' => 'required|in:None,Shifting In,Shifting Out,Transferring In,Transferring Out,Dropped,Returning Student',
        'transition_date' => 'required|date',
        'remark' => 'nullable|string',
    ]);

    $activeSemester = Semester::where('is_current', true)->first();
    if (!$activeSemester) {
        return back()->with('error', 'No active semester is set.');
    }

    StudentTransition::create([
        'student_id' => $request->student_id, // can be null
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'semester_id' => $activeSemester->id,
        'transition_type' => $request->transition_type,
        'transition_date' => $request->transition_date,
        'remark' => $request->remark,
    ]);

    return redirect()->route('transitions.index')->with('success', 'Incoming student transition recorded.');
}

//     public function storeStudentTransition(Request $request)
// {
//     $request->validate([
//         'student_id' => 'required|exists:students,id',
//         'transition_type' => 'required|in:None,Shifting In,Shifting Out,Transferring In,Transferring Out,Dropped,Returning Student',
//         'transition_date' => 'required|date',
//         'remark' => 'nullable|string',
//     ]);

//     $activeSemester = Semester::where('is_current', true)->first();

//     if (!$activeSemester) {
//         return back()->with('error', 'No active semester is set.');
//     }

//     $student = Student::findOrFail($request->student_id);

//     StudentTransition::create([
//         'student_id' => $student->id,
//         'semester_id' => $activeSemester->id,
//         'first_name' => $student->first_name,
//         'last_name' => $student->last_name,
//         'transition_type' => $request->transition_type,
//         'transition_date' => $request->transition_date,
//         'remark' => $request->remark,
//     ]);

//    return redirect()->route('students.profile', ['id' => $student->id])->with('success', 'Incoming student transition recorded.');

// }

    public function edit(StudentTransition $transition)
    {
        return view('transitions.edit', compact('transition'));
    }

    public function update(Request $request, StudentTransition $transition)
    {
        $request->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'transition_type' => 'required|in:Shiftee,Transferee,Returnee,Dropped,Stopped',
            'transition_date' => 'required|date',
        ]);

        $transition->update($request->all());

        return redirect()->route('transitions.show', $transition)->with('success', 'Student movement updated.');
    }

    public function show(StudentTransition $transition)
    {
        return view('transitions.view', compact('transition'));
    }

    public function destroy(StudentTransition $transition)
    {
        $transition->delete();
        return redirect()->route('transitions.index')->with('success', 'Record deleted.');
    }
}
