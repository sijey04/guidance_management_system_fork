<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Report & History</h2>
    </x-slot>
    
    <style>
        /* Fix sidebar overlap issues */
        @media (min-width: 768px) {
            .main-content {
                margin-left: 16rem !important; /* 16rem = 256px sidebar width */
                width: calc(100% - 16rem) !important;
            }
        }
        
        /* Enhanced table styling */
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        
        /* Improve form controls */
        input, select {
            transition: all 0.2s ease;
        }
        
        /* Fix dropdown positioning */
        .relative .absolute {
            z-index: 50;
        }
        
        /* Enhance card styling */
        .stat-card {
            transition: all 0.2s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
    
    @php $activeTab = request('tab', 'all'); @endphp
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 space-y-6">
                
                    <!-- Title & Description -->
                    <div class="border-b border-gray-200 pb-4 mb-6">
                        <h1 class="text-2xl font-bold text-red-700 mb-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Reports & History
                        </h1>
                        <p class="text-sm text-gray-600">View and analyze records data. Use the filters to focus on specific periods and record types.</p>
                    </div>

                    <!-- Filter Controls -->
                    <div class="flex flex-col md:flex-row justify-between bg-white rounded p-4 border border-gray-200 text-gray-700 gap-4">
                        <div class="flex-1">
                            <p class="text-sm">Showing records for:</p>
                            <p class="font-semibold text-lg">
                                School Year:
                                {{ $schoolYears->firstWhere('id', $selectedSY)?->school_year ?? 'Not Selected' }} |
                                Semester: {{ $selectedSem ?? 'Not Selected' }}
                            </p>
                        </div>

                        @if($selectedSY && $selectedSem)
                        <div class="flex justify-end items-center">
                            <a href="{{ route('reports.export', [
                                    'school_year_id' => $selectedSY,
                                    'semester_name' => $selectedSem,
                                    'tab' => $activeTab,
                                    'filter_course' => request('filter_course'),
                                    'filter_year' => request('filter_year'),
                                    'filter_section' => request('filter_section'),
                                    'filter_contract_type' => request('filter_contract_type'),
                                    'filter_contract_status' => request('filter_contract_status'),
                                    'filter_reason' => request('filter_reason'),
                                    'filter_counseling_status' => request('filter_counseling_status'),
                                    'filter_transition_type' => request('filter_transition_type'),
                                ]) }}"
                                class="bg-[#a82323] hover:bg-red-700 text-white px-4 py-2 rounded text-sm shadow flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Export PDF
                            </a>

                            <form action="{{ route('report.exportExcel') }}" method="GET" target="_blank">
    <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
    <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
    <input type="hidden" name="tab" value="all"> {{-- or 'contracts', 'referrals', etc. based on tab --}}
    <input type="hidden" name="filter_course" value="{{ request('filter_course') }}">
    <input type="hidden" name="filter_year" value="{{ request('filter_year') }}">
    <input type="hidden" name="filter_section" value="{{ request('filter_section') }}">
    <input type="hidden" name="filter_contract_type" value="{{ request('filter_contract_type') }}">
    <input type="hidden" name="filter_contract_status" value="{{ request('filter_contract_status') }}">
    <input type="hidden" name="filter_reason" value="{{ request('filter_reason') }}">
    <input type="hidden" name="filter_counseling_status" value="{{ request('filter_counseling_status') }}">
    <input type="hidden" name="filter_transition_type" value="{{ request('filter_transition_type') }}">

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
        Export to Excel
    </button>
</form>

                        </div>
                    @endif
                    
                        <form method="GET" class="flex flex-col sm:flex-row gap-2 sm:items-center w-full sm:w-auto">
                            <select name="school_year_id" class="border border-gray-300 rounded px-3 py-2 w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <option value="">Select School Year</option>
                                @foreach($schoolYears as $sy)
                                    <option value="{{ $sy->id }}" {{ $selectedSY == $sy->id ? 'selected' : '' }}>
                                        {{ $sy->school_year }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="semester_name" class="border border-gray-300 rounded px-3 py-2 w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <option value="">Select Semester</option>
                                <option value="1st" {{ $selectedSem == '1st' ? 'selected' : '' }}>1st</option>
                                <option value="2nd" {{ $selectedSem == '2nd' ? 'selected' : '' }}>2nd</option>
                                <option value="Summer" {{ $selectedSem == 'Summer' ? 'selected' : '' }}>Summer</option>
                            </select>

                            <button type="submit" class="bg-[#a82323] text-white px-4 py-2 rounded shadow hover:bg-red-700 w-full sm:w-auto">
                                Filter
                            </button>
                        </form>
                    </div>
                    
                    {{-- Tabs --}}
                    <div class="flex flex-wrap gap-2 mb-4 overflow-x-auto">
                        @foreach([
                            'all' => 'All',
                            'student_profiles' => 'Student Profiles',
                            'contracts' => 'Contracts',
                            'referrals' => 'Referrals',
                            'counseling' => 'Counseling',
                            'transitions' => 'Student Transitions'
                        ] as $key => $label)
                            <a href="{{ request()->fullUrlWithQuery(['tab' => $key]) }}"
                            class="px-4 py-2 rounded shadow text-sm font-medium whitespace-nowrap
                                    {{ $activeTab === $key ? 'bg-[#a82323] text-white' : 'bg-white border text-gray-700 hover:bg-gray-100' }}">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>


                    {{-- Summary Cards --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        @if($activeTab === 'all' || $activeTab === 'student_profiles')
                            <div class="bg-white border rounded shadow p-4 stat-card">
                                <p class="text-sm text-gray-500">Total Students</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalStudents ?? 0 }}</h3>
                            </div>
                        @endif

                        @if($activeTab === 'all' || $activeTab === 'contracts')
                            <div class="bg-white border rounded shadow p-4 stat-card">
                                <p class="text-sm text-gray-500">Total Contracts</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalContracts ?? 0 }}</h3>
                            </div>
                        @endif

                        @if($activeTab === 'all' || $activeTab === 'referrals')
                            <div class="bg-white border rounded shadow p-4 stat-card">
                                <p class="text-sm text-gray-500">Total Referrals</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalReferrals ?? 0 }}</h3>
                            </div>
                        @endif

                        @if($activeTab === 'all' || $activeTab === 'counseling')
                            <div class="bg-white border rounded shadow p-4 stat-card">
                                <p class="text-sm text-gray-500">Total Counseling</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalCounselings ?? 0 }}</h3>
                            </div>
                        @endif

                        @if($activeTab === 'all' || $activeTab === 'transitions')
                            <div class="bg-white border rounded shadow p-4 stat-card">
                                <p class="text-sm text-gray-500">Total Transitions</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $totalTransitions ?? 0 }}</h3>
                            </div>
                        @endif
                    </div>

                    <!-- Filters section -->
                    @if($activeTab === 'student_profiles')
                    
                        <form method="GET" class="flex flex-wrap gap-4 items-center mb-4 w-full bg-gray-50 p-4 rounded border">
                            <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
                            <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
                            <input type="hidden" name="tab" value="student_profiles">

                            <select name="filter_course" class="border px-3 py-2 rounded w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <option value="">All Courses</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->course }}" {{ request('filter_course') == $course->course ? 'selected' : '' }}>
                                        {{ $course->course }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="filter_year" class="border px-3 py-2 rounded w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <option value="">All Years</option>
                                @foreach($years as $year)
                                    <option value="{{ $year->year_level }}" {{ request('filter_year') == $year->year_level ? 'selected' : '' }}>
                                        {{ $year->year_level }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="filter_section" class="border px-3 py-2 rounded w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <option value="">All Sections</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section->section }}" {{ request('filter_section') == $section->section ? 'selected' : '' }}>
                                        {{ $section->section }}
                                    </option>
                                @endforeach
                            </select>

                            <button class="bg-[#a82323] text-white px-4 py-2 rounded shadow hover:bg-red-700 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                                Apply Filters
                            </button>
                        </form>
                    @endif
                    
                    {{-- Filters for Contracts --}}
                    @if($activeTab === 'contracts')
                    <form method="GET" class="flex flex-wrap gap-4 items-center mb-4 w-full bg-gray-50 p-4 rounded border">
                        <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
                        <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
                        <input type="hidden" name="tab" value="contracts">

                        <select name="filter_contract_type" class="border px-3 py-2 rounded w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                            <option value="">All Types</option>
                            @foreach($contractTypesList as $type)
                                <option value="{{ $type->type }}" {{ request('filter_contract_type') == $type->type ? 'selected' : '' }}>
                                    {{ $type->type }}
                                </option>
                            @endforeach
                        </select>

                        <select name="filter_contract_status" class="border px-3 py-2 rounded w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                            <option value="">All Status</option>
                            <option value="In Progress" {{ request('filter_contract_status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ request('filter_contract_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>

                        <button class="bg-[#a82323] text-white px-4 py-2 rounded shadow hover:bg-red-700 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Apply Filters
                        </button>
                    </form>
                    @endif

                    {{-- Filters for Referrals --}}
                    @if($activeTab === 'referrals')
                    <form method="GET" class="flex flex-wrap gap-4 items-center mb-4 w-full bg-gray-50 p-4 rounded border">
                        <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
                        <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
                        <input type="hidden" name="tab" value="referrals">

                        <select name="filter_reason" class="border px-3 py-2 rounded w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                            <option value="">All Reasons</option>
                            @foreach($referralReasons as $reason)
                                <option value="{{ $reason->reason }}" {{ request('filter_reason') == $reason->reason ? 'selected' : '' }}>
                                    {{ $reason->reason }}
                                </option>
                            @endforeach
                        </select>

                        <button class="bg-[#a82323] text-white px-4 py-2 rounded shadow hover:bg-red-700 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Apply Filters
                        </button>
                    </form>
                    @endif

                    {{-- Filters for Counseling --}}
                    @if($activeTab === 'counseling')
                    <form method="GET" class="flex flex-wrap gap-4 items-center mb-4 w-full bg-gray-50 p-4 rounded border">
                        <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
                        <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
                        <input type="hidden" name="tab" value="counseling">

                        <select name="filter_counseling_status" class="border px-3 py-2 rounded w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                            <option value="">All Status</option>
                            <option value="In Progress" {{ request('filter_counseling_status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ request('filter_counseling_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>

                        <button class="bg-[#a82323] text-white px-4 py-2 rounded shadow hover:bg-red-700 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Apply Filters
                        </button>
                    </form>
                    @endif
                    
                    {{-- Filters for Student Transitions --}}
                    @if($activeTab === 'transitions')
                    <form method="GET" class="flex flex-wrap gap-4 items-center mb-4 w-full bg-gray-50 p-4 rounded border">
                        <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
                        <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
                        <input type="hidden" name="tab" value="transitions">

                        <select name="filter_transition_type" class="border px-3 py-2 rounded w-full sm:w-auto focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                            <option value="">All Types</option>
                            @foreach(['Shifting In', 'Shifting Out', 'Transferring In', 'Transferring Out', 'Dropped', 'Returning Student'] as $type)
                                <option value="{{ $type }}" {{ request('filter_transition_type') == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>

                        <button class="bg-[#a82323] text-white px-4 py-2 rounded shadow hover:bg-red-700 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Apply Filters
                        </button>
                    </form>
                    @endif

                    {{-- Student Profiles Table --}}
                    @if($activeTab === 'all' || $activeTab === 'student_profiles')
                        <div class="bg-white border rounded shadow-sm overflow-hidden">
                            <div class="p-4 border-b bg-gray-50">
                                <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Student Profiles
                                </h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Student ID</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Course</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Year & Section</th>
                                            <th class="px-4 py-3 text-center font-medium text-gray-500 uppercase tracking-wider">Contracts</th>
                                            <th class="px-4 py-3 text-center font-medium text-gray-500 uppercase tracking-wider">Referrals</th>
                                            <th class="px-4 py-3 text-center font-medium text-gray-500 uppercase tracking-wider">Counseling</th>
                                            <th class="px-4 py-3 text-right font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($students as $profile)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3">{{ $profile->student->student_id }}</td>
                                            <td class="px-4 py-3 font-medium">{{ $profile->student->first_name }} {{ $profile->student->last_name }}</td>
                                            <td class="px-4 py-3">{{ $profile->course }}</td>
                                            <td class="px-4 py-3">{{ $profile->year_level }} {{ $profile->section }}</td>
                                            <td class="px-4 py-3 text-center">
                                                <span class="px-2 py-1 text-xs rounded-full {{ ($contractCounts[$profile->student_id] ?? 0) > 0 ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-600' }}">
                                                    {{ $contractCounts[$profile->student_id] ?? 0 }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-center">
                                                <span class="px-2 py-1 text-xs rounded-full {{ ($referralCounts[$profile->student_id] ?? 0) > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-600' }}">
                                                    {{ $referralCounts[$profile->student_id] ?? 0 }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-center">
                                                <span class="px-2 py-1 text-xs rounded-full {{ ($counselingCounts[$profile->student_id] ?? 0) > 0 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                                    {{ $counselingCounts[$profile->student_id] ?? 0 }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-right">
                                                <a href="{{ route('reports.student.view', [
                                                    'student_id' => $profile->student->id,
                                                    'school_year_id' => $selectedSY,
                                                    'semester_name' => $selectedSem
                                                ]) }}" class="text-blue-600 hover:text-blue-800 hover:underline inline-flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-4 text-gray-500">No student data found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    {{-- Contracts Table --}}
                    @if($activeTab === 'all' || $activeTab === 'contracts')
                        <div class="bg-white border rounded shadow-sm overflow-hidden">
                            <div class="p-4 border-b bg-gray-50">
                                <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Contracts
                                </h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                                            <th class="px-4 py-3 text-right font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($contracts as $contract)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-3 font-medium">{{ $contract->student->first_name }} {{ $contract->student->last_name }}</td>
                                                <td class="px-4 py-3">{{ $contract->contract_type }}</td>
                                                <td class="px-4 py-3">
                                                    <span class="px-2 py-1 text-xs rounded-full {{ $contract->status === 'Completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                        {{ $contract->status }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3">{{ $contract->start_date }}</td>
                                                <td class="px-4 py-3">{{ $contract->end_date }}</td>
                                                <td class="px-4 py-3 text-right">
                                                    <a href="{{ route('contracts.view', ['id' => $contract->id, 'source' => 'report']) }}" class="text-blue-600 hover:text-blue-800 hover:underline inline-flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-4 text-gray-500">No contracts found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    {{-- Referrals Table --}}
                    @if($activeTab === 'all' || $activeTab === 'referrals')
                        <div class="bg-white border rounded shadow-sm overflow-hidden">
                            <div class="p-4 border-b bg-gray-50">
                                <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                    Referrals
                                </h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Reason</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-4 py-3 text-right font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($referrals as $referral)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-3 font-medium">{{ $referral->student->first_name }} {{ $referral->student->last_name }}</td>
                                                <td class="px-4 py-3">{{ $referral->reason }}</td>
                                                <td class="px-4 py-3">{{ $referral->referral_date }}</td>
                                                <td class="px-4 py-3 text-right">
                                                    <a href="{{ route('referrals.view', ['id' => $referral->id, 'source' => 'report']) }}" class="text-blue-600 hover:text-blue-800 hover:underline inline-flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-4 text-gray-500">No referrals found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    {{-- Counseling Table --}}
                    @if($activeTab === 'all' || $activeTab === 'counseling')
                        <div class="bg-white border rounded shadow-sm overflow-hidden">
                            <div class="p-4 border-b bg-gray-50">
                                <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                    Counseling Records
                                </h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-4 py-3 text-right font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($counselings as $counseling)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-3 font-medium">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                                                <td class="px-4 py-3">{{ $counseling->counseling_date }}</td>
                                                <td class="px-4 py-3">
                                                    <span class="px-2 py-1 text-xs rounded-full {{ $counseling->status === 'Completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                        {{ $counseling->status }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 text-right"> 
                                                    <a href="{{ route('counseling.view', ['id' => $counseling->id, 'source' => 'report']) }}" class="text-blue-600 hover:text-blue-800 hover:underline inline-flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-4 text-gray-500">No counseling records found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    
                    {{-- Student Transitions Table --}}
                    @if($activeTab === 'transitions')
                    
                        <div class="bg-white border rounded shadow-sm overflow-hidden">
                            <div class="p-4 border-b bg-gray-50">
                                <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                    </svg>
                                    Student Transitions
                                </h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Details</th>
                                            <th class="px-4 py-3 text-right font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($transitions as $transition)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-3 font-medium">{{ $transition->student->first_name }} {{ $transition->student->last_name }}</td>
                                                <td class="px-4 py-3">
                                                    <span class="px-2 py-1 text-xs rounded-full 
                                                        {{ in_array($transition->transition_type, ['Shifting In', 'Transferring In', 'Returning Student']) 
                                                            ? 'bg-green-100 text-green-800' 
                                                            : (in_array($transition->transition_type, ['Shifting Out', 'Transferring Out']) 
                                                                ? 'bg-yellow-100 text-yellow-800' 
                                                                : 'bg-red-100 text-red-800') }}">
                                                        {{ $transition->transition_type }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3">{{ $transition->transition_date }}</td>
                                                <td class="px-4 py-3">{{ Str::limit($transition->notes, 30) }}</td>
                                                <td class="px-4 py-3 text-right">
                                                    <a href="{{ route('transitions.show', ['transition' => $transition->id, 'source' => 'report']) }}"  class="text-blue-600 hover:text-blue-800 hover:underline inline-flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-4 text-gray-500">No transition records found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
