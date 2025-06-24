<?php

namespace App\Http\Controllers;

use App\Models\counseling;
use App\Models\semester;
use App\Models\Student;
use Illuminate\Http\Request;

class CounselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $currentSemester = Semester::where('is_current', true)->first();
    $lastSemester = Semester::where('id', '<>', $currentSemester->id)
                            ->orderByDesc('id')
                            ->first();

    // ✅ Get students newly enrolled in current semester
    $newStudents = Student::whereHas('enrollments', function ($query) use ($currentSemester) {
        $query->where('semester_id', $currentSemester->id)
              ->where('is_enrolled', true);
    });

    // ✅ Get validated students carried over from last semester
    $validatedStudents = Student::whereHas('profiles', function ($query) use ($lastSemester, $currentSemester) {
        $query->where('semester_id', $currentSemester->id);
    });

    // ✅ Union both queries
    $students = $newStudents->union($validatedStudents)->get();

    $counselings = Counseling::with('student')->paginate(10);

    return view('counselings.counseling', compact('counselings', 'students'));
}


public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'counseling_date' => 'required|date',
        'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Find the current active semester
    $activeSemester = Semester::where('is_current', true)->first();
    if (!$activeSemester) {
        return back()->with('error', 'No active semester set. Please activate a semester first.');
    }

    // Handle file upload if any
    if ($request->hasFile('image_path')) {
        $validated['image_path'] = $request->file('image_path')->store('image_path', 'public');
    }

    // Add active semester ID to the data
    $validated['semester_id'] = $activeSemester->id;

    // Create 
    counseling::create($validated);

    return redirect()->back()->with('success', 'Counseling record added.');
}


    /**
     * Display the specified resource.
     */
    public function show(counseling $counseling)
    {
            return view('counselings.view', compact('counseling'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(counseling $counseling)
    {
        return view('counselings.edit', compact('counseling'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Counseling $counseling)
{
    $validated = $request->validate([
        'counseling_date' => 'required|date',
        'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    if ($request->hasFile('image_path')) {
        $validated['image_path'] = $request->file('image_path')->store('counseling_images', 'public');
    }

    $counseling->update($validated);
    return redirect()->route('counselings.index')->with('success', 'Updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(counseling $counseling)
    {
        //
    }



}
