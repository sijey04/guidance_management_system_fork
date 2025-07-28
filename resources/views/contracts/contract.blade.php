<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contracts') }}
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
        .completed-badge {
            background-color: #dcfce7;
            color: #166534;
        }
        .progress-badge {
            background-color: #fef9c3;
            color: #854d0e;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="">
                <div class="bg-white rounded-lg shadow-lg p-6 space-y-6">

                    <!-- Page Title & Description -->
                    <!-- Page Title & Description -->
                    <div class="border-b border-gray-200 pb-4">
                        <h1 class="text-2xl font-bold text-red-700 mb-2">Contracts List</h1>
                        <p class="text-sm text-gray-600">
                            This page lists all contract records. You can sort, filter, search, or add new contracts. 
                            Click the three dots to view or delete individual records.
                        </p>
                    </div>
                    
                    <!-- Filters & Actions -->
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <div class="flex flex-col lg:flex-row lg:items-end gap-4">
                            <!-- Filter Form -->
                            <form method="GET" action="{{ route('contracts.index') }}" class="flex flex-wrap gap-4 items-end flex-grow">
                                <!-- Contract Type Filter -->
                                <div class="md:w-auto w-full">
                                    <label class="block text-sm text-gray-700 mb-1">Contract Type:</label>
                                    <select name="contract_type" onchange="this.form.submit()" 
                                            class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                        <option value="">All Types</option>
                                        @foreach ($contractTypes as $type)
                                            <option value="{{ $type->type }}" {{ request('contract_type') == $type->type ? 'selected' : '' }}>
                                                {{ $type->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Status Filter -->
                                <div class="md:w-auto w-full">
                                    <label class="block text-sm text-gray-700 mb-1">Status:</label>
                                    <select name="status" onchange="this.form.submit()" 
                                            class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                        <option value="">All Status</option>
                                        <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>

                                <!-- School Year Filter -->
                                <div class="md:w-auto w-full">
                                    <label class="block text-sm text-gray-700 mb-1">School Year:</label>
                                    <select name="school_year_id" onchange="this.form.submit()" 
                                            class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                        <option value="">All Years</option>
                                        @foreach ($semesters->pluck('schoolYear')->unique('id') as $year)
                                            <option value="{{ $year->id }}" {{ request('school_year_id') == $year->id ? 'selected' : '' }}>
                                                {{ $year->school_year }}
                                            </option>
                                        @endforeach
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
                                    <select name="sort_by" onchange="this.form.submit()" 
                                            class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                        <option value="">Default</option>
                                        <option value="contract_date" {{ request('sort_by') == 'contract_date' ? 'selected' : '' }}>Contract Date</option>
                                        <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                                        <option value="total_days" {{ request('sort_by') == 'total_days' ? 'selected' : '' }}>Total Days</option>
                                        <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Newest First</option>
                                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Oldest First</option>
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
                                @auth
                                    @if(auth()->user()->isCounselor())
                                        <div x-data="{ openCreateContractModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                            <button @click="openCreateContractModal = true"
                                                class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition shadow-sm hover:shadow-md flex items-center gap-2 w-full sm:w-auto justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                                Create Contract
                                            </button>
                                            @include('contracts.createContract')
                                        </div>
                                    @endif
                                @endauth

                                <a href="{{ route('contract-types.index') }}"
                                   class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition shadow-sm hover:shadow-md flex items-center gap-2 w-full sm:w-auto justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Manage Contract Types
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Status Banner (if needed) -->
                    @if(session('success'))
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-md flex items-center mb-4">
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
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-md flex items-center mb-4">
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

                    <!-- Contract Table -->
                    <!-- Table -->
                    <div class="overflow-x-auto border border-gray-200 rounded-lg mt-4 bg-white shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead style="background:#a82323;" class="text-white text-left">
                                <tr>
                                    <th class="px-4 py-3">A.Y</th>
                                    <th class="px-4 py-3">Semester</th>
                                    <th class="px-4 py-3">Student ID</th>
                                    <th class="px-4 py-3">Student</th>
                                    <th class="px-4 py-3">Contract Type</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Date</th>
                                    <th class="px-4 py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($contracts as $contract)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        <td class="px-4 py-3">{{ $contract->semester->schoolYear->school_year ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $contract->semester->semester ?? 'N/A' }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $contract->student->student_id }}</td>
                                        <td class="px-4 py-3">{{ $contract->student->last_name }},{{ $contract->student->first_name }} {{ $contract->student->middle_name }}. {{ $contract->student->suffix }}</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800 font-medium">
                                                {{ $contract->contract_type ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full font-medium inline-block
                                                {{ $contract->status === 'Completed' 
                                                    ? 'bg-green-100 text-green-800' 
                                                    : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $contract->status }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($contract->contract_date)->format('F j, Y') }}</td>
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
                                                    <a href="{{ route('contracts.view', ['id' => $contract->id, 'source' => 'contracts']) }}"
                                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition rounded-t-md">
                                                        View Details
                                                    </a>
                                                    {{-- <form method="POST" action="{{ route('contracts.destroy', $contract->id) }}"
                                                          onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition rounded-b-md">
                                                            Delete
                                                        </button>
                                                    </form> --}}
                                                    </div>
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
                                                <p>No contract records found.</p>
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
                        {{ $contracts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Help Section -->
    <div class="fixed bottom-4 right-4">
        <div x-data="{ showHelp: false }" class="relative">
            <button @click="showHelp = !showHelp" 
                    class="bg-red-700 hover:bg-red-800 text-white rounded-full p-3 shadow-lg transition-all duration-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
            <div x-show="showHelp" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 @click.away="showHelp = false" 
                 class="absolute bottom-full right-0 mb-2 w-64 bg-white rounded-lg shadow-xl p-4 text-sm">
                <h4 class="font-bold text-red-700 border-b pb-2 mb-2">Quick Help</h4>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-red-700 mr-2 mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Click <b>Create Contract</b> to add a new record</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-red-700 mr-2 mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Use the <b>filters</b> to narrow down records</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-red-700 mr-2 mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Click the <b>three dots</b> menu for more actions</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
