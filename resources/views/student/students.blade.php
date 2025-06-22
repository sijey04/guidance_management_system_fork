<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="main-content" style="margin-top: 16px; margin-bottom: 24px; padding-top: 18px;">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-2" style="color:#a82323;">Student List</h1>
                    <p class="text-sm text-gray-500 mb-4">
                        Below is the list of students. You can sort, search, add, view or delete records easily.
                    </p>
                    <!-- Filter & Search Section -->
                    <div class="flex flex-wrap items-end gap-4 mb-6">
                        <form method="GET" action="" class="flex gap-3 items-end">
                            <div>
                                <label class="block text-sm mb-1 text-gray-700">Sort By:</label>
                                <select name="sort" class="border-gray-300 rounded-lg px-3 py-2 text-sm">
                                    <option value="">Select</option>
                                    <!-- Add sort options here -->
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm mb-1 text-gray-700"> </label>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by ID or Name" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-80" />
                            </div>
                        </form>
                        <!-- Add Student Button -->
                        <div x-data="{ openStudentModal: {{ $errors->any() ? 'true' : 'false' }} }">
                            <p class="text-xs text-gray-400 mt-1">Click to register a new student.</p>
                            <button @click="openStudentModal = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">Add New Student</button>
                            @include('student.create')
                        </div>

                        <a href="{{ route('course_year_section.index') }}" 
                            class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">
                            Manage Course/Year/Section
                        </a>




                    </div>
                    <!-- Student Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="w-full border text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="px-5 py-3">Student ID</th>
                                    <th class="px-1 py-3">Name</th>
                                    <th class="px-5 py-3">Course </th>
                                    <th class="px-5 py-3">Year & Section </th>
                                    <th class="px-5 py-3">Contracts</th>
                                    <th class="px-5 py-3 text-end "></th>
                                </tr>
                            </thead>
                            <tbody>
                               @php
                                    $activeSemester = $activeSemester ?? App\Models\Semester::where('is_current', true)->first();
                                @endphp

                                @forelse ($students as $student)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        <td class="px-6 py-4">{{ $student->student_id }}</td>
                                        <td class="px-1 py-4">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffx }}</td>
                                        
                                        @php
                                            $profile = $activeSemester 
                                                ? $student->profiles->where('semester_id', $activeSemester->id)->first()
                                                : null;
                                        @endphp

                                        <td class="px-6 py-4">{{ $profile?->course ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $profile?->year_level ?? 'N/A' }} {{ $profile?->section ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $student->contracts_count ?? 0 }}</td>

                                        <td class="px-6 py-4 flex gap-2">
                                            <a href="{{ route('student.show', $student->id) }}" class="sign-in-btn" style="background:#fff; color:#a82323;">View</a>
                                            <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="sign-in-btn" style="background:#fff; color:#a82323;">Delete</button>
                                            </form>
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
    <div class="mt-2 flex justify-center">
        {{ $students->links() }}
    </div>
@endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
