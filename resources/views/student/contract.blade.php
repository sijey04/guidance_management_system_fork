<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl md:text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="mb-4">
            <a href="{{ route('student.index') }}"
            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-sm font-semibold text-[#a82323] rounded hover:bg-gray-100 transition">
                ← Back to Student List
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="">
                <div class="p-6 space-y-6">

                    <!-- Tabs -->
                    @include('layouts.view-tab')

                    <!-- Info Box -->
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between bg-[#f8eaea] p-5 rounded border border-[#a82323]">
                        <div>
                            <h2 class="text-xl md:text-2xl font-bold text-[#a82323]">Contract History</h2>
                            <p class="text-sm text-gray-600 mt-1">
                                View contract records for 
                                <span class="font-semibold">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</span>. 
                                Status, duration, and semester are shown below.
                            </p>
                        </div>
                        {{-- Optional Add Contract Button --}}
                        {{-- <div x-data="{ open: false }" class="mt-4 md:mt-0">
                            <button @click="open = true"
                                    class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                                + New Contract
                            </button>
                            @include('student.createContract')
                        </div> --}}
                    </div>

                    <!-- Contracts Table -->
                    <div class="overflow-x-auto bg-white rounded-lg border border-gray-200 shadow">
                        <table class="min-w-full text-sm md:text-base text-gray-700">
                            <thead class="bg-[#a82323] text-white text-left">
                                <tr>
                                    <th class="px-4 py-3">School Year</th>
                                    <th class="px-4 py-3">Semester</th>
                                    <th class="px-4 py-3">Contract Type</th>
                                     <th class="px-4 py-3">Contract Date</th>
                                    <th class="px-4 py-3 text-center">Total Days</th>
                                    <th class="px-4 py-3 text-center">Status</th>
                                    <th class="px-4 py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($student->contracts as $contract)
                                    <tr class="hover:bg-[#fef2f2] transition">
                                        <td class="px-4 py-3">{{ $contract->semester->schoolYear->school_year ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $contract->semester->semester ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $contract->contract_type ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($contract->contract_date)->format('M d, Y') }}</td>
                                        <td class="px-4 py-3 text-center">{{ $contract->total_days ?? 'N/A' }}</td>
                                        <td class="px-4 py-3 text-center">
                                            @if($contract->status === 'Completed')
                                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    Completed
                                                </span>
                                            @else
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    {{ $contract->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-center relative">
                                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                                <button @click="open = !open" type="button" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3z"/>
                                                    </svg>
                                                </button>

                                                <div x-show="open" @click.away="open = false"
                                                     x-transition
                                                     class="absolute right-0 mt-2 w-44 bg-white border rounded shadow z-30">
                                                    <a href="{{ route('contracts.view', ['id' => $contract->id, 'source' => 'student']) }}"
                                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        View
                                                    </a>
                                                    {{-- <form method="POST" action="{{ route('contracts.destroy', $contract->id) }}"
                                                          onsubmit="return confirm('Are you sure you want to delete this contract?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                            Delete
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-gray-500 py-5">No contract records available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
