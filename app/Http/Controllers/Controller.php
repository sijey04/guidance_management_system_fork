<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

// $totalStudents = Student::count(); // Assuming you have a Student model
// $studentsThisMonth = Student::whereMonth('created_at', Carbon::now()->month)->count(); // Example: count students created this month
// $change = $studentsThisMonth - ($totalStudents - $studentsThisMonth);

// return view('your_view', compact('totalStudents', 'change'));