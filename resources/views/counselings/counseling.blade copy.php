<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Counseling Records') }}
        </h2>
    </x-slot>

    <style>
        /* Fix sidebar overlap issues */
        @media (min-width: 768px) {
            .main-content {
                margin-left: 16rem !important; /* 16rem = 256px sidebar width */
                width: calc(100% - 16rem) !important;
            }
        }
        
        /* Enhanced UI styling */
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .hover-elevate:hover {
            transform: translateY(-2px);
            transition: all 0.2s ease;
        }
        
        /* Better table responsiveness */
        @media (max-width: 768px) {
            .responsive-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
            
            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }
        }
        
        /* Status badge animations */
        .status-badge {
            transition: all 0.3s ease;
        }
        .status-badge:hover {
            transform: scale(1.05);
        }
        
        /* Improved filter controls */
        .filter-control {
            transition: all 0.2s ease;
            border-radius: 0.375rem;
        }
        .filter-control:focus {
            box-shadow: 0 0 0 3px rgba(168, 35, 35, 0.15);
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 main-content">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="p-6 space-y-6">

                    <!-- Page Title -->
                    <div class="border-b border-gray-200 pb-4">
                        <h1 class="text-2xl font-bold text-red-700 mb-1">Counseling List</h1>
                        <p class="text-sm text-gray-600">
                            This page lists all student counseling records. You can sort, filter, search, or add new sessions. 
                            Click the three dots to view or delete individual records.
                        </p>
                    </div>

                    <!-- Filters & Buttons -->
                    <div class="flex flex-wrap items-end gap-4 bg-gray-50 p-4 rounded-lg shadow-sm">
                        <form method="GET" class="flex flex-wrap gap-4 items-end w-full">

                            <!-- School Year -->
                            <div class="md:w-auto w-full">
                                <label class="block text-sm text-gray-700 mb-1">School Year:</label>
                                <select name="school_year_id" onchange="this.form.submit()"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                    <option value="">All</option>
                                    @foreach ($semesters->pluck('schoolYear')->unique('id') as $year)
                                        <option value="{{ $year->id }}" {{ request('school_year_id') == $year->id ? 'selected' : '' }}>
                                            {{ $year->school_year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Semester -->
                            <div class="md:w-auto w-full">
                                <label class="block text-sm text-gray-700 mb-1">Semester:</label>
                                <select name="semester_label" onchange="this.form.submit()"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                    <option value="">All Semesters</option>
                                    <option value="1st" {{ request('semester_label') == '1st' ? 'selected' : '' }}>1st</option>
                                    <option value="2nd" {{ request('semester_label') == '2nd' ? 'selected' : '' }}>2nd</option>
                                    <option value="Summer" {{ request('semester_label') == 'Summer' ? 'selected' : '' }}>Summer</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="md:w-auto w-full">
                                <label class="block text-sm text-gray-700 mb-1">Status:</label>
                                <select name="status" onchange="this.form.submit()"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                    <option value="">All</option>
                                    <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <!-- Sort By -->
                            <div class="md:w-auto w-full">
                                <label class="block text-sm text-gray-700 mb-1">Sort By:</label>
                                <select name="sort" onchange="this.form.submit()"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                </select>
                            </div>

                            <!-- Search -->
                            <div class="flex-1">
                                <label class="block text-sm text-gray-700 mb-1">Search:</label>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Search by ID or Name"
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition"
                                    onkeydown="if (event.key === 'Enter') this.form.submit();"
                                    oninput="this.form.requestSubmit()" />
                            </div>
                        </form>

                        <!-- Create Button -->
                        <div x-data="{ openModal: false }">
                            <button @click="openModal = true"
                                class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition shadow-sm hover:shadow-md flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Create Counseling
                            </button>
                            @include('counselings.create', ['students' => $students])
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto border border-gray-200 rounded-lg mt-4 card-shadow bg-white">
                        <table class="min-w-full divide-y divide-gray-200 text-sm responsive-table">
                            <thead style="background:#a82323;" class="text-white text-left">
                                <tr>
                                    <th class="px-4 py-3">Student ID</th>
                                    <th class="px-4 py-3">Student</th>
                                    <th class="px-4 py-3">Course</th>
                                    <th class="px-4 py-3">Year</th>
                                    <th class="px-4 py-3">Section</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Date</th>
                                    <th class="px-4 py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($counselings as $counseling)
                                    @php
                                        $profile = $counseling->student->profiles->where('semester_id', $counseling->semester_id)->first()
                                            ?? $counseling->student->profiles->sortByDesc('semester_id')->first();
                                    @endphp
                                    <tr class="hover:bg-[#f8eaea] transition hover-elevate">
                                        <td class="px-4 py-3">{{ $counseling->student->student_id }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                                        <td class="px-4 py-3">{{ $profile?->course ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $profile?->year_level ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $profile?->section ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full status-badge inline-block font-medium
                                                {{ $counseling->status === 'Completed' 
                                                    ? 'bg-green-100 text-green-800' 
                                                    : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $counseling->status ?? 'In Progress' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($counseling->counseling_date)->format('F j, Y') }}</td>
                                        <td class="px-4 py-3 text-center relative">
                                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                                <button @click="open = !open"
                                                    class="text-gray-600 hover:text-gray-800 focus:outline-none rounded p-1 hover:bg-gray-100 transition">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3z"/>
                                                    </svg>
                                                </button>

                                                <!-- Dropdown -->
                                                <div x-show="open" @click.away="open = false" x-transition
                                                    class="absolute right-0 mt-2 w-44 bg-white border rounded-md shadow-lg z-10">
                                                    <a href="{{ route('counseling.view', ['id' => $counseling->id, 'source' => 'counseling']) }}"
                                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition rounded-t-md">
                                                        View Details
                                                    </a>
                                                    <form method="POST" action="{{ route('counselings.destroy', $counseling->id) }}"
                                                          onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition rounded-b-md">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-8 text-gray-500">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <p>No counseling records found.</p>
                                                <p class="text-sm text-gray-400 mt-1">Try adjusting your search or filter criteria</p>
                                            </div>
                                        </td>
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
