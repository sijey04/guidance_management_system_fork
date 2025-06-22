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
        $request->validate(['type' => 'required|unique:contract_types,type']);
        ContractType::create(['type' => $request->type]);
        return back()->with('success', 'Contract Type added successfully.');
    }

    public function destroy($id)
    {
        ContractType::destroy($id);
        return back()->with('success', 'Contract Type deleted.');
    }
}

