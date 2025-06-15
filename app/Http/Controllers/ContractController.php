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
   public function index(Request $request){
        $contracts = Contract::with('student', 'semester')->paginate(10); // adjust as needed
        $students = Student::all(); // For modal dropdown
        $semesters = Semester::all(); // For modal dropdown

        return view('contracts.contract', compact('contracts', 'students', 'semesters'));
    }

public function create(){
    $students = Student::all(); // To select which student the contract is for
    $semesters = Semester::all(); // To select the semester
    return view('contracts.createContract', compact('students', 'semesters'));
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

public function allContracts(Request $request)
{
    $query = Contract::with(['student', 'semester']);

    // Search by student name
    if ($request->has('search') && $request->search != '') {
        $query->whereHas('student', function ($q) use ($request) {
            $q->where('student_id', 'like', '%' . $request->search . '%')
              ->orwhere('first_name', 'like', '%' . $request->search . '%')
              ->orWhere('last_name', 'like', '%' . $request->search . '%');
        });
    }

    // Sort by field
    if ($request->has('sort_by') && $request->sort_by != '') {
        $sortField = $request->sort_by;
        $sortDirection = $request->get('sort_direction', 'asc'); // default to ascending

        if (in_array($sortField, ['contract_date', 'status', 'total_days'])) {
            $query->orderBy($sortField, $sortDirection);
        }
    }

    $contracts = $query->paginate(10);
    $students = Student::all(); // Required by createContract.blade.php
    $semesters = Semester::all(); // Required by createContract.blade.php

    return view('contracts.contract', compact('contracts', 'students', 'semesters'));
}




}
