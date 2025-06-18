<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-200">Reports & History</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow p-6 rounded-md">
            <form method="GET" class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Select School Year & Semester</label>
                <select name="semester_id" onchange="this.form.submit()" class="mt-1 block w-full rounded-md border-gray-300">
                    @foreach($semesters as $semester)
                        <option value="{{ $semester->id }}" {{ $semester->id == $selectedSemester ? 'selected' : '' }}>
                            {{ $semester->school_year }} - {{ $semester->semester }}
                        </option>
                    @endforeach
                </select>
            </form>

            <h3 class="text-lg font-semibold mb-2">Enrolled Students</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-gray-200 rounded">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2">Student ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Course & Year</th>
                            <th class="px-4 py-2">Section</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($students as $student)
                            @php
                                $profile = $student->profiles->first();
                            @endphp
                            <tr>
                                <td class="px-4 py-2">{{ $student->student_id }}</td>
                                <td class="px-4 py-2">{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td class="px-4 py-2">{{ $profile->course_year ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $profile->section ?? 'N/A' }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('reports.studentHistory', $student->id) }}" class="text-blue-600 hover:underline">
                                        View History
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center py-3 text-gray-500">No students found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
