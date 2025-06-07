<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(15); //Fetch all students.  Consider pagination for large datasets.
        return view('student.students', compact('students')); //Pass the data to the view.
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => ['required', 'string', 'max:50', 'unique:students'], // Add student_id validation
            'first_name' => ['required', 'string', 'max:255'], // Changed to snake_case
            'last_name' => ['required', 'string', 'max:255'],
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
        ]);

         Student::create($validatedData);
         return redirect()->route('student.index')->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
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
}
