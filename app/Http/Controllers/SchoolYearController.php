<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Models\Semester;
class SchoolYearController extends Controller
{

public function store(Request $request)
{
    $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ]);

    $startYear = date('Y', strtotime($validated['start_date']));
    $endYear = date('Y', strtotime($validated['end_date']));
    $schoolYearStr = $startYear . '-' . $endYear;

    // Check for duplicate
    if (SchoolYear::where('school_year', $schoolYearStr)->exists()) {
        return back()->withErrors(['School Year ' . $schoolYearStr . ' already exists.']);
    }

    // Deactivate previous active School Year and its semesters
    $previousActive = SchoolYear::where('is_active', true)->first();
    if ($previousActive) {
        $previousActive->update(['is_active' => false]);
        Semester::where('school_year_id', $previousActive->id)->update(['is_current' => false]);
    }

    // Create new active School Year
    $newSchoolYear = SchoolYear::create([
        'start_date' => $validated['start_date'],
        'end_date' => $validated['end_date'],
        'school_year' => $schoolYearStr,
        'is_active' => true,
    ]);

    // 👇 Auto-create 1st Semester for the new School Year (set as current)
    Semester::create([
        'school_year_id' => $newSchoolYear->id,
        'semester' => '1st', // default
        'is_current' => true,
    ]);

    return redirect()->route('semester.index')->with('success', 'New School Year and its 1st Semester created and set as active.');
}

/**
 * Activate a specific school year and deactivate others
 */
public function activate($id)
{
    try {
        // Find the school year to activate
        $schoolYear = SchoolYear::findOrFail($id);
        
        // Deactivate all school years and their semesters
        SchoolYear::where('is_active', true)->update(['is_active' => false]);
        Semester::where('is_current', true)->update(['is_current' => false]);
        
        // Activate the selected school year
        $schoolYear->update(['is_active' => true]);
        
        // Activate the first semester of this school year (if exists)
        $firstSemester = Semester::where('school_year_id', $schoolYear->id)
                                ->orderBy('semester')
                                ->first();
        
        if ($firstSemester) {
            $firstSemester->update(['is_current' => true]);
        }
        
        return redirect()->route('semester.index')
                        ->with('success', 'School Year ' . $schoolYear->school_year . ' has been activated successfully.');
                        
    } catch (\Exception $e) {
        return redirect()->route('semester.index')
                        ->with('error', 'Failed to activate school year: ' . $e->getMessage());
    }
}


}
