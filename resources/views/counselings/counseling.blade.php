<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Counseling Records') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="main-content">
                <div class="p-6 space-y-6">

                    <!-- Page Title -->
                    <div>
                        <h1 class="text-2xl font-bold text-red-700 mb-1">Counseling List</h1>
                        <p class="text-sm text-gray-600">
                            This page lists all student counseling records. You can sort, filter, search, or add new sessions. 
                            Click the three dots to view or delete individual records.
                        </p>
                    </div>

                    <!-- Filters & Buttons -->
                    <div class="flex flex-wrap items-end gap-4">
                        <form method="GET" class="flex flex-wrap gap-4 items-end w-full">

                            <!-- School Year -->
                            <div>
                                <label class="block text-sm text-gray-700 mb-1">School Year:</label>
                                <select name="school_year_id" onchange="this.form.submit()"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
                                    <option value="">All</option>
                                    @foreach ($semesters->pluck('schoolYear')->unique('id') as $year)
                                        <option value="{{ $year->id }}" {{ request('school_year_id') == $year->id ? 'selected' : '' }}>
                                            {{ $year->school_year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Semester -->
                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Semester:</label>
                                <select name="semester_label" onchange="this.form.submit()"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
                                    <option value="">All Semesters</option>
                                    <option value="1st" {{ request('semester_label') == '1st' ? 'selected' : '' }}>1st</option>
                                    <option value="2nd" {{ request('semester_label') == '2nd' ? 'selected' : '' }}>2nd</option>
                                    <option value="Summer" {{ request('semester_label') == 'Summer' ? 'selected' : '' }}>Summer</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Status:</label>
                                <select name="status" onchange="this.form.submit()"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
                                    <option value="">All</option>
                                    <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <!-- Sort By -->
                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Sort By:</label>
                                <select name="sort" onchange="this.form.submit()"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                </select>
                            </div>

                            <!-- Search -->
                            <div class="flex-1">
                                <label class="block text-sm text-gray-700 mb-1">Search:</label>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Search by ID or Name"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full"
                                    onkeydown="if (event.key === 'Enter') this.form.submit();"
                                    oninput="this.form.requestSubmit()" />
                            </div>
                        </form>

                        <!-- Create Button -->
                        <div x-data="{ openModal: false }">
                            <button @click="openModal = true"
                                class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                                Create Counseling
                            </button>
                            @include('counselings.create', ['students' => $students])
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto border border-gray-200 rounded-lg mt-4">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead style="background:#a82323;" class="text-white text-left">
                                <tr>
                                    <th class="px-4 py-3">Student ID</th>
                                    <th class="px-4 py-3">Student</th>
                                    <th class="px-4 py-3">Course</th>
                                    <th class="px-4 py-3">Year</th>
                                    <th class="px-4 py-3">Section</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Date</th>
                                    <th class="px-4 py-3 text-center"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($counselings as $counseling)
                                    @php
                                        $profile = $counseling->student->profiles->where('semester_id', $counseling->semester_id)->first()
                                            ?? $counseling->student->profiles->sortByDesc('semester_id')->first();
                                    @endphp
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        <td class="px-4 py-3">{{ $counseling->student->student_id }}</td>
                                        <td class="px-4 py-3">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                                        <td class="px-4 py-3">{{ $profile?->course ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $profile?->year_level ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $profile?->section ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full 
                                                {{ $counseling->status === 'Completed' 
                                                    ? 'bg-green-100 text-green-800' 
                                                    : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $counseling->status }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($counseling->counseling_date)->format('F j, Y') }}</td>
                                        <td class="px-4 py-3 text-center relative">
                                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                                <button @click="open = !open"
                                                    class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3z"/>
                                                    </svg>
                                                </button>

                                                <!-- Dropdown -->
                                                <div x-show="open" @click.away="open = false" x-transition
                                                    class="absolute right-0 mt-2 w-44 bg-white border rounded shadow-lg z-10">
                                                    <a href="{{ route('counseling.view', ['id' => $counseling->id, 'source' => 'counseling']) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View</a>
                                                    <form method="POST" action="{{ route('counseling.destroy', $counseling->id) }}"
                                                          onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-6 text-gray-500">No counseling records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4 flex justify-center">
                        {{ $counselings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
