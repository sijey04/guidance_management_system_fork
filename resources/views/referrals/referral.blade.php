<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Referral Records') }}
        </h2>
    </x-slot>

    <!-- CSS Enhancements -->
    <style>
        /* Card hover effects */
        .hover-card {
            transition: all 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        /* Table row hover effect */
        .table-row-hover:hover {
            background-color: #f8eaea !important;
        }
        
        /* Custom scrollbar for tables */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #a82323;
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
        
        /* Status badge styles */
        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-weight: 600;
        }
        .reason-badge {
            background-color: #fef2f2;
            color: #991b1b;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- TOP SECTION: Page Title, Filters & Actions -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Page Title & Description -->
                <div class="border-b border-gray-200 pb-4 mb-6">
                    <h1 class="text-2xl font-bold text-red-700 mb-2">Referral Records</h1>
                    <p class="text-sm text-gray-600">
                        This page lists all student referral records. You can sort, filter, search, or add new referrals. 
                        Click the three dots to view or delete individual records.
                    </p>
                </div>
                
                <!-- Filters & Actions -->
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                    <div class="flex flex-col lg:flex-row lg:items-end gap-4">
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('referrals.index') }}" class="flex flex-wrap gap-4 items-end flex-grow">
                            <!-- Reason Filter -->
                            <div class="md:w-auto w-full">
                                <label class="block text-sm text-gray-700 mb-1">Reason:</label>
                                <select name="reason" onchange="this.form.submit()" 
                                        class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                    <option value="">All Reasons</option>
                                    @foreach($reasons as $reason)
                                        <option value="{{ $reason->reason }}" {{ request('reason') == $reason->reason ? 'selected' : '' }}>
                                            {{ $reason->reason }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- School Year Filter -->
                            <div class="md:w-auto w-full">
                                <label class="block text-sm text-gray-700 mb-1">School Year:</label>
                                <select name="school_year_id" onchange="this.form.submit()" 
                                        class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                    <option value="">All Years</option>
                                    @if(isset($semesters))
                                        @foreach ($semesters->pluck('schoolYear')->unique('id') as $year)
                                            <option value="{{ $year->id }}" {{ request('school_year_id') == $year->id ? 'selected' : '' }}>
                                                {{ $year->school_year }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <!-- Semester Filter -->
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
                            <div class="md:w-64 w-full">
                                <label class="block text-sm text-gray-700 mb-1">Search:</label>
                                <input type="text" name="search" value="{{ request('search') }}"
                                       placeholder="Search by ID or Name"
                                       class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition"
                                       onkeydown="if (event.key === 'Enter') this.form.submit();"
                                       oninput="this.form.requestSubmit()" />
                            </div>
                        </form>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-2 lg:flex-shrink-0">
                            <div x-data="{ openModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                <button @click="openModal = true"
                                    class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition shadow-sm hover:shadow-md flex items-center gap-2 w-full sm:w-auto justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Create Referral
                                </button>
                                @include('referrals.create', ['students' => $students, 'reasons' => $reasons])
                            </div>
                        </div>
                        <a href="{{ route('referral-reasons.index') }}"
                            class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition shadow-sm hover:shadow-md flex items-center gap-2 w-full sm:w-auto justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Manage Reasons
                        </a>
                </div>
            </div>

            <!-- BOTTOM SECTION: Status Banners & Table -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Status Banners -->
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-md flex items-center mb-6">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('warning'))
                    <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-md flex items-center mb-6">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">{{ session('warning') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Referral Table -->
                <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm custom-scrollbar">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gradient-to-r from-red-800 to-red-600 text-white text-left">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">Student ID</th>
                                    <th class="px-4 py-3 font-semibold">Student</th>
                                    <th class="px-4 py-3 font-semibold">Course</th>
                                    <th class="px-4 py-3 font-semibold">Year</th>
                                    <th class="px-4 py-3 font-semibold">Section</th>
                                    <th class="px-4 py-3 font-semibold">Reason</th>
                                    <th class="px-4 py-3 font-semibold">Date</th>
                                    <th class="px-4 py-3 font-semibold text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse ($referrals as $referral)
                                    @php
                                        $profile = $referral->student->profiles->where('semester_id', $referral->semester_id)->first()
                                            ?? $referral->student->profiles->sortByDesc('semester_id')->first();
                                    @endphp
                                    <tr class="table-row-hover">
                                        <td class="px-4 py-3 font-medium text-gray-800">{{ $referral->student->student_id }}</td>
                                        <td class="px-4 py-3">{{ $referral->student->last_name }},{{ $referral->student->first_name }} {{ $referral->student->middle_name }}. {{ $referral->student->suffix }}</td>
                                        <td class="px-4 py-3">{{ $profile?->course ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $profile?->year_level ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $profile?->section ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">
                                            <span class="status-badge reason-badge">
                                                {{ $referral->reason }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">{{ $referral->referral_date ? \Carbon\Carbon::parse($referral->referral_date)->format('F j, Y') : 'N/A' }}</td>
                                        <td class="px-4 py-3 text-center">
                                            <div x-data="{ open: false }" class="relative">
                                                <button @click="open = !open"
                                                    class="text-gray-600 hover:text-red-700 focus:outline-none rounded-full h-8 w-8 flex items-center justify-center hover:bg-red-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                                <!-- Dropdown -->
                                                <div x-show="open" @click.away="open = false" x-transition
                                                    class="absolute right-0 mt-2 w-48 bg-white shadow-lg border rounded-md z-10">
                                                    <a href="{{ route('referrals.view', ['id' => $referral->id, 'source' => 'referral']) }}"
                                                       class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 rounded-t-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                        </svg>
                                                        View Details
                                                    </a>
                                                    <form method="POST" action="{{ route('referrals.destroy', $referral->id) }}"
                                                          onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 rounded-b-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <p>No referral records found</p>
                                                <button @click="openModal = true" class="mt-2 text-sm text-red-600 hover:underline">Add a new referral record</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200">
                            {{ $referrals->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
