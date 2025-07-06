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
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('transitions.show', $transition) }}"
                                   class="text-blue-600 hover:underline text-sm">View</a>
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
