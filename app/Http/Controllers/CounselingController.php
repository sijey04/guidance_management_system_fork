<?php

namespace App\Http\Controllers;

use App\Models\counseling;
use App\Models\Student;
use Illuminate\Http\Request;

class CounselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $counselings = Counseling::with('student')->get(); // fetch counseling with related student data
    return view('counselings.counseling', compact('counselings'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create($studentId)
    {
        $student = Student::findOrFail($studentId);
        return view('student.createCounseling', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'session_date' => 'required|date', 
            'referred_by' => 'nullable|string',
            'statement_of_problem' => 'required|string',
            'tests_administered' => 'nullable|string',
            'evaluation' => 'nullable|string',
            'recommendation_action_taken' => 'nullable|string',
            'follow_up' => 'nullable|string',
            'guidance_counselor' => 'required|string',
        ]);

        Counseling::create($validated);

        return redirect()->route('students.counseling', $request->student_id)
                        ->with('success', 'Counseling record added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(counseling $counseling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(counseling $counseling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, counseling $counseling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(counseling $counseling)
    {
        //
    }



}
