<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            Reports & History
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6">

            {{-- Filter Dropdown --}}
            <form method="GET" action="{{ route('reports.report') }}" class="flex items-center space-x-4 mb-6">
                <label for="semester_id" class="text-gray-700 dark:text-gray-300 font-medium">Select Semester:</label>
                <select name="semester_id" id="semester_id" class="border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach($semesters as $semester)
                        <option value="{{ $semester->id }}" {{ $selectedSemester == $semester->id ? 'selected' : '' }}>
                            {{ $semester->school_year }} - {{ $semester->semester }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold shadow">
                    Filter
                </button>
            </form>

            {{-- Students Table --}}
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300 uppercase text-sm font-semibold">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Course & Year</th>
                            <th class="px-4 py-3 text-left">Section</th>
                            <th class="px-4 py-3 text-left">Contracts Count</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-200 divide-y divide-gray-200 dark:divide-gray-600">
                        @forelse($students as $student)
    @php
        $profile = $student->profiles->first(); // profile filtered by semester in the controller
        $contractCount = $student->contracts->count(); // filtered already in the controller
    @endphp
    <tr>
        <td>{{ $student->student_id }}</td>
        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
        <td>{{ $profile->course_year ?? 'N/A' }}</td>
        <td>{{ $profile->section ?? 'N/A' }}</td>
        <td>{{ $contractCount }}</td>
        <td>
            <a href="{{ route('reports.student-history', ['student_id' => $student->id]) }}" 
               class="text-blue-600 hover:underline font-medium">View History</a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">No records found.</td>
    </tr>
@endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
