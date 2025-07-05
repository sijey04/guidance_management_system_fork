@php
   $activeSemester = \App\Models\Semester::where('is_current', true)->first();
   $activeSchoolYear = \App\Models\SchoolYear::where('is_active', true)->with('semesters')->first();
   $disabled = !$activeSchoolYear || !$activeSemester;
@endphp

<aside class="w-64 bg-white border-r border-gray-200 h-full flex-shrink-0">
    <div class="text-center mt-3">
        <a href="{{ route('dashboard') }}">
            <img src="/logo.png" alt="WMSU Logo" class="sidebar-logo mx-auto">
        </a>
    </div>

    <div class="sidebar-nav mt-2">
        <a href="{{ route('dashboard') }}" 
           class="sidebar-nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}">
            Dashboard
        </a>

        <a href="{{ $disabled ? '#' : route('student.index') }}" 
           class="sidebar-nav-link{{ request()->routeIs('student.*') || request()->routeIs('students.*') ? ' active' : '' }} {{ $disabled ? 'opacity-50 pointer-events-none cursor-not-allowed' : '' }}">
            Student
        </a>

        <a href="{{ $disabled ? '#' : route('contracts.index') }}" 
           class="sidebar-nav-link{{ request()->routeIs('contracts.index') ? ' active' : '' }} {{ $disabled ? 'opacity-50 pointer-events-none cursor-not-allowed' : '' }}">
            Contracts
        </a>

        <a href="{{ $disabled ? '#' : route('referrals.index') }}" 
           class="sidebar-nav-link{{ request()->routeIs('referrals.*') ? ' active' : '' }} {{ $disabled ? 'opacity-50 pointer-events-none cursor-not-allowed' : '' }}">
            Referral
        </a>

        <a href="{{ $disabled ? '#' : route('counselings.index') }}" 
           class="sidebar-nav-link{{ request()->routeIs('counselings.index') ? ' active' : '' }} {{ $disabled ? 'opacity-50 pointer-events-none cursor-not-allowed' : '' }}">
            Counseling Records
        </a>

        <a href="{{ $disabled ? '#' : route('transitions.index') }}" 
           class="sidebar-nav-link{{ request()->routeIs('transitions.*') ? ' active' : '' }} {{ $disabled ? 'opacity-50 pointer-events-none cursor-not-allowed' : '' }}">
            Student Transition Records
        </a>

        <a href="{{ $disabled ? '#' : route('report') }}" 
           class="sidebar-nav-link{{ request()->routeIs('report') ? ' active' : '' }} {{ $disabled ? 'opacity-50 pointer-events-none cursor-not-allowed' : '' }}">
            Report & History
        </a>

        <a href="{{ route('semester.index') }}" 
           class="sidebar-nav-link{{ request()->routeIs('semester.*') ? ' active' : '' }}">
            Setup
        </a>
    </div>
</nav>
