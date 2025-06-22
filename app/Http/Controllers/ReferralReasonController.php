<?php

namespace App\Http\Controllers;

use App\Models\ReferralReason;
use Illuminate\Http\Request;

class ReferralReasonController extends Controller
{
    public function index()
    {
        $reasons = ReferralReason::all();
        return view('referrals.manage_reasons', compact('reasons'));
    }

    public function store(Request $request)
    {
        $request->validate(['reason' => 'required|string|max:255']);
        ReferralReason::create(['reason' => $request->reason]);
        return back()->with('success', 'Reason added successfully!');
    }

    public function destroy($id)
    {
        $reason = ReferralReason::findOrFail($id);
        $reason->delete();
        return back()->with('success', 'Reason deleted successfully!');
    }
}
