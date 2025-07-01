<?php

namespace App\Http\Controllers;

use App\Models\StudentTransition;
use Illuminate\Http\Request;

class StudentTransitionController extends Controller
{
    public function index()
    {
        $transitions = StudentTransition::latest()->paginate(10);
        return view('transitions.index', compact('transitions'));
    }

    public function create()
    {
        return view('transitions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'transition_type' => 'required|in:Shiftee,Transferee,Returnee,Dropped,Stopped',
            'transition_date' => 'required|date',
        ]);

        StudentTransition::create($request->all());

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
