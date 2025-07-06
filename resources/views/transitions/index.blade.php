<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Movement Records') }}
        </h2>
    </x-slot>

  <div class="">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="main-content">
                <div class="p-6 space-y-6">
        <!-- Title & Description -->
        <div>
            <h1 class="text-2xl font-bold text-red-700 mb-1">Student Transitions</h1>
            <p class="text-sm text-gray-600">View and manage all student movement records. Use the filters to search by name, type, or semester.</p>
        </div>

        <!-- Filters and Add Button -->
        <div class="flex flex-wrap items-end gap-4">
            <form method="GET" action="{{ route('transitions.index') }}" class="flex flex-wrap gap-4 items-end">

                <!-- Search -->
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Search:</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search by name or ID"
                           class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full"
                           onkeydown="if (event.key === 'Enter') this.form.submit();"
                           oninput="this.form.requestSubmit()" />
                </div>

                <!-- Transition Type -->
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Type:</label>
                    <select name="transition_type" onchange="this.form.submit()" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
                        <option value="">All</option>
                        @foreach($transitionTypes as $type)
                            <option value="{{ $type }}" {{ request('transition_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Sort -->
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Sort By:</label>
                    <select name="sort" onchange="this.form.submit()" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
                        <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Newest First</option>
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Oldest First</option>
                    </select>
                </div>

                <!-- Reset -->
                <div class="self-end">
                    <a href="{{ route('transitions.index') }}" class="text-sm text-blue-600 hover:underline">Reset</a>
                </div>
            </form>

            <!-- Add Button -->
            <div x-data="{ openModal: {{ $errors->any() ? 'true' : 'false' }} }" class="ml-auto">
                <button @click="openModal = true"
                        class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                    Add Transition
                </button>
                @include('transitions.create')
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto border border-gray-200 rounded-lg mt-2 bg-white">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead style="background:#a82323;" class="text-white text-left">
                    <tr>
                        <th class="px-4 py-3">A.Y</th>
                        <th class="px-4 py-3">Semester</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($transitions as $transition)
                        <tr class="hover:bg-[#f8eaea] transition">
                            <td class="px-4 py-3">{{ $transition->semester->schoolYear->school_year ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ $transition->semester->semester ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ $transition->last_name }}, {{ $transition->first_name }}</td>
                            <td class="px-4 py-3">{{ $transition->transition_type }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($transition->transition_date)->format('F j, Y') }}</td>
                            <td class="px-4 py-3 text-center relative">
                                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                                <button @click="open = !open" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3z"/>
                                                    </svg>
                                                </button>

                                                <!-- Dropdown -->
                                                <div x-show="open" @click.away="open = false" x-transition
                                                     class="absolute right-0 mt-2 w-44 bg-white border rounded shadow-lg z-10">
                                                    <a href="{{ route('transitions.show', ['transition' => $transition->id, 'source' => 'transition']) }}">
                                                               <button class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">view</button>
                                                            </a>

                                                </button>
                                                    </a>
                                                   <form action="{{ route('transitions.destroy', $transition) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">No movement records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
            {{ $transitions->links() }}
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
