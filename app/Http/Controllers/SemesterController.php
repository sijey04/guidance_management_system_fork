<?php

namespace App\Http\Controllers;

use App\Models\semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         $semesters = Semester::orderByDesc('is_current') // Current semester first (is_current = 1)
                         ->orderBy('school_year', 'desc') // Latest year next
                         ->orderBy('semester', 'asc')    // 1st semester before 2nd or Summer
                         ->get();

    return view('semester.index', compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('semester.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->is_current) {
        Semester::where('is_current', true)->update(['is_current' => false]);
        Semester::where('is_active', true)->update(['is_active' => false]); 
    }

    Semester::create($request->all());

    return redirect()->route('semesters.index')->with('success', 'Semester created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(semester $semester)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(semester $semester)
    {
        //
    }
}
