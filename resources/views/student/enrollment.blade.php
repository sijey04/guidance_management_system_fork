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
                    
                    <!-- Tabs -->
                    <div>
                        @include('layouts.view-tab')
                    </div>

                    <!-- Enrollment History Header -->
                    <div class="bg-[#f8eaea] p-5 rounded border border-[#a82323]">
                        <h2 class="text-xl font-semibold" style="color:#a82323;">Enrollment History</h2>
                        <p class="text-sm text-gray-500">
                            Below is the enrollment history for 
                            <span class="font-semibold">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</span>. 
                        </p>

                        
                    </div>

                    <!-- Enrollment History Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-gray-700 text-left">
                                <tr>
                                    <th class="px-4 py-2">School Year</th>
                                    <th class="px-4 py-2">Semester</th>
                                    <th class="px-4 py-2">Course & Year</th>
                                    <th class="px-4 py-2">Section</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($allProfiles as $record)
                                    <tr>
                                        <td class="px-4 py-2">{{ $record->semester->school_year ?? 'N/A' }}</td>
                                        <td class="px-4 py-2">{{ $record->semester->semester ?? 'N/A' }}</td>
                                        <td class="px-4 py-2">{{ $record->course_year ?? 'N/A' }}</td>
                                        <td class="px-4 py-2">{{ $record->section ?? 'N/A' }}</td>
                                        <td>
                                            @if($record->semester?->is_current)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"> Current School Year </span>
                                            @else 
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-gray-500 py-4">No enrollment history found.</td>
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
