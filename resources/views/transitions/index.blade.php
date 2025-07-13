<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Movement Records') }}
        </h2>
    </x-slot>
    
    <!-- CSS Enhancements -->
    <style>
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
        
        /* Enhanced form controls */
        input, select {
            transition: all 0.2s ease;
        }
        
        /* Fix dropdown positioning */
        .relative .absolute {
            z-index: 50;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-6">
                
                <!-- Page Title & Description -->
                <div class="border-b border-gray-200 pb-4">
                    <h1 class="text-2xl font-bold text-red-700 mb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                        Student Transitions
                    </h1>
                    <p class="text-sm text-gray-600">View and manage all student movement records. Use the filters to search by name, type, or semester.</p>
                </div>

                <!-- Filters & Actions -->
                <div class="flex flex-wrap items-end gap-4 bg-gray-50 p-4 rounded-lg shadow-sm">
                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('transitions.index') }}" class="flex flex-wrap gap-4 items-end w-full">
                        <!-- Search -->
                        <div class="flex-1">
                            <label class="block text-sm text-gray-700 mb-1">Search:</label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}"
                                       placeholder="Search by name or ID"
                                       class="border-gray-300 rounded-lg pl-9 pr-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition"
                                       onkeydown="if (event.key === 'Enter') this.form.submit();"
                                       oninput="this.form.requestSubmit()" />
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Transition Type -->
                        <div class="md:w-auto w-full">
                            <label class="block text-sm text-gray-700 mb-1">Type:</label>
                            <select name="transition_type" onchange="this.form.submit()" 
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                <option value="">All Types</option>
                                @foreach($transitionTypes as $type)
                                    <option value="{{ $type }}" {{ request('transition_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sort -->
                        <div class="md:w-auto w-full">
                            <label class="block text-sm text-gray-700 mb-1">Sort By:</label>
                            <select name="sort" onchange="this.form.submit()" 
                                    class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                                <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Newest First</option>
                                <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Oldest First</option>
                            </select>
                        </div>

                        <!-- Reset Button -->
                        <div>
                            <a href="{{ route('transitions.index') }}" 
                               class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium px-4 py-2 rounded-lg transition shadow-sm flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset
                            </a>
                        </div>
                    </form>

                    <!-- Action Button -->
                    {{-- <div x-data="{ openModal: {{ $errors->any() ? 'true' : 'false' }} }">
                        <button @click="openModal = true"
                                class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition shadow-sm hover:shadow-md flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Transition
                        </button>
                        @include('transitions.create')
                    </div> --}}
                </div>

                <!-- Transitions Table -->
                <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm custom-scrollbar">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gradient-to-r from-red-800 to-red-600 text-white text-left">
                            <tr>
                                <th class="px-4 py-3 font-semibold">A.Y</th>
                                <th class="px-4 py-3 font-semibold">Semester</th>
                                <th class="px-4 py-3 font-semibold">Name</th>
                                <th class="px-4 py-3 font-semibold">Type</th>
                                <th class="px-4 py-3 font-semibold">Date</th>
                                <th class="px-4 py-3 font-semibold text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse($transitions as $transition)
                                <tr class="table-row-hover">
                                    <td class="px-4 py-3">{{ $transition->semester->schoolYear->school_year ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $transition->semester->semester ?? 'N/A' }} Sem</td>
                                    <td class="px-4 py-3 font-medium text-gray-800">{{ $transition->last_name }}, {{ $transition->first_name }}</td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $transition->transition_type === 'Transfer' ? 'bg-blue-100 text-blue-800' : ($transition->transition_type === 'Drop' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800') }}">
                                            {{ $transition->transition_type }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($transition->transition_date)->format('F j, Y') }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <div x-data="{ open: false }" class="relative">
                                            <button @click="open = !open"
                                                class="text-gray-600 hover:text-red-700 focus:outline-none rounded-full h-8 w-8 flex items-center justify-center hover:bg-red-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div x-show="open" @click.away="open = false" x-transition
                                                 class="absolute right-0 mt-2 w-48 bg-white shadow-lg border rounded-md z-10">
                                                <a href="{{ route('transitions.show', ['transition' => $transition->id, 'source' => 'transition']) }}" 
                                                   class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 rounded-t-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                    </svg>
                                                    View Details
                                                </a>
                                                <form action="{{ route('transitions.destroy', $transition) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this record?')">
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
                                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                            </svg>
                                            <p>No transition records found</p>
                                            <button @click="openModal = true" class="mt-2 text-sm text-red-600 hover:underline">Add a new transition</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="px-4 py-3 bg-gray-50 border-t border-gray-200">
                        {{ $transitions->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
