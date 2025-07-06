<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contracts') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="main-content">
                <div class="p-6 space-y-6">

                    <div>
                        <h1 class="text-2xl font-bold text-red-700 mb-1">Contracts List</h1>
                        <p class="text-sm text-gray-600">This page lists all contract records. You can sort, filter, search, or add new contracts. Click the three dots to view or delete individual records.</p>
                    </div>
                   

                    <!-- Filter & Actions -->
                    <div class="flex flex-wrap items-end gap-4">
                        <form method="GET" action="{{ route('contracts.index') }}" class="flex flex-wrap gap-4 items-end">

    <!-- Contract Type Filter -->
    <div>
        <label class="block text-sm text-gray-700 mb-1">Contract Type:</label>
        <select name="contract_type" onchange="this.form.submit()" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
            <option value="">All</option>
            @foreach ($contractTypes as $type)
                <option value="{{ $type->type }}" {{ request('contract_type') == $type->type ? 'selected' : '' }}>
                    {{ $type->type }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Status Filter -->
    <div>
        <label class="block text-sm text-gray-700 mb-1">Status:</label>
        <select name="status" onchange="this.form.submit()" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
            <option value="">All</option>
            <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <!-- School Year Filter -->
    <div>
        <label class="block text-sm text-gray-700 mb-1">School Year:</label>
        <select name="school_year_id" onchange="this.form.submit()" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
            <option value="">All</option>
            @foreach ($semesters->pluck('schoolYear')->unique('id') as $year)
                <option value="{{ $year->id }}" {{ request('school_year_id') == $year->id ? 'selected' : '' }}>
                    {{ $year->school_year }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Semester Filter -->
    <div>
        <label class="block text-sm text-gray-700 mb-1">Semester:</label>
        <select name="semester_label" onchange="this.form.submit()" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
            <option value="">All Semesters</option>
            <option value="1st" {{ request('semester_label') == '1st' ? 'selected' : '' }}>1st</option>
            <option value="2nd" {{ request('semester_label') == '2nd' ? 'selected' : '' }}>2nd</option>
            <option value="Summer" {{ request('semester_label') == 'Summer' ? 'selected' : '' }}>Summer</option>
        </select>

    </div>

    <!-- Sort By -->
    <div>
        <label class="block text-sm text-gray-700 mb-1">Sort By:</label>
        <select name="sort_by" onchange="this.form.submit()" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full">
            <option value="">Default</option>
            <option value="contract_date" {{ request('sort_by') == 'contract_date' ? 'selected' : '' }}>Contract Date</option>
            <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
            <option value="total_days" {{ request('sort_by') == 'total_days' ? 'selected' : '' }}>Total Days</option>
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


                        <!-- Buttons -->
                        <div class="flex flex-wrap gap-3">
                            <div x-data="{ openCreateContractModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                <button @click="openCreateContractModal = true"
                                    class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                                    Create Contract
                                </button>
                                @include('contracts.createContract')
                            </div>

                            <a href="{{ route('contract-types.index') }}"
                               class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                                Manage Contract Types
                            </a>
                        </div>
                    </div>

                    <!-- Contract Table -->
                    <div class="overflow-x-auto border border-gray-200 rounded-lg mt-4">
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
                                    <th class="px-4 py-3 text-center"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($contracts as $contract)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        <td class="px-4 py-3">{{ $contract->semester->schoolYear->school_year ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $contract->semester->semester ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $contract->student->student_id }}</td>
                                        <td class="px-4 py-3">{{ $contract->student->first_name }} {{ $contract->student->last_name }}</td>
                                        <td class="px-4 py-3">{{ $contract->contract_type ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full 
                                                {{ $contract->status === 'Completed' 
                                                    ? 'bg-green-100 text-green-800' 
                                                    : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $contract->status }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($contract->contract_date)->format('F j, Y') }}</td>
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
                                                    <a href="{{ route('contracts.view', ['id' => $contract->id, 'source' => 'contracts']) }}"
                                                      >
                                                        <button type="submit"
                                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                    View
                                                </button></a>
                                                    <form method="POST" action="{{ route('contracts.destroy', $contract->id) }}"
                                                          onsubmit="return confirm('Are you sure you want to delete this contract?');">
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
                                        <td colspan="8" class="text-center py-6 text-gray-500">No contracts found.</td>
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
</x-app-layout>
