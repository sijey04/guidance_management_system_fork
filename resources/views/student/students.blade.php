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
                     <h1 class="text-xl font-bold"> Student List</h1>
                    
           
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 p-3">
                        <div class="flex justify-between content-center">
                            <form method="GET" action="{{ route('student.index') }}" x-data class="flex gap-3 mb-4">

                                <!-- Sort By  -->
                                <select name="sort_by" class="border-gray-300 rounded p-2 text-sm" @change="$root.submit()">
                                    <option value="">Sort By</option>
                                    <option value="student_id" {{ request('sort_by') == 'student_id' ? 'selected' : '' }}>Student ID</option>
                                    <option value="first_name" {{ request('sort_by') == 'first_name' ? 'selected' : '' }}>First Name</option>
                                    <option value="last_name" {{ request('sort_by') == 'last_name' ? 'selected' : '' }}>Last Name</option>
                                    <option value="course_year" {{ request('sort_by') == 'course_year' ? 'selected' : '' }}>Course & Year</option>
                                    <option value="enrollment_status" {{ request('sort_by') == 'enrollment_status' ? 'selected' : '' }}>Enrollment Status</option>
                                </select>

                                    <!-- Search Input -->
                                    <x-text-input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Search by ID or Name"
                                        class="border-gray-300 rounded p-2 text-sm w-80"
                                        @input.debounce.500ms="$root.submit()" />
                        </form>
                                {{-- Add student Button --}}
                                <div x-data="{ openStudentModal: {{ $errors->any() ? 'true' : 'false' }} }" class="py-1">
                                    <x-secondary-button @click="openStudentModal = true">
                                        Add Student
                                    </x-secondary-button>
                                    @include('student.create')
                                </div>
                        </div>
                        <table class="w-full border text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">  
                            <thead class="text-white bg-gray-600 dark:bg-gray-500 ">
                                <tr>
                                    <th scope="col" class="px-5 py-3">Student ID</th>
                                    <th scope="col" class="px-1 py-3">Student Name</th>
                                    <th scope="col" class="px-5 py-3">Course & yr</th>
                                    <th scope="col" class="px-5 py-3">Contracts</th>
                                    <th scope="col" class="px-5 py-3">Enrollment Status</th>
                                    <th scope="col" class="px-5 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td class="px-6 py-4">{{ $student->student_id }}</td>
                                        <td class="px-1 py-4">{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}} {{$student->suffx}}</td>
                                        <td class="px-6 py-4">{{ $student->course_year ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $student->contracts_count }}</td>
                                        {{-- <td>{{ $student->age ?? 'N/A' }}</td>  Handle null values --}}
                                        {{-- <td class="px-6 py-4">{{ $student->gender ?? 'N/A' }}</td> --}}
                                        <td class="px-6 py-4">
                                            @php
                                                $currentEnrollment = $student->currentEnrollment();
                                            @endphp
                                             @if($currentEnrollment && $currentEnrollment->is_enrolled)
                                                       <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Enrolled</span>

                                                    @else
                                                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Not Enrolled</span>
                                                    @endif
                                        </td>
                                        <td class="px-6 py-4 content-center flex justify-between">
                                            <x-secondary-button>
                                                {{-- View Button --}}
                                                <a href="{{ route('student.show', $student->id) }}" class=" btn btn-primary btn-sm">
                                                View
                                                </a>
                                            </x-secondary-button>
                                            <!-- Delete Button  -->
                                            <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <x-secondary-button type="submit" 
                                                        onclick="return confirm('Are you sure you want to delete this student?')"
                                                        class="bg-red-500 text-white px-2 py-1 rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="">
                                                            <path fill-rule="evenodd" d="M6 2a1 1 0 011-1h6a1 1 0 011 1v1h3a1 1 0 110 2h-1v11a2 2 0 01-2 2H5a2 2 0 01-2-2V5H2a1 1 0 110-2h3V2zm2 3a1 1 0 112 0v9a1 1 0 11-2 0V5zm4 0a1 1 0 112 0v9a1 1 0 11-2 0V5z" clip-rule="evenodd" />
                                                        </svg>
                                                    </x-secondary-button>
                                            </form>
                                        </td>
                                        {{-- <td>{{ $student->home_address ?? 'N/A' }}</td>
                                        <td>{{ $student->father_occupation ?? 'N/A' }}</td>
                                        <td>{{ $student->mother_occupation ?? 'N/A' }}</td>
                                        <td>{{ $student->number_of_sisters ?? 'N/A' }}</td>
                                        <td>{{ $student->number_of_brothers ?? 'N/A' }}</td>
                                        <td>{{ $student->ordinal_position ?? 'N/A' }}</td>
                                        <td>{{ $student->enrolled_semester ?? 'N/A' }}</td>
                                        <td>{{ $student->enrollment_date ? $student->enrollment_date->format('Y-m-d') : 'N/A' }}</td> {{-- Date formatting --}}
                                        {{-- Add Action Links/Buttons Here (Optional) --}} 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                    {{ $students->links() }} {{-- Add pagination --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


