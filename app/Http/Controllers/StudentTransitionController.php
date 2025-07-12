<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\ContractType;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentTransition;
use App\Models\StudentTransitionImage;
use Illuminate\Http\Request;

class StudentTransitionController extends Controller
{
    public function index(Request $request)
{
    $query = StudentTransition::with(['semester.schoolYear']);

    // Search by name or ID
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('first_name', 'like', "%$search%")
              ->orWhere('last_name', 'like', "%$search%")
              ->orWhere('student_id', 'like', "%$search%");
        });
    }

    // Filter by transition type
    if ($request->filled('transition_type')) {
        $query->where('transition_type', $request->transition_type);
    }

    // Sort by date
    $sortOrder = $request->get('sort', 'desc'); // default: latest
    $query->orderBy('created_at', $sortOrder);


    $transitions = $query->paginate(10)->appends($request->all());

    $semesters = Semester::all();
    $transitionTypes = [
        'None', 'Shifting In', 'Shifting Out', 'Transferring In',
        'Transferring Out', 'Dropped', 'Returning Student'
    ];

    $currentSemester = Semester::where('is_current', true)->first();
    $students = $currentSemester
        ? Student::whereHas('profiles', fn($q) => $q->where('semester_id', $currentSemester->id))
            ->with('profiles')->get()
        : collect();

    return view('transitions.index', compact('transitions', 'students', 'semesters', 'transitionTypes'));
}


    public function create()
    {
         $currentSemester = Semester::where('is_current', true)->first();

            if (!$currentSemester) {
                return redirect()->back()->with('error', 'No active semester set. Please create and activate a semester first.');
            }

            $students = Student::whereHas('enrollments', function ($query) use ($currentSemester) {
                $query->where('semester_id', $currentSemester->id)
                    ->where('is_enrolled', true);
            })->with('enrollments')->get();

             $semesters = Semester::all();
        return view('transitions.create', compact('students', 'semesters'));
    }

    public function store(Request $request)
{
    $request->validate([
        'student_id' => 'nullable|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'transition_type' => 'required|in:None,Shifting In,Shifting Out,Transferring In,Transferring Out,Dropped,Returning Student',
        //'transition_date' => 'required|date',
        'remark' => 'nullable|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $activeSemester = Semester::where('is_current', true)->first();
    if (!$activeSemester) {
        return back()->with('error', 'No active semester is set.');
    }


    $transition = StudentTransition::create([
        'student_id' => $request->student_id,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'semester_id' => $activeSemester->id,
        'transition_type' => $request->transition_type,
        'transition_date' => now(),
        'remark' => $request->remark,
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('transition_images', 'public');

            $transition->images()->create([
                'image_path' => $path,
            ]);
        }
    }

    return redirect()->route('transitions.index')->with('success', 'Incoming student transition recorded.');
}

//     public function storeStudentTransition(Request $request)
// {
//     $request->validate([
//         'student_id' => 'required|exists:students,id',
//         'transition_type' => 'required|in:None,Shifting In,Shifting Out,Transferring In,Transferring Out,Dropped,Returning Student',
//         'transition_date' => 'required|date',
//         'remark' => 'nullable|string',
//     ]);

//     $activeSemester = Semester::where('is_current', true)->first();

//     if (!$activeSemester) {
//         return back()->with('error', 'No active semester is set.');
//     }

//     $student = Student::findOrFail($request->student_id);

//     StudentTransition::create([
//         'student_id' => $student->id,
//         'semester_id' => $activeSemester->id,
//         'first_name' => $student->first_name,
//         'last_name' => $student->last_name,
//         'transition_type' => $request->transition_type,
//         'transition_date' => $request->transition_date,
//         'remark' => $request->remark,
//     ]);

//    return redirect()->route('students.profile', ['id' => $student->id])->with('success', 'Incoming student transition recorded.');

// }

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

    public function show(StudentTransition $transition, Request $request)
{
    $source = $request->query('source', 'transition');
    return view('transitions.view', compact('transition', 'source'));
}



    public function destroy(StudentTransition $transition)
    {
        $transition->delete();
        return redirect()->route('transitions.index')->with('success', 'Record deleted.');
    }

public function updateRemarks(Request $request, $id)
{
    $transition = StudentTransition::findOrFail($id);
    $transition->remark = $request->input('remark');
    $transition->save();

    return redirect()->route('transitions.show', $id)
                     ->with('success', 'Remarks updated successfully.');
}

public function uploadImages(Request $request, $id)
{
    $request->validate([
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $transition = StudentTransition::findOrFail($id);

    foreach ($request->file('images', []) as $file) {
        $path = $file->store('transition_images', 'public');

$transition->images()->create([
    'image_path' => $path,
]);

    }

    return back()->with('success', 'Images uploaded successfully.');
}

public function deleteImage($contractId, $imageId)
{
    $image = StudentTransitionImage::findOrFail($imageId);

    if (Storage::disk('public')->exists($image->image_path)) {
        Storage::disk('public')->delete($image->image_path);
    }

    $image->delete();

    return back()->with('success', 'Image deleted successfully.');
}
}
