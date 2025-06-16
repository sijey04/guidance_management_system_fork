<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-5" x-data="{ openAddModal: false, openViewModal: false, selectedCounseling: {} }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden">
                <div class="p-6 space-y-4">

                    <!-- Navigation Tabs -->
                    <div>
                        @include('layouts.view-tab')
                    </div>

                    <!-- Page Description Box -->
                    <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded border border-gray-300 dark:border-gray-600">
                        <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Counseling Records</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Below are the counseling records for 
                            <span class="font-semibold">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</span>. 
                            You may view details or add new counseling records.
                        </p>
                    </div>

                    <!-- Add Counseling Button -->
                    <div class="flex justify-end">
                        <x-secondary-button @click="openAddModal = true" class="bg-blue-600 text-white hover:bg-blue-700">
                            + New Counseling Record
                        </x-secondary-button>
                    </div>

                    <!-- Counseling Records Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-600 shadow-md">
                        <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                            <thead class="bg-gray-600 dark:bg-gray-500 text-white uppercase text-xs sticky top-0">
                                <tr>
                                    <th class="px-5 py-3">Date</th>
                                    <th class="px-5 py-3">Problem Statement</th>
                                    <th class="px-5 py-3">Evaluation</th>
                                    <th class="px-5 py-3">Action Taken</th>
                                    <th class="px-5 py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                @forelse($student->counselings as $counseling)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-5 py-4">{{ \Carbon\Carbon::parse($counseling->session_date)->format('M d, Y') }}</td>
                                        <td class="px-5 py-4">{{ Str::limit($counseling->statement_of_problem, 50, '...') }}</td>
                                        <td class="px-5 py-4">{{ Str::limit($counseling->evaluation, 50, '...') }}</td>
                                        <td class="px-5 py-4">{{ Str::limit($counseling->recommendation_action_taken, 50, '...') }}</td>
                                        <td class="px-5 py-4 text-center">
                                            <x-secondary-button 
                                                @click="selectedCounseling = {{ $counseling }}, openViewModal = true"
                                                class="text-xs bg-blue-500 text-white hover:bg-blue-600">
                                                View
                                            </x-secondary-button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-gray-400 dark:text-gray-500">
                                            No counseling records found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Note Section -->
                    <div class="bg-yellow-50 dark:bg-yellow-900 border-l-4 border-yellow-400 p-4 mt-4 text-sm text-yellow-700 dark:text-yellow-200 rounded">
                        <p><strong>Note:</strong> To add a new counseling record, click the "+ New Counseling Record" button. To view full details of a counseling session, click "View."</p>
                    </div>

                    <!-- Modals -->
                    @include('student.createCounseling')
                    @include('student.viewCounseling')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
