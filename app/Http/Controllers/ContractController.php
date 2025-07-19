<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Contract;
use App\Models\ContractImage;
use App\Models\ContractType;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $query = Contract::with('student', 'semester.schoolYear');

    // 🔍 Search
    if ($request->filled('search')) {
        $query->whereHas('student', function ($q) use ($request) {
            $q->where('student_id', 'like', '%' . $request->search . '%')
              ->orWhere('first_name', 'like', '%' . $request->search . '%')
              ->orWhere('last_name', 'like', '%' . $request->search . '%');
        });
    }

    // 📋 Filter: Contract Type
    if ($request->filled('contract_type')) {
        $query->where('contract_type', $request->contract_type);
    }

    // 🟡 Filter: Status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('semester_label')) {
    $query->whereHas('semester', function ($q) use ($request) {
        $q->where('semester', $request->semester_label);
    });
}


    if ($request->filled('school_year_id')) {
        $query->whereHas('semester', function ($q) use ($request) {
            $q->where('school_year_id', $request->school_year_id);
        });
    }

    if ($request->filled('sort_by')) {
        $sortField = $request->sort_by;
        $sortDirection = $request->get('sort_direction', 'asc');

        if (in_array($sortField, ['contract_date', 'status', 'total_days'])) {
            $query->orderBy($sortField, $sortDirection);
        }
    }

    

    
    $contracts = $query->paginate(10)->appends($request->query());

    $semesters = Semester::with('schoolYear')->get();
    $contractTypes = ContractType::all();

    $currentSemester = Semester::where('is_current', true)->first();
    $students = $currentSemester
        ? Student::whereHas('profiles', function ($query) use ($currentSemester) {
            $query->where('semester_id', $currentSemester->id);
        })->with('profiles')->get()
        : collect();

    return view('contracts.contract', compact('contracts', 'students', 'semesters', 'contractTypes'));
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
    $contractTypes = ContractType::all();

    return view('contracts.createContract', compact('students', 'semesters', 'contractTypes'));
}






public function store(Request $request)
{
    $validated = $request->validate([
        'student_id' => 'required|exists:students,id',
        'contract_date' => 'required|date',
        'contract_type' => 'required|exists:contract_types,type',
        'total_days' => 'nullable|integer|min:1',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'remarks' => 'nullable|string|max:1000',
        'contract_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // note the '.*'
        'status' => 'nullable|string',
    ]);

    $activeSemester = Semester::where('is_current', true)->first();
    if (!$activeSemester) {
        return back()->with('error', 'No active semester is set.');
    }

    $validated['semester_id'] = $activeSemester->id;

    $contract = Contract::create($validated);

    if ($request->hasFile('contract_images')) {
        foreach ($request->file('contract_images') as $image) {
            $path = $image->store('contract_images', 'public');
            ContractImage::create([
                'contract_id' => $contract->id,
                'image_path' => $path
            ]);
        }
    }

    return redirect()->back()->with('success', 'Contract created successfully.');
}



    /**
     * Display the specified resource.
     */
    public function show()
    {
        
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
   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'contract_type' => 'required|string|max:255',
        'contract_date' => 'required|date',
        'total_days' => 'required|integer|min:1',
        'completed_days' => 'required|integer|min:0',
        'status' => 'required|string',
    ]);

    $contract = Contract::findOrFail($id);
    $contract->update($validated);

    return redirect()->back()->with('success', 'Contract updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
       public function destroy($id)
        {
            $contract = Contract::findOrFail($id);

            foreach ($contract->images as $image) {
                if (Storage::exists($image->image_path)) {
                    Storage::delete($image->image_path);
                }
                $image->delete();
            }

            $contract->delete();

            return redirect()->route('contracts.index')->with('success', 'Counseling record deleted.');
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
        $sortDirection = $request->get('sort_direction', 'asc'); 

        if (in_array($sortField, ['contract_date', 'status', 'total_days'])) {
            $query->orderBy($sortField, $sortDirection);
        }
    }

    $contracts = $query->paginate(10);
   
    $semesters = Semester::all();
    $contractTypes = ContractType::all(); 

    $currentSemester = Semester::where('is_current', true)->first();

    // ✅ Only validated students for the current semester
    $students = Student::whereHas('enrollments', function ($query) use ($currentSemester) {
        $query->where('semester_id', $currentSemester->id)
              ->where('is_enrolled', true); // assuming 'is_enrolled' indicates validated students
    })->with('enrollments')->get();

    return view('contracts.contract', compact('contracts', 'students', 'semesters', 'contractTypes'));
}


public function view(Request $request, $id)
{
    $contract = Contract::with(['student.profiles', 'images'])->findOrFail($id);

    $source = $request->query('source', 'contract'); 
    $readonly = $source === 'report'; 

    return view('contracts.viewContract', compact('contract', 'readonly', 'source'));
}





public function markComplete($id)
{
    $contract = Contract::findOrFail($id);
    $contract->update(['status' => 'Completed']);

    return back()->with('success', 'Contract marked as Completed.');
}

public function markInProgress($id)
{
    $contract = Contract::findOrFail($id);
    $contract->update(['status' => 'In Progress']);

    return back()->with('success', 'Contract marked as In Progress.');
}

public function updateRemarks(Request $request, $id)
{
    $contracts = Contract::findOrFail($id);
    $contracts->remarks = $request->input('remarks');
    $contracts->save();

    return redirect()->route('contracts.view', $id)
                     ->with('success', 'Remarks updated successfully.');
}

public function updateStatus(Request $request, $id)
{
    $contract = Contract::findOrFail($id);
    $status = $request->input('status');

    // Only allow 'In Progress' or 'Completed'
    if (!in_array($status, ['In Progress', 'Completed'])) {
        return redirect()->back()->with('error', 'Invalid status.');
    }

    $activeSemester = Semester::where('is_current', true)->first();

    if (
        $contract->status === 'In Progress' &&
        $status === 'Completed' &&
        $contract->semester_id !== optional($activeSemester)->id
    ) {
        // Check if it was already carried over
        if ($contract->carriedOver) {
            return redirect()->back()->with('info', 'This contract has already been carried over.');
        }

        // Duplicate contract for the active semester
        $newContract = $contract->replicate(); // copy all fields
        $newContract->semester_id = $activeSemester->id;
        $newContract->status = 'Completed';
        $newContract->original_contract_id = $contract->id;
        $newContract->save();

        // Optionally also duplicate images if needed:
        foreach ($contract->images as $image) {
            $newContract->images()->create([
                'image_path' => $image->image_path,
                'type' => $image->type,
            ]);
        }

        return redirect()->back()->with('success', 'Contract carried over and marked as Completed.');
    }

    // ✅ For current semester or direct update
    $contract->status = $status;
    $contract->save();

    return redirect()->back()->with('success', 'Status updated successfully.');
}

public function uploadImages(Request $request, $id, $type)
{
    $request->validate([
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $contract = Contract::findOrFail($id);

    foreach ($request->file('images', []) as $file) {
        $path = $file->store('contract_images', 'public');

        $contract->images()->create([
            'image_path' => $path,
            'type' => $type,
        ]);
    }

    return back()->with('success', 'Images uploaded successfully.');
}

public function deleteImage($contractId, $imageId)
{
    $image = ContractImage::findOrFail($imageId);

    if (Storage::disk('public')->exists($image->image_path)) {
        Storage::disk('public')->delete($image->image_path);
    }

    $image->delete();

    return back()->with('success', 'Image deleted successfully.');
}


}
