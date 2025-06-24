<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contracts') }}
        </h2>
    </x-slot>

    <div class="" style="padding-top:0;">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="main-content" style="margin-top: 16px; margin-bottom: 24px; padding-top: 18px;">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-2" style="color:#a82323;">All Contracts</h1>
                    <!-- Filter & Search Section -->
                    <div class="flex flex-wrap items-end gap-4 mb-6">
                        <form method="GET" action="{{ route('contracts.index') }}" class="flex gap-3 items-end">
                            <div>
                                <label class="block text-sm mb-1 text-gray-700">Sort By:</label>
                                <select name="sort_by" class="border-gray-300 rounded-lg px-3 py-2 text-sm">
                                    <option value="">Sort By</option>
                                    <option value="contract_date" {{ request('sort_by') == 'contract_date' ? 'selected' : '' }}>Contract Date</option>
                                    <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                                    <option value="total_days" {{ request('sort_by') == 'total_days' ? 'selected' : '' }}>Total Days</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm mb-1 text-gray-700"> </label>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by ID or Name" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-80" />
                            </div>
                        </form>
                        <!-- Create Contract Button -->
                        <div x-data="{ openCreateContractModal: {{ $errors->any() ? 'true' : 'false' }} }">
                            <button @click="openCreateContractModal = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">Create Contract</button>
                            @include('contracts.createContract')
                        </div>

                        <!-- Manage Contract Types Button -->
                        <a href="{{ route('contract-types.index') }}"
                            class="sign-in-btn"
                             class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">
                            Manage Contract Types
                        </a>
                    </div>
                    <!-- Contracts Table -->
                    <div class=" rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="w-full border text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr class="items-center">
                                    <th class="px-5 py-3">A.Y</th>
                                    <th class="px-2 py-3">Semester</th>
                                    <th class="">Student id</th>
                                    <th class="px-2 py-3">Student</th>
                                    <th class="px-2 py-3">Contract Type</th>
                                    <th class="px-2 py-3">Status</th>
                                    <th class="px-2 py-3">Contract Date</th>
                                    <th class="px-2 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contracts as $contract)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        
                                        <td class="px-2 py-4">{{ $contract->semester->schoolYear->school_year ?? 'N/A' }}</td>
                                        <td class="py-4">{{ $contract->semester->semester ?? 'N/A' }}</td>
                                        <td class=" py-4">{{ $contract->student->student_id }}</td>
                                        <td class=" py-4">{{ $contract->student->first_name }} {{ $contract->student->last_name }}</td>
                                       <td class="px-6 py-4">{{ $contract->contract_type ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $contract->status }}</td>
                                        <td class="px-6 py-4">{{ $contract->contract_date }}</td>
                                        <td class="px-6 py-4 text-center relative">
                                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                                <button @click="open = !open" type="button" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                                                
                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3z"/>
                                                    </svg>
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-44 bg-white border rounded shadow-lg z-20">
                                                    <!-- View -->
                                                     <div x-data="{ openEditContractModal_{{ $contract->id }}: false }">
                                                        <button @click="openMenu = false; openEditContractModal_{{ $contract->id }} = true"
                                                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                            View
                                                        </button>
                                                        @include('contracts.viewContract', ['contract' => $contract])
                                                    </div>

                                                    <!-- Edit -->
                                                    <div x-data="{ openEditContractModal_{{ $contract->id }}: false }">

                                                        <button @click="openMenu = false; openEditContractModal_{{ $contract->id }} = true"
                                                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                            Edit
                                                        </button>
                                                        @include('contracts.editContract', ['contract' => $contract])
                                                    </div>
                                                    <!-- Delete -->
                                                    <form method="POST" action="{{ route('contracts.destroy', $contract->id) }}" 
                                                        onsubmit="return confirm('Are you sure you want to delete this contract?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <!-- Mark as Completed/In Progress -->
                                                    @if($contract->status === 'In Progress')
                                                        <form method="POST" action="{{ route('contracts.markComplete', $contract->id) }}">
                                                            @csrf
                                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-green-600 hover:bg-gray-100">
                                                                Mark as Completed
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form method="POST" action="{{ route('contracts.markInProgress', $contract->id) }}">
                                                            @csrf
                                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-yellow-600 hover:bg-gray-100">
                                                                Mark as In Progress
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>


                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="mt-2 flex justify-center">
                        {{ $contracts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






