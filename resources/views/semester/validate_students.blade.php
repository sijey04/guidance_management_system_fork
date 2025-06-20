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
                <div>
                    <label class="block font-medium">Filter by Course Year:</label>
                    <select name="filter_course_year" class="border p-1 rounded">
                        <option value="">All Years</option>
                        @foreach($courseYears as $year)
                            <option value="{{ $year }}" {{ request('filter_course_year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-medium">Filter by Section:</label>
                    <select name="filter_section" class="border p-1 rounded">
                        <option value="">All Sections</option>
                        @foreach($sections as $section)
                            <option value="{{ $section }}" {{ request('filter_section') == $section ? 'selected' : '' }}>
                                {{ $section }}
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

                        <div class="flex space-x-4 mt-2">
                            <div>
                                <label class="block font-medium">Course Year:</label>
                                <select name="students[{{ $student->id }}][course_year]" class="border p-1 rounded" >
                                    <option value="">Select Year</option>
                                    @foreach($courseYears as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block font-medium">Section:</label>
                                <select name="students[{{ $student->id }}][section]" class="border p-1 rounded">
                                    <option value="">Select Section</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section }}">{{ $section }}</option>
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
