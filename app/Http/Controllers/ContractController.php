<?php

namespace App\Http\Controllers;

use App\Models\contract;
use App\Models\semester;
use App\Models\Student;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index($studentId)
{
    $student = Student::with(['contracts.semester'])->findOrFail($studentId);

    return view('students.index', compact('student'));
}

public function create(Request $request)
{
    $studentId = $request->student_id;
    $semesters = Semester::all(); // dropdown for semester selection
    return view('students.createContract', compact('studentId', 'semesters'));
}


    // Store new contract
 public function store(Request $request)
{
    $request->validate([
       'student_id' => 'required|exists:students,id',
        'semester_id' => 'required|exists:semesters,id',
        'contract_date' => 'required|date',
        'content' => 'required|string',
        'total_days' => 'nullable|integer|min:1',
        'completed_days' => 'nullable|integer|min:0',
        'status' => 'required|in:In Progress,Completed',
    ]);

    Contract::create($request->all());

    return redirect()->route('students.contract', $request->student_id)
                     ->with('success', 'Contract added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contract $contract)
    {
        //
    }

    public function createForStudent(Student $student)
{
    $semesters = Semester::all(); // For semester dropdown
    return view('student.createContract', compact('student', 'semesters'));
}

}
