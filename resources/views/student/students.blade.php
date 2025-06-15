<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-2xl font-bold mb-2">Student List</h1>
                    <p class="text-sm text-gray-500 mb-4">
                        Below is the list of students. You can sort, search, add, view or delete records easily.
                        Use the controls to filter students based on your needs.
                    </p>

                    <!-- Filter & Search Section -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 p-3">
                        <div class="flex justify-between items-center mb-4">
                            <form method="GET" action="{{ route('student.index') }}" x-data class="flex gap-3">
                                <!-- Sort By -->
                                <div>
                                    <label class="block text-sm mb-1 text-gray-700 dark:text-gray-300">Sort By:</label>
                                    <select name="sort_by" class="border-gray-300 rounded p-2 text-sm" @change="$root.submit()">
                                        <option value="">Select</option>
                                        <option value="student_id" {{ request('sort_by') == 'student_id' ? 'selected' : '' }}>Student ID</option>
                                        <option value="first_name" {{ request('sort_by') == 'first_name' ? 'selected' : '' }}>First Name</option>
                                        <option value="last_name" {{ request('sort_by') == 'last_name' ? 'selected' : '' }}>Last Name</option>
                                        <option value="course_year" {{ request('sort_by') == 'course_year' ? 'selected' : '' }}>Course & Year</option>
                                        <option value="enrollment_status" {{ request('sort_by') == 'enrollment_status' ? 'selected' : '' }}>Enrollment Status</option>
                                    </select>
                                </div>

                                <!-- Search Input -->
                                <div>
                                    <label class="block text-sm mb-1 text-gray-700 dark:text-gray-300 ">   </label>
                                    <x-text-input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Search by ID or Name"
                                        class="border-gray-300 rounded p-2 text-sm w-80 mt-5"
                                        @input.debounce.500ms="$root.submit()" />
                                </div>
                            </form>

                            <!-- Add Student Button -->
                            <div x-data="{ openStudentModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                <p class="text-xs text-gray-400 mt-1">Click to register a new student.</p>
                                <x-secondary-button @click="openStudentModal = true">
                                     Add New Student
                                </x-secondary-button>
                                @include('student.create')
                            </div>
                        </div>

                        <!-- Student Table -->
                        <table class="w-full border text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-white bg-gray-600 dark:bg-gray-500">
                                <tr>
                                    <th class="px-5 py-3">Student ID</th>
                                    <th class="px-1 py-3">Name</th>
                                    <th class="px-5 py-3">Course & Year</th>
                                    <th class="px-5 py-3">Contracts</th>
                                    <th class="px-5 py-3">Enrollment Status</th>
                                    <th class="px-5 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4">{{ $student->student_id }}</td>
                                        <td class="px-1 py-4">
                                            {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffx }}
                                        </td>
                                        <td class="px-6 py-4">{{ $student->course_year ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $student->contracts_count }}</td>
                                        <td class="px-6 py-4">
                                            @php $currentEnrollment = $student->currentEnrollment(); @endphp
                                            @if($currentEnrollment && $currentEnrollment->is_enrolled)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Enrolled</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Not Enrolled</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-2">
                                            <!-- View Button -->
                                            <x-secondary-button title="View Student Details">
                                                <a href="{{ route('student.show', $student->id) }}" class="btn btn-primary btn-sm">View</a>
                                            </x-secondary-button>

                                            <!-- Delete Button -->
                                            <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                                                @csrf
                                                @method('DELETE')
                                                <x-secondary-button type="submit" class="bg-red-500 text-white hover:bg-red-600" title="Delete Student">
                                                     <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="">
                                                            <path fill-rule="evenodd" d="M6 2a1 1 0 011-1h6a1 1 0 011 1v1h3a1 1 0 110 2h-1v11a2 2 0 01-2 2H5a2 2 0 01-2-2V5H2a1 1 0 110-2h3V2zm2 3a1 1 0 112 0v9a1 1 0 11-2 0V5zm4 0a1 1 0 112 0v9a1 1 0 11-2 0V5z" clip-rule="evenodd" />
                                                        </svg>
                                                </x-secondary-button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-gray-500 dark:text-gray-300">No students found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
