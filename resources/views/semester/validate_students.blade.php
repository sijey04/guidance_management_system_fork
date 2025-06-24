<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Validate Students
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow rounded-lg">
            
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('semester.index') }}" 
                   class="inline-flex items-center text-blue-600 hover:text-blue-800 transition text-sm font-medium">
                    ← Back to Academic Setup
                </a>
            </div>

            <!-- Instructions -->
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">
                Validate Students from Previous Semester
            </h2>
            <p class="text-gray-500 mb-6">
                Select and validate students from 
                <span class="font-bold">{{ $previousSemester->schoolYear->school_year }} - {{ $previousSemester->semester }}</span> 
                into the new semester 
                <span class="font-bold">{{ $newSemester->schoolYear->school_year }} - {{ $newSemester->semester }}</span>.
                You can modify their Course, Year Level, and Section before validation.
            </p>

            <!-- Filter & Search -->
            <form method="GET" action="{{ route('semester.validate', $newSemester->id) }}" x-data>
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div>
                        <label class="text-sm font-medium text-gray-600">Filter by Course:</label>
                        <select name="filter_course" onchange="this.form.submit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Courses</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->course }}" {{ request('filter_course') == $course->course ? 'selected' : '' }}>
                                    {{ $course->course }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-600">Filter by Year Level:</label>
                        <select name="filter_year_level" onchange="this.form.submit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Years</option>
                            @foreach($years as $year)
                                <option value="{{ $year->year_level }}" {{ request('filter_year_level') == $year->year_level ? 'selected' : '' }}>
                                    {{ $year->year_level }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-600">Filter by Section:</label>
                        <select name="filter_section" onchange="this.form.submit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Sections</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->section }}" {{ request('filter_section') == $section->section ? 'selected' : '' }}>
                                    {{ $section->section }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label class="text-sm font-medium text-gray-600">Search by Name or ID:</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Enter student ID or name..."
                            class="w-full mt-1 border-gray-300 rounded"
                            @change="$el.form.submit()"
                            @keydown.enter.prevent="$el.form.submit()">
                    </div>
                </div>
            </form>


            <!-- Validation Form -->
            <form method="POST" action="{{ route('semester.processValidate', $newSemester->id) }}">
                @csrf

                   <!-- Pagination -->
                    <div class="mt-4">
                        {{ $students->links() }}
                    </div>

                    <div class="mt-6 mb-3 flex justify-end">
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                            Validate Selected Students
                        </button>
                    </div>

                @if($students->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full border text-sm text-gray-700">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3">Select</th>
                                    <th class="p-3">Student Info</th>
                                    <th class="p-3">Previous Course (Year)</th>
                                    <th class="p-3">New Course</th>
                                    <th class="p-3">New Year</th>
                                    <th class="p-3">New Section</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    @php $profile = $student->profiles->first(); @endphp
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-3 text-center">
                                            <input type="checkbox" name="selected_students[]" value="{{ $student->id }}">
                                        </td>
                                        <td class="p-3">
                                            <div class="font-medium">{{ $student->first_name }} {{ $student->last_name }}</div>
                                            <div class="text-xs text-gray-500">ID: {{ $student->student_id }}</div>
                                        </td>
                                        <td class="p-3">{{ $profile->course }} ({{ $profile->year_level }})</td>
                                        <td class="p-3">
                                            <select name="students[{{ $student->id }}][course]" class="border-gray-300 rounded w-full">
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->course }}" {{ $profile->course == $course->course ? 'selected' : '' }}>
                                                        {{ $course->course }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="p-3">
                                            <select name="students[{{ $student->id }}][year_level]" class="border-gray-300 rounded w-full">
                                                @foreach($years as $year)
                                                    <option value="{{ $year->year_level }}" {{ $profile->year_level == $year->year_level ? 'selected' : '' }}>
                                                        {{ $year->year_level }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="p-3">
                                            <select name="students[{{ $student->id }}][section]" class="border-gray-300 rounded w-full">
                                                @foreach($sections as $section)
                                                    <option value="{{ $section->section }}" {{ $profile->section == $section->section ? 'selected' : '' }}>
                                                        {{ $section->section }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-6">No students found for validation based on the selected filters or previous semester.</p>
                @endif
            </form>
        </div>
    </div>
</x-app-layout>
