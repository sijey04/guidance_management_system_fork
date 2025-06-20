<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            Reports & History
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 space-y-6">

            <!-- Filter & Search Bar -->
            <form method="GET" action="{{ route('reports.report') }}" class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-4">
                <div class="flex items-center space-x-3">
                    <label for="semester_id" class="text-gray-700 dark:text-gray-300 font-medium">Filter by Semester:</label>
                    <select name="semester_id" id="semester_id" class="border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Semesters</option>
                        @foreach($semesters as $semester)
                            <option value="{{ $semester->id }}" {{ $selectedSemester == $semester->id ? 'selected' : '' }}>
                                {{ $semester->school_year }} - {{ $semester->semester }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Search Bar -->
                <div class="flex items-center space-x-2">
                    <input type="text" name="search" placeholder="Search by Student ID or Name..." value="{{ request('search') }}" 
                        class="w-64 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        Apply Filters
                    </button>
                </div>
            </form>

            <!-- Table Display -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300 uppercase font-semibold">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Course & Year</th>
                            <th class="px-4 py-3 text-left">Section</th>
                            <th class="px-4 py-3 text-left">Contracts Count</th>
                            <th class="px-4 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-200 divide-y divide-gray-200 dark:divide-gray-600">
                        @forelse($students as $student)
                            @php
                                $profile = $student->profiles->first(); 
                                $contractCount = $student->contracts->count();
                            @endphp
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                                <td class="px-4 py-3">{{ $student->student_id }}</td>
                                <td class="px-4 py-3">{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td class="px-4 py-3">{{ $profile->course_year ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $profile->section ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $contractCount }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{ route('reports.student-history', ['student_id' => $student->id]) }}" 
                                       class="text-blue-600 hover:text-blue-800 font-medium underline">
                                        View History
                                    </a>
                                    <a href="{{ route('reports.view-records', ['student_id' => $student->id, 'semester_id' => $selectedSemester]) }}" 
                                        class="text-blue-600 hover:text-blue-800 font-medium underline">
                                        View Records
                                        </a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">No student records found for this filter.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
</x-app-layout>
