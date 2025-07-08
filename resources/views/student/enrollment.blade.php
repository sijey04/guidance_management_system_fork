<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
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
                    <div>
                        @include('layouts.view-tab')
                    </div>

                    <!-- Enrollment Header with Instruction -->
                    <div class="bg-[#f8eaea] p-5 rounded border border-[#a82323]">
                        <h2 class="text-xl md:text-2xl font-bold text-[#a82323] mb-1">Enrollment History</h2>
                        <p class="text-sm text-gray-600">
                            Below is the enrollment record of 
                            <span class="font-semibold text-gray-800">
                                {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}
                            </span>.
                            It includes course, semester, section, and transition status (e.g., Dropped, Shifting, etc.).
                        </p>
                    </div>

                    <!-- Table Section -->
                    <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-md">
                        <table class="min-w-full divide-y divide-gray-200 text-sm md:text-base">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left">School Year</th>
                                    <th class="px-4 py-3 text-left">Semester</th>
                                    <th class="px-4 py-3 text-left">Course & Year</th>
                                    <th class="px-4 py-3 text-left">Section</th>
                                    <th class="px-4 py-3 text-left">Transition</th>
                                    <th class="px-4 py-3 text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($allProfiles as $record)
                                    <tr class="hover:bg-[#fef2f2] transition">
                                        <td class="px-4 py-3">
                                            {{ $record->semester->schoolYear->school_year ?? 'N/A' }}
                                        </td>
                                        <td class="px-4 py-3">{{ $record->semester->semester ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">
                                            {{ $record->course ?? 'N/A' }} - {{ $record->year_level ?? 'N/A' }}
                                        </td>
                                        <td class="px-4 py-3">{{ $record->section ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">
                                            @php
                                                $transition = $student->transitions()
                                                    ->where('semester_id', $record->semester_id)
                                                    ->first();
                                            @endphp
                                            @if($transition)
                                                <span class="text-xs font-medium px-2.5 py-0.5 rounded-full
                                                    {{ $transition->transition_type === 'Dropped' ? 'bg-red-100 text-red-800' :
                                                       ($transition->transition_type === 'Shifting In' ? 'bg-yellow-100 text-yellow-800' :
                                                       'bg-gray-100 text-gray-700') }}">
                                                    {{ $transition->transition_type }}
                                                </span>
                                            @else
                                                <span class="text-xs text-gray-400">None</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3">
                                            @if($record->semester?->is_current)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    Current
                                                </span>
                                            @else
                                                <span class="bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                    Past
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-gray-500 py-6">No enrollment history found.</td>
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
