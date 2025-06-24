<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Contract;
use App\Models\Referral;
use App\Models\Counseling;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with totals and recent activities.
     */
    public function index()
    {
        $totalStudents    = Student::count();
        $totalContracts   = Contract::count();
        $totalReferrals   = Referral::count();
        $totalCounselings = Counseling::count();

        // Recent activities (latest 5)
        $recentContracts   = Contract::with('student')->latest()->take(5)->get();
        $recentReferrals   = Referral::with('student')->latest()->take(5)->get();
        $recentCounselings = Counseling::with('student')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalStudents',
            'totalContracts',
            'totalReferrals',
            'totalCounselings',
            'recentContracts',
            'recentReferrals',
            'recentCounselings'
        ));
    }
}
