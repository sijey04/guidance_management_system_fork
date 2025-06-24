<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Referral List</h2>
    </x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="bg-white p-6 shadow rounded-lg">

        <!-- Add & Manage Buttons -->
        <div class="flex justify-between mb-4">
            <div x-data="{ openModal: false }">
                <button @click="openModal = true" class="bg-red-700 text-white px-4 py-2 rounded">Add Referral</button>
                <a href="{{ route('referral-reasons.index') }}" class="bg-red-700 text-white px-4 py-2 rounded ml-2">Manage Reasons</a>
                @include('referrals.create', ['students' => $students, 'reasons' => $reasons])
            </div>

            <!-- Filters -->
            <form method="GET" action="{{ route('referrals.index') }}" class="flex gap-4" id="filterForm">
                <!-- Reason Filter -->
                <select name="reason" onchange="document.getElementById('filterForm').submit()" class="border p-2 rounded">
                    <option value="">All Reasons</option>
                    @foreach($reasons as $reason)
                        <option value="{{ $reason->reason }}" {{ request('reason') == $reason->reason ? 'selected' : '' }}>
                            {{ $reason->reason }}
                        </option>
                    @endforeach
                </select>

                <!-- Search Field -->
                <input type="text" name="search" placeholder="Search by ID or Name" value="{{ request('search') }}" 
                    oninput="document.getElementById('filterForm').submit()" 
                    class="border p-2 rounded w-64">
            </form>
        </div>

        <!-- Referrals Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border text-sm text-left text-gray-700">
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th class="px-4 py-2">Student ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Course</th>
                        <th class="px-4 py-2">Year & Section</th>
                        <th class="px-4 py-2">Reason</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">A.Y</th>
                        <th class="px-4 py-2">Semester</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($referrals as $referral)
                        @php
    $profile = $referral->student->profiles->where('semester_id', $referral->semester_id)->first();
    if(!$profile) {
        $profile = $referral->student->profiles->sortByDesc('semester_id')->first();
    }
@endphp
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $referral->student->student_id }}</td>
                            <td class="px-4 py-2">{{ $referral->student->first_name }} {{ $referral->student->last_name }}</td>
                            <td class="px-4 py-2">{{ $profile?->course ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $profile?->year_level ?? 'N/A' }} {{ $profile?->section ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $referral->reason }}</td>
                            <td class="px-4 py-2">{{ $referral->referral_date ?? 'N/A' }}</td> <!-- Fix this -->
                            <td class="px-4 py-2">{{ $referral->semester?->schoolYear?->school_year ?? 'N/A' }}
</td>
                            <td class="px-4 py-2">{{ $referral->semester?->semester ?? 'N/A' }}</td>
                            <td class="px-4 py-2">
                                <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open">⋮</button>
                                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-32 bg-white shadow rounded z-10">
                                        <a href="{{ route('referrals.show', $referral->id) }}" class="block px-4 py-2 hover:bg-gray-100">View</a>
                                        <a href="{{ route('referrals.edit', $referral->id) }}" class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                        <form method="POST" action="{{ route('referrals.destroy', $referral->id) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="w-full px-4 py-2 text-left hover:bg-gray-100 text-red-600">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $referrals->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
</x-app-layout>
