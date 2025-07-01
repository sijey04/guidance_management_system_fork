@php
   $activeSemester = \App\Models\Semester::where('is_current', true)->first();
   $schoolYears = \App\Models\SchoolYear::with('semesters')->orderByDesc('is_active')->orderByDesc('id')->get();
   $activeSchoolYear = \App\Models\SchoolYear::where('is_active', true)->with('semesters')->first();
   $activeSemester = \App\Models\Semester::where('is_current', true)->first();
@endphp

<nav class="sidebar">
    <div class="text-center ">
        <a href="{{ route('dashboard') }}">
            <img src="/logo.png" alt="WMSU Logo" class="sidebar-logo mx-auto">
        </a>

        <!-- Display Active S.Y. and Semester -->
        {{-- <div class="mt-2 border-2 border-gray-300 rounded-lg py-1 px-2 bg-white shadow-sm">
            @if($activeSchoolYear && $activeSemester)
                <p class="text-base text-gray-800 font-semibold mb-1">Active Semester</p>
                <p class="text-sm text-gray-700"><strong>S.Y:</strong> {{ $activeSchoolYear->school_year }} </p>
                <p class="text-sm text-gray-700"><strong>Semester:</strong> {{ $activeSemester->semester }}</p>
            @else
                <p class="text-base text-red-600 font-semibold">No Active Semester</p>
            @endif

           
        </div> --}}
    </div>

    <div class="sidebar-nav mt-2">
        <a href="{{ route('dashboard') }}" class="sidebar-nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}">
           </i> Dashboard
        </a>
        <a href="{{ route('student.index') }}" class="sidebar-nav-link{{ request()->routeIs('student.*') || request()->routeIs('students.*') ? ' active' : '' }}">
            Student
        </a>
        <a href="{{ route('contracts.index') }}" class="sidebar-nav-link{{ request()->routeIs('contracts.index') ? ' active' : '' }}">
            Contracts
        </a>
        <a href="{{ route('referrals.index') }}" class="sidebar-nav-link{{ request()->routeIs('referrals.*') ? ' active' : '' }}">
            Referral
        </a>
        <a href="{{ route('counselings.index') }}" class="sidebar-nav-link{{ request()->routeIs('counselings.index') ? ' active' : '' }}">
            Counseling Records
        </a>
        
        <a href="{{ route('transitions.index') }}" class="sidebar-nav-link{{ request()->routeIs('transitions.*') ? ' active' : '' }}">
             Student Transition Records
        </a>

        <a href="{{ route('report') }}" class="sidebar-nav-link{{ request()->routeIs('report') ? ' active' : '' }}">
            Report & History
        </a>

        <a href="{{ route('semester.index') }}" class="sidebar-nav-link{{ request()->routeIs('semester.*') ? ' active' : '' }}">
            Setup
        </a>
    </div>
</nav>
