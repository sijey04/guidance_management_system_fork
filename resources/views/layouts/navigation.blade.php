<nav class="sidebar">
    <div>
                <a href="{{ route('dashboard') }}">
            <img src="/logo.png" alt="WMSU Logo" class="sidebar-logo">
                </a>
            </div>
    <div class="sidebar-nav">
        <a href="{{ route('dashboard') }}" class="sidebar-nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
        </a>
        <a href="{{ route('student.index') }}" class="sidebar-nav-link{{ request()->routeIs('student.*') || request()->routeIs('students.*') ? ' active' : '' }}">
            Student
        </a>
        <a href="{{ route('contracts.index') }}" class="sidebar-nav-link{{ request()->routeIs('contracts.index') ? ' active' : '' }}">
            Contracts
        </a>
        <a href="{{ route('referral') }}" class="sidebar-nav-link{{ request()->routeIs('referral') ? ' active' : '' }}">
            Referral
        </a>
        <a href="{{ route('counselings.index') }}" class="sidebar-nav-link{{ request()->routeIs('counselings.index') ? ' active' : '' }}">
            Counseling Records
        </a>
        <a href="{{ route('report') }}" class="sidebar-nav-link{{ request()->routeIs('report') ? ' active' : '' }}">
            Report & History
        </a>
        <a href="{{ route('semester.index') }}" class="sidebar-nav-link{{ request()->routeIs('semester.*') ? ' active' : '' }}">
            Setup
        </a>
    </div>
</nav>