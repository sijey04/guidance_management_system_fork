<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="main-content">
                <div class="p-6 space-y-4">
                    <div>
                        @include('layouts.view-tab')
                    </div>
                    <!-- Page Description Box -->
                    <div class="flex items-center justify-between bg-[#f8eaea] p-5 rounded border border-[#a82323]">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-semibold" style="color:#a82323;">Contract History</h2>
                            <p class="text-sm text-gray-500">
                                Below is the contract history for 
                                <span class="font-semibold">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</span>. 
                                You can add new contracts or review past ones.
                            </p>
                        </div>
                         <!-- Add Contract Button -->
                        <div class="flex items-center justify-end">
                            <div x-data="{ open: false }">
                                <button @click="open = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">New Contract</button>
                                @include('contracts.createContract')
                            </div>
                        </div>
                    </div>
                    <!-- Contract Records Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="px-5 py-3">School Year</th>
                                    <th class="px-5 py-3">Semester</th>
                                    <th class="px-5 py-3">Contract Date</th>
                                    <th class="px-5 py-3 text-center">Total Days</th>
                                    <th class="px-5 py-3 text-center">Status</th>
                                    <th class="px-5 py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($student->contracts as $contract)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                       <td class="px-2 py-4">{{ $contract->semester->schoolYear->school_year ?? 'N/A' }}</td>
                                        <td class="py-4">{{ $contract->semester->semester ?? 'N/A' }}</td>
                                        <td class="px-5 py-4">{{ \Carbon\Carbon::parse($contract->contract_date)->format('M d, Y') }}</td>
                                        <td class="px-5 py-4 text-center">{{ $contract->total_days ?? 'N/A' }}</td>
                                        <td class="px-5 py-4 text-center">
                                            @if($contract->status === 'Completed')
                                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Completed</span>
                                            @else
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">{{ $contract->status }}</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-4 text-center">
                                            <x-secondary-button >
                                                View
                                            </x-secondary-button>
                                            {{-- Optional: Future Edit/Delete buttons --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-gray-500">No contracts found.</td>
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
