<?php

namespace App\Http\Controllers;

use App\Models\ContractType;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
{
    public function index()
    {
        $contractTypes = ContractType::all();
        return view('contracts.manage_contract_types', compact('contractTypes'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'type' => 'required|unique:contract_types,type',
    ]);

    ContractType::create([
        'type' => $validated['type'],
        'requires_total_days' => $request->has('requires_total_days'),
        'requires_start_date' => $request->has('requires_start_date'),
    ]);

    return back()->with('success', 'Contract Type added successfully.');
}
    public function destroy($id)
    {
        ContractType::destroy($id);
        return back()->with('success', 'Contract Type deleted.');
    }

    public function update(Request $request, $id)
{
    $contractType = ContractType::findOrFail($id);

    $contractType->update([
        'requires_total_days' => $request->has('requires_total_days'),
        'requires_start_date' => $request->has('requires_start_date'),
    ]);

    return back()->with('success', 'Contract type updated.');
}

}
