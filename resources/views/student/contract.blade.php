<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden">
                <div class="p-6 space-y-4">
                    
                    <!-- Navigation Tabs -->
                    <div>
                        @include('layouts.view-tab')
                    </div>

                    <!-- Page Description Box -->
                    <div class="flex items center justify-between bg-gray-50 dark:bg-gray-700 p-5 rounded border border-gray-300 dark:border-gray-600">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Contract History</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Below is the contract history for 
                                <span class="font-semibold">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</span>. 
                                You can add new contracts or review past ones.
                            </p>
                        </div>
                         <!-- Add Contract Button -->
                        <div class="flex items-center justify-end">
                            <div x-data="{ open: false }">
                                <x-secondary-button @click="open = true" >
                                    New Contract
                                </x-secondary-button>
                                @include('student.createContract')
                            </div>
                        </div>
                    </div>

                   

                    <!-- Contract Records Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-600 shadow-md">
                        <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                            <thead class="bg-gray-600 dark:bg-gray-500 text-white uppercase text-xs sticky top-0">
                                <tr>
                                    <th class="px-5 py-3">School Year</th>
                                    <th class="px-5 py-3">Semester</th>
                                    <th class="px-5 py-3">Contract Date</th>
                                    <th class="px-5 py-3 text-center">Total Days</th>
                                    <th class="px-5 py-3 text-center">Status</th>
                                    <th class="px-5 py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                @forelse($student->contracts as $contract)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-5 py-4">{{ $contract->semester->school_year }}</td>
                                        <td class="px-5 py-4">{{ $contract->semester->semester }}</td>
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
                                        <td colspan="6" class="text-center py-5 text-gray-400 dark:text-gray-500">
                                            No contract history found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Note Section -->
                    <div class="bg-yellow-50 dark:bg-yellow-900 border-l-4 border-yellow-400 p-4 mt-4 text-sm text-yellow-700 dark:text-yellow-200 rounded">
                        <p><strong>Note:</strong> You can view detailed contract information by clicking "View." Use the "+ Add New Contract" button to create a new entry.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
