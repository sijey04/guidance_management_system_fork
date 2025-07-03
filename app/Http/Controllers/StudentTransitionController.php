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
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'transition_type' => 'required|in:Shiftee,Transferee,Returnee,Dropped,Stopped',
            'transition_date' => 'required|date',
        ]);

         $activeSemester = Semester::where('is_current', true)->first();
    if (!$activeSemester) {
        return back()->with('error', 'No active semester is set.');
    }

   $transitionData = $request->all();
        $transitionData['semester_id'] = $activeSemester->id;

        StudentTransition::create($transitionData);


        return redirect()->route('transitions.index')->with('success', 'Student movement recorded.');
    }

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
