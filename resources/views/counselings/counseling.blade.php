<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">All Counseling Records</h2>
    </x-slot>


<div class="" style="padding-top:0;">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="main-content" style="margin-top: 16px; margin-bottom: 24px; padding-top: 18px;">
                <div class="p-6 text-gray-900">
    <div class="max-w-7xl mx-auto p-4" x-data="{ openModal: false }">

        {{-- <form method="GET" action="{{ route('counselings.index') }}" class="flex gap-4" id="filterForm">
                {{-- <!-- Reason Filter -->
                <select name="reason" onchange="document.getElementById('filterForm').submit()" class="border p-2 rounded">
                    <option value="">All Reasons</option>
                    @foreach($reasons as $reason)
                        <option value="{{ $reason->reason }}" {{ request('reason') == $reason->reason ? 'selected' : '' }}>
                            {{ $reason->reason }}
                        </option>
                    @endforeach
                </select> --}}

                {{-- <!-- Search Field -->
                <input type="text" name="search" placeholder="Search by ID or Name" value="{{ request('search') }}" 
                    oninput="document.getElementById('filterForm').submit()" 
                    class="border p-2 rounded w-64">
            </form> --}} 
        <!-- Create Counseling Button -->
        <button @click="openModal = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;" >
            Create Counseling
        </button>

        <!-- Include Modal (pass Alpine's scope) -->
        @include('counselings.create', ['students' => $students])

        <!-- Counseling Table -->
    <div class=" rounded-lg border border-gray-200 shadow-md bg-white mt-3">
                <table class="w-full border text-sm text-left text-gray-700">
                    <thead style="background:#a82323; color:#fff;">
                    <tr class="items-center">
                    <th class="px-5 py-3">Student ID</th>
                    <th class="px-5 py-3">Name</th>
                    <th class="px-5 py-3">Course</th>
                    <th class="px-5 py-3">Year</th>
                    <th class="px-5 py-3">Section</th>
                    <th class="px-5 py-3">Counseling Date</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($counselings as $counseling)
                     @php
                            $profile = $counseling->student->profiles->where('semester_id', $counseling->semester_id)->first();
                            if(!$profile) {
                                $profile = $counseling->student->profiles->sortByDesc('semester_id')->first();
                            }
                        @endphp
                    <tr>
                        <td class="px-2 py-4">{{ $counseling->student->student_id }}</td>
                        <td class="px-2 py-4">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                        <td class="px-2 py-4">{{ $profile?->course ?? 'N/A' }}</td>
                        <td class="px-2 py-4">{{ $profile?->year_level ?? 'N/A' }}</td>
                        <td class="px-2 py-4">{{ $profile?->section ?? 'N/A' }}</td>
                        <td class="px-2 py-4">{{ $counseling->counseling_date }}</td>
                        <!-- Inside your <tbody> foreach loop -->
                        <td class="border px-2 py-1 relative">
                            <div x-data="{ openDropdown: false }" class="relative">
                                <button @click="openDropdown = !openDropdown" class="px-2 py-1 text-gray-600 hover:text-gray-800 font-bold">
                                    &#x22EE; <!-- Vertical 3 dots -->
                                </button>
                                <div x-show="openDropdown" @click.away="openDropdown = false"
                                    class="absolute right-0 bg-white border shadow rounded mt-2 z-10 w-32">
                                    <!-- View Button -->
                                    <a href="{{ route('counselings.show', $counseling->id) }}" 
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View</a>

                                    <!-- Edit Button - triggers Edit Modal -->
                                    <button @click="$dispatch('open-edit-modal', { counseling: @json($counseling) })"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Edit
                                    </button>

                                    <!-- Delete Form -->
                                    <form method="POST" action="{{ route('counselings.destroy', $counseling->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this record?')"
                                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="mt-4">{{ $counselings->links() }}</div>
    </div>
    </div></div></div></div>
</x-app-layout>
