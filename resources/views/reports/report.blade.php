<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Report & History</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-6 space-y-6">
        {{-- Filters --}}
        <form method="GET" class="flex gap-4 items-center mb-4">
            <select name="school_year_id" class="border border-gray-300 rounded px-3 py-2">
                <option value="">Select School Year</option>
                @foreach($schoolYears as $sy)
                    <option value="{{ $sy->id }}" {{ $selectedSY == $sy->id ? 'selected' : '' }}>
                        {{ $sy->school_year }}
                    </option>
                @endforeach
            </select>

            <select name="semester_name" class="border border-gray-300 rounded px-3 py-2">
                <option value="">Select Semester</option>
                <option value="1st" {{ request('semester_name') == '1st' ? 'selected' : '' }}>1st</option>
                <option value="2nd" {{ request('semester_name') == '2nd' ? 'selected' : '' }}>2nd</option>
                <option value="Summer" {{ request('semester_name') == 'Summer' ? 'selected' : '' }}>Summer</option>
            </select>

            <button class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">Filter</button>
        </form>

        {{-- Tabs --}}
        @php $activeTab = request('tab', 'all'); @endphp
        <div class="flex gap-2">
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

        {{-- Dashboard Cards --}}
        @if($activeTab === 'all')
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white border rounded shadow p-4">
                    <p class="text-sm text-gray-500">Total Students</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $uniqueStudentCount }}</h3>
                </div>
                <div class="bg-white border rounded shadow p-4">
                    <p class="text-sm text-gray-500">Total Contracts</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $contracts->count() }}</h3>
                </div>
                <div class="bg-white border rounded shadow p-4">
                    <p class="text-sm text-gray-500">Total Referrals</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $referrals->count() }}</h3>
                </div>
                <div class="bg-white border rounded shadow p-4">
                    <p class="text-sm text-gray-500">Total Counseling</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $counselings->count() }}</h3>
                </div>
            </div>
        @endif

        {{-- Student Profiles --}}
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
                                    <td class="px-4 py-2">
                                        <a href="{{ route('reports.student.view', [
                                            'student_id' => $profile->student->id,
                                            'school_year_id' => request('school_year_id'),
                                            'semester_name' => request('semester_name')
                                        ]) }}"
                                           class="inline-block mt-2 text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                            View Records
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center py-4">No student data found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Contracts --}}
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
                                <th class="px-4 py-2">Start - End</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contracts as $contract)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $contract->student->first_name }} {{ $contract->student->last_name }}</td>
                                    <td class="px-4 py-2">{{ $contract->contract_type }}</td>
                                    <td class="px-4 py-2">{{ $contract->status }}</td>
                                    <td class="px-4 py-2">{{ $contract->start_date }} - {{ $contract->end_date }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No contracts found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Referrals --}}
        @if($activeTab === 'all' || $activeTab === 'referrals')
            <div class="bg-white border rounded shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Referrals</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Student</th>
                                <th class="px-4 py-2">Reason</th>
                                <th class="px-4 py-2">Remarks</th>
                                <th class="px-4 py-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($referrals as $referral)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $referral->student->first_name }} {{ $referral->student->last_name }}</td>
                                    <td class="px-4 py-2">{{ $referral->reason }}</td>
                                    <td class="px-4 py-2">{{ $referral->remarks }}</td>
                                    <td class="px-4 py-2">{{ $referral->referral_date }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No referrals found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Counseling --}}
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
                                <th class="px-4 py-2">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($counselings as $counseling)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                                    <td class="px-4 py-2">{{ $counseling->counseling_date }}</td>
                                    <td class="px-4 py-2">{{ $counseling->status }}</td>
                                    <td class="px-4 py-2">{{ $counseling->remarks }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No counseling records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Student Transitions --}}
        @if($activeTab === 'all' || $activeTab === 'transitions')
            <div class="bg-white border rounded shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Student Transitions</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border text-left text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Student</th>
                                <th class="px-4 py-2">Type</th>
                                <th class="px-4 py-2">From → To</th>
                                <th class="px-4 py-2">Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transitions as $transition)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $transition->first_name }} {{ $transition->last_name }}</td>
                                    <td class="px-4 py-2">{{ $transition->transition_type }}</td>
                                    <td class="px-4 py-2">{{ $transition->from_program }} → {{ $transition->to_program }}</td>
                                    <td class="px-4 py-2">{{ $transition->remark }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center py-4">No student transition records found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
