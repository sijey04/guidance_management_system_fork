<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Validate Students for {{ $newSemester->school_year }} - {{ $newSemester->semester }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <!-- Filter Form (GET) -->
        <form method="GET" action="{{ route('semester.showValidationForm', $newSemester->id) }}" class="mb-4">
            <div class="flex space-x-4">
                <!-- Course Dropdown -->
                <div>
                    <label class="block font-medium">Filter by Course:</label>
                    <select name="filter_course" class="border p-1 rounded">
                        <option value="">All Courses</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->course }}" {{ request('filter_course') == $course->course ? 'selected' : '' }}>
                                {{ $course->course }}
                            </option>
                        @endforeach
                    </select>
                </div>

                 <!-- Year Level Dropdown -->
                <div>
                    <label class="block font-medium">Filter by Year Level:</label>
                    <select name="filter_year_level" class="border p-1 rounded">
                        <option value="">All Year Levels</option>
                        @foreach($years as $year)
                            <option value="{{ $year->year_level }}" {{ request('filter_year_level') == $year->year_level ? 'selected' : '' }}>
                                {{ $year->year_level }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Section Dropdown -->
                <div>
                    <label class="block font-medium">Filter by Section:</label>
                    <select name="filter_section" class="border p-1 rounded">
                        <option value="">All Sections</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->section }}" {{ request('filter_section') == $section->section ? 'selected' : '' }}>
                                {{ $section->section }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Apply Filters</button>
                </div>
            </div>
        </form>

        <!-- Student Validation Form (POST) -->
        <form action="{{ route('semester.processValidation', $newSemester->id) }}" method="POST">
            @csrf
            <div class="overflow-x-auto bg-white shadow p-6 rounded">
                <h3 class="text-lg font-semibold mb-4">
                    Students from Previous Semester ({{ $lastSemester->school_year }} - {{ $lastSemester->semester }})
                </h3>

                @forelse($students as $student)
                    <div class="p-3 mb-2 border rounded">
                        <label class="block font-medium">
                            <input type="checkbox" name="selected_students[]" value="{{ $student->id }}">
                            {{ $student->first_name }} {{ $student->last_name }} ({{ $student->student_id }})
                        </label>

                        <input type="hidden" name="students[{{ $student->id }}][id]" value="{{ $student->id }}">
                        <!-- Display Previous Course, Year Level, Section -->
                        @php
                            $previousProfile = $student->profiles->first(); 
                        @endphp

                        @if($previousProfile)
                            <p class="text-sm text-gray-500 mt-1">
                                Previous Course: <span class="font-semibold">{{ $previousProfile->course }}</span> |
                                Year Level: <span class="font-semibold">{{ $previousProfile->year_level }}</span> |
                                Section: <span class="font-semibold">{{ $previousProfile->section }}</span>
                            </p>
                        @else
                            <p class="text-sm text-red-500 mt-1">No previous profile data available.</p>
                        @endif
                        
                        <div>
                      
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <!-- Course Dropdown -->
                            <div>
                                <label class="text-sm text-gray-600">Course <span class="text-red-500">*</span></label>
                                <select name="students[{{ $student->id }}][course]" class="w-full mt-1 border-gray-300 rounded">
                                    <option value="">Select Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->course }}" {{ old('students.'.$student->id.'.course') == $course->course ? 'selected' : '' }}>
                                            {{ $course->course }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Year Level Dropdown -->
                            <div>
                                <label class="text-sm text-gray-600">Year Level <span class="text-red-500">*</span></label>
                                <select name="students[{{ $student->id }}][year_level]" class="w-full mt-1 border-gray-300 rounded">
                                    <option value="">Select Year Level</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year->year_level }}" {{ old('students.'.$student->id.'.year_level') == $year->year_level ? 'selected' : '' }}>
                                            {{ $year->year_level }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Section Dropdown -->
                            <div>
                                <label class="text-sm text-gray-600">Section <span class="text-red-500">*</span></label>
                                <select name="students[{{ $student->id }}][section]" class="w-full mt-1 border-gray-300 rounded">
                                    <option value="">Select Section</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->section }}" {{ old('students.'.$student->id.'.section') == $section->section ? 'selected' : '' }}>
                                            {{ $section->section }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                </div>

                @empty
                    <p>No students found from previous semester.</p>
                @endforelse

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Validate Selected Students</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
