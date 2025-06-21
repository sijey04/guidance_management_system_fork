<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Year;
use App\Models\Section;

class CourseYearSectionController extends Controller
{
    public function index() {
        return view('student.course_year_section', [
            'courses' => Course::all(),
            'years'   => Year::all(),
            'sections'=> Section::all(),
        ]);
    }

    public function storeCourse(Request $request) {
        $request->validate(['course' => 'required|unique:courses,course']);
        Course::create(['course' => $request->course]);
       return back()->with('success', 'Course added.')->withFragment('manageCourse');
    }

    public function storeYear(Request $request) {
        $request->validate(['year_level' => 'required|unique:years,year_level']);
        Year::create(['year_level' => $request->year_level]);
        return back()->with('success', 'Course added.')->withFragment('manageYear');
    }

    public function storeSection(Request $request) {
        $request->validate(['section' => 'required|unique:sections,section']);
        Section::create(['section' => $request->section]);
        return back()->with('success', 'Course added.')->withFragment('manageSection');

    }
}

