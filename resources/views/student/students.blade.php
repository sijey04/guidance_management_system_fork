<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl md:text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6 space-y-6">
                <div>
                    <h1 class="text-2xl font-bold text-red-700 mb-1">Student List</h1>
                    <p class="text-gray-600 text-sm">Manage enrolled students for the current semester. You can filter by course, year, or section, sort alphabetically, and search by name or ID.</p>
                </div>

                <!-- Filters -->
                <form method="GET" action="{{ route('student.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Course</label>
                        <select name="filter_course" onchange="this.form.submit()" class="w-full mt-1 rounded border-gray-300 text-sm">
                            <option value="">All</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->course }}" {{ request('filter_course') == $course->course ? 'selected' : '' }}>
                                    {{ $course->course }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Year Level</label>
                        <select name="filter_year_level" onchange="this.form.submit()" class="w-full mt-1 rounded border-gray-300 text-sm">
                            <option value="">All</option>
                            @foreach($years as $year)
                                <option value="{{ $year->year_level }}" {{ request('filter_year_level') == $year->year_level ? 'selected' : '' }}>
                                    {{ $year->year_level }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Section</label>
                        <select name="filter_section" onchange="this.form.submit()" class="w-full mt-1 rounded border-gray-300 text-sm">
                            <option value="">All</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->section }}" {{ request('filter_section') == $section->section ? 'selected' : '' }}>
                                    {{ $section->section }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Sort By</label>
                        <select name="sort" onchange="this.form.submit()" class="w-full mt-1 rounded border-gray-300 text-sm">
                            <option value="">Default</option>
                            <option value="student_id" {{ request('sort') == 'student_id' ? 'selected' : '' }}>Student ID</option>
                            <option value="first_name" {{ request('sort') == 'first_name' ? 'selected' : '' }}>First Name</option>
                            <option value="last_name" {{ request('sort') == 'last_name' ? 'selected' : '' }}>Last Name</option>
                        </select>
                    </div>

                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-gray-700">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Search by ID or Name"
                               class="w-full mt-1 border-gray-300 rounded px-3 py-2 text-sm"
                               onkeydown="if (event.key === 'Enter') this.form.submit();"
                               oninput="this.form.requestSubmit()"/>
                    </div>
                </form>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-3 justify-between items-center mt-4">
                    <div x-data="{ openStudentModal: {{ $errors->any() ? 'true' : 'false' }} }">
                        <button @click="openStudentModal = true"
                            class="bg-[#a82323] text-white px-4 py-2 rounded font-semibold hover:bg-red-800 transition">
                            + Add New Student
                        </button>
                        @include('student.create')
                    </div>

                    <a href="{{ route('course_year_section.index') }}"
                       class="bg-[#a82323] text-white px-4 py-2 rounded font-semibold hover:bg-red-800 transition">
                        Manage Course/Year/Section
                    </a>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto border border-gray-200 rounded-lg mt-4">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead style="background:#a82323;" class="text-white text-left">
                            <tr>
                                <th class="px-4 py-3">Student ID</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Course</th>
                                <th class="px-4 py-3">Year & Section</th>
                                <th class="px-4 py-3">Contracts</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @php
                                $activeSemester = $activeSemester ?? App\Models\Semester::where('is_current', true)->first();
                            @endphp
                            @forelse ($students as $student)
                                <tr class="hover:bg-[#fdf4f4] transition">
                                    <td class="px-4 py-3">{{ $student->student_id }}</td>
                                    <td class="px-4 py-3">
                                        {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffix }}
                                    </td>
                                    @php
                                        $profile = $activeSemester 
                                            ? $student->profiles->where('semester_id', $activeSemester->id)->first()
                                            : null;
                                    @endphp
                                    <td class="px-4 py-3">{{ $profile?->course ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $profile?->year_level ?? 'N/A' }} {{ $profile?->section ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $student->contracts_count ?? 0 }}</td>
                                    <td class="px-4 py-3 text-right">
                                        <div x-data="{ open: false }" class="relative inline-block text-left">
                                            <button @click="open = !open" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3z"/>
                                                </svg>
                                            </button>

                                            <!-- Dropdown -->
                                            <div x-show="open" @click.away="open = false"
                                                class="absolute right-0 mt-2 w-32 bg-white border rounded shadow-md z-10">
                                                <a href="{{ route('student.show', $student->id) }}"
                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View</a>
                                                <form action="{{ route('student.destroy', $student->id) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this student?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">No students found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($students instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-4 flex justify-center">
                        {{ $students->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
