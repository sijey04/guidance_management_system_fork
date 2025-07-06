<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Report & History</h2>
    </x-slot>
 @php $activeTab = request('tab', 'all'); @endphp
    <div class="max-w-7xl mx-auto py-6 px-6 space-y-6">

        <div class="flex flex-col md:flex-row justify-between bg-white border rounded p-4 shadow text-gray-700 gap-4">
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
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm shadow">
                        🖨 Export PDF
                </a>

            </div>
        @endif
            <form method="GET" class="flex flex-col sm:flex-row gap-2 sm:items-center w-full sm:w-auto">
                <select name="school_year_id" class="border border-gray-300 rounded px-3 py-2 w-full sm:w-auto">
                    <option value="">Select School Year</option>
                    @foreach($schoolYears as $sy)
                        <option value="{{ $sy->id }}" {{ $selectedSY == $sy->id ? 'selected' : '' }}>
                            {{ $sy->school_year }}
                        </option>
                    @endforeach
                </select>

                <select name="semester_name" class="border border-gray-300 rounded px-3 py-2 w-full sm:w-auto">
                    <option value="">Select Semester</option>
                    <option value="1st" {{ $selectedSem == '1st' ? 'selected' : '' }}>1st</option>
                    <option value="2nd" {{ $selectedSem == '2nd' ? 'selected' : '' }}>2nd</option>
                    <option value="Summer" {{ $selectedSem == 'Summer' ? 'selected' : '' }}>Summer</option>
                </select>

                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 w-full sm:w-auto">
                    Filter
                </button>
            </form>
        </div>

        {{-- Tabs --}}
       
        <div class="flex flex-wrap gap-2 mb-4">
        @foreach([
            'all' => 'All',
            'student_profiles' => 'Student Profiles',
            'contracts' => 'Contracts',
            'referrals' => 'Referrals',
            'counseling' => 'Counseling',
            'transitions' => 'Student Transitions'
        ] as $key => $label)
            <a href="{{ request()->fullUrlWithQuery(['tab' => $key]) }}"
            class="px-4 py-2 rounded shadow text-sm font-medium
                    {{ $activeTab === $key ? 'bg-red-600 text-white' : 'bg-white border text-gray-700 hover:bg-gray-100' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>


        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            @if($activeTab === 'all' || $activeTab === 'student_profiles')
                <div class="bg-white border rounded shadow p-4">
                    <p class="text-sm text-gray-500">Total Students</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalStudents ?? 0 }}</h3>
                </div>
            @endif

            @if($activeTab === 'all' || $activeTab === 'contracts')
                <div class="bg-white border rounded shadow p-4">
                    <p class="text-sm text-gray-500">Total Contracts</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalContracts ?? 0 }}</h3>
                </div>
            @endif

            @if($activeTab === 'all' || $activeTab === 'referrals')
                <div class="bg-white border rounded shadow p-4">
                    <p class="text-sm text-gray-500">Total Referrals</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalReferrals ?? 0 }}</h3>
                </div>
            @endif

            @if($activeTab === 'all' || $activeTab === 'counseling')
                <div class="bg-white border rounded shadow p-4">
                    <p class="text-sm text-gray-500">Total Counseling</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalCounselings ?? 0 }}</h3>
                </div>
            @endif

            @if($activeTab === 'all' || $activeTab === 'transitions')
                <div class="bg-white border rounded shadow p-4">
                    <p class="text-sm text-gray-500">Total Transitions</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalTransitions ?? 0 }}</h3>
                </div>
            @endif
        </div>


        
        @if($activeTab === 'student_profiles')
        <form method="GET" class="flex flex-wrap gap-4 items-center mb-4 w-full">
            <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
            <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
            <input type="hidden" name="tab" value="student_profiles">

            <select name="filter_course" class="border px-3 py-2 rounded w-full sm:w-auto">
                <option value="">All Courses</option>
                @foreach($courses as $course)
                    <option value="{{ $course->course }}" {{ request('filter_course') == $course->course ? 'selected' : '' }}>
                        {{ $course->course }}
                    </option>
                @endforeach
            </select>

            <select name="filter_year" class="border px-3 py-2 rounded w-full sm:w-auto">
                <option value="">All Years</option>
                @foreach($years as $year)
                    <option value="{{ $year->year_level }}" {{ request('filter_year') == $year->year_level ? 'selected' : '' }}>
                        {{ $year->year_level }}
                    </option>
                @endforeach
            </select>

            <select name="filter_section" class="border px-3 py-2 rounded w-full sm:w-auto">
                <option value="">All Sections</option>
                @foreach($sections as $section)
                    <option value="{{ $section->section }}" {{ request('filter_section') == $section->section ? 'selected' : '' }}>
                        {{ $section->section }}
                    </option>
                @endforeach
            </select>

            <button class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">Apply</button>
        </form>
        @endif

        {{-- Filters for Contracts --}}
        @if($activeTab === 'contracts')
        <form method="GET" class="flex flex-wrap gap-4 items-center mb-4 w-full">
            <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
            <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
            <input type="hidden" name="tab" value="contracts">

            <select name="filter_contract_type" class="border px-3 py-2 rounded w-full sm:w-auto">
                <option value="">All Types</option>
                @foreach($contractTypesList as $type)
                    <option value="{{ $type->type }}" {{ request('filter_contract_type') == $type->type ? 'selected' : '' }}>
                        {{ $type->type }}
                    </option>
                @endforeach
            </select>

            <select name="filter_contract_status" class="border px-3 py-2 rounded w-full sm:w-auto">
                <option value="">All Status</option>
                <option value="In Progress" {{ request('filter_contract_status') == 'In Progress' ? 'selected' : '' }}>In Progredd</option>
                <option value="Completed" {{ request('filter_contract_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <button class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">Apply</button>
        </form>
        @endif

        {{-- Filters for Referrals --}}
        @if($activeTab === 'referrals')
        <form method="GET" class="flex flex-wrap gap-4 items-center mb-4 w-full">
            <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
            <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
            <input type="hidden" name="tab" value="referrals">

            <select name="filter_reason" class="border px-3 py-2 rounded">
                <option value="">All Reasons</option>
                @foreach($referralReasons as $reason)
                    <option value="{{ $reason->reason }}" {{ request('filter_reason') == $reason->reason ? 'selected' : '' }}>
                        {{ $reason->reason }}
                    </option>
                @endforeach
            </select>

            <button class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">Apply</button>
        </form>
        @endif

        {{-- Filters for Counseling --}}
        @if($activeTab === 'counseling')
        <form method="GET" class="flex gap-4 items-center mb-4">
            <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
            <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
            <input type="hidden" name="tab" value="counseling">

            <select name="filter_counseling_status" class="border px-3 py-2 rounded w-full sm:w-auto">
                <option value="">All Status</option>
                <option value="In Progress" {{ request('filter_counseling_status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ request('filter_counseling_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <button class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">Apply</button>
        </form>
        @endif

        

        {{-- Student Profiles Table --}}
        @if($activeTab === 'all' || $activeTab === 'student_profiles')
            <div class="bg-white border rounded shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Student Profiles</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Student ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Course</th>
                                <th class="px-4 py-2">Year & Section</th>
                                <th class="px-4 py-2 text-center">Contracts</th>
                                <th class="px-4 py-2 text-center">Referrals</th>
                                <th class="px-4 py-2 text-center">Counseling</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($students as $profile)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $profile->student->student_id }}</td>
                                <td class="px-4 py-2">{{ $profile->student->first_name }} {{ $profile->student->last_name }}</td>
                                <td class="px-4 py-2">{{ $profile->course }}</td>
                                <td class="px-4 py-2">{{ $profile->year_level }} {{ $profile->section }}</td>
                                <td class="px-4 py-2 text-center">
                                    {{ $contractCounts[$profile->student_id] ?? 0 }}
                                </td>
                                <td class="px-4 py-2 text-center">
                                    {{ $referralCounts[$profile->student_id] ?? 0 }}
                                </td>
                                <td class="px-4 py-2 text-center">
                                    {{ $counselingCounts[$profile->student_id] ?? 0 }}
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('reports.student.view', [
                                        'student_id' => $profile->student->id,
                                        'school_year_id' => $selectedSY,
                                        'semester_name' => $selectedSem
                                    ]) }}" class="text-blue-600 hover:underline">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center py-4">No student data found.</td></tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        @endif

        {{-- Contracts Table --}}
        @if($activeTab === 'all' || $activeTab === 'contracts')
            <div class="bg-white border rounded shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Contracts</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Student</th>
                                <th class="px-4 py-2">Type</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Start Date</th>
                                <th class="px-4 py-2">End Date</th>
                                 <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contracts as $contract)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $contract->student->first_name }} {{ $contract->student->last_name }}</td>
                                    <td class="px-4 py-2">{{ $contract->contract_type }}</td>
                                    <td class="px-4 py-2">{{ $contract->status }}</td>
                                    <td class="px-4 py-2">{{ $contract->start_date }} </td>
                                        <td> {{ $contract->end_date }}</td>
                                 <td class="px-4 py-2">
                                    <a href="{{ route('contracts.view', ['id' => $contract->id, 'source' => 'report']) }}">View</a>

                                </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No contracts found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Referrals Table --}}
        @if($activeTab === 'all' || $activeTab === 'referrals')
            <div class="bg-white border rounded shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Referrals</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Student</th>
                                <th class="px-4 py-2">Reason</th>
                                <th class="px-4 py-2">Date</th>
                                 <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($referrals as $referral)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $referral->student->first_name }} {{ $referral->student->last_name }}</td>
                                    <td class="px-4 py-2">{{ $referral->reason }}</td>
                                    <td class="px-4 py-2">{{ $referral->referral_date }}</td>
                                    <td class="px-4 py-2"><a href="{{ route('referrals.view', ['id' => $referral->id, 'source' => 'report']) }}"
                                            class="text-blue-600 hover:underline">
                                            View
                                            </a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No referrals found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Counseling Table --}}
        @if($activeTab === 'all' || $activeTab === 'counseling')
            <div class="bg-white border rounded shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Counseling Records</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Student</th>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Status</th>
                                 <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($counselings as $counseling)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                                    <td class="px-4 py-2">{{ $counseling->counseling_date }}</td>
                                    <td class="px-4 py-2">{{ $counseling->status }}</td>
                                    <td> 
                                        <a href="{{ route('counseling.view', ['id' => $counseling->id, 'source' => 'report']) }}"
                                            class="text-blue-600 hover:underline">
                                            View
                                            </a>

                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No counseling records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Student Transitions Table --}}
        @if( $activeTab === 'transitions')
        <form method="GET" class="flex flex-wrap gap-4 items-center mb-4 w-full">
            <input type="hidden" name="school_year_id" value="{{ $selectedSY }}">
            <input type="hidden" name="semester_name" value="{{ $selectedSem }}">
            <input type="hidden" name="tab" value="transitions">

            <select name="filter_transition_type" class="border px-3 py-2 rounded w-full sm:w-auto">
                <option value="">All Types</option>
                @foreach(['Shifting In', 'Shifting Out', 'Transferring In', 'Transferring Out', 'Dropped', 'Returning Student'] as $type)
                    <option value="{{ $type }}" {{ request('filter_transition_type') == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>

            <button class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">Apply</button>
        </form>
            <div class="bg-white border rounded shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Student Transitions</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3">A.Y</th>
                                <th class="px-4 py-3">Semester</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Type</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transitions as $transition)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3">{{ $transition->semester->schoolYear->school_year ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $transition->semester->semester ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $transition->last_name }}, {{ $transition->first_name }}</td>
                                    <td class="px-4 py-3">{{ $transition->transition_type }}</td>
                                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($transition->transition_date)->format('F j, Y') }}</td>
                                    <td> 
                                        <a href="{{ route('transitions.show', ['transition' => $transition->id, 'source' => 'report']) }}">
                                            View
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No transition records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
