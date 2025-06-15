<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 rounded">
                    <div class="my-2">
                         @include('layouts.view-tab')
                    </div>
                    <div class="border rounded py-6 p-5">
                        <div class=" p-3 pb-10 py-5">
                            <h2 class="text-xl text-gray-500 dark:text-gray-600 font-bold">View Enrollment History for {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</h2>

                            <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-white bg-gray-600 dark:bg-gray-500 ">
                                        <tr>
                                            <th scope="col" class="px-5 py-3">Academic Year</th>
                                            <th scope="col" class="px-5 py-3">Semester</th>
                                            <th scope="col" class="px-5 py-3">Enrollment Status</th>
                                            <th scope="col" class="px-5 py-3">Action</th>
                                            <th scope="col" class="px-5 py-3"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($semesters as $semester)
                                            @php
                                                $enrollment = $student->enrollments->where('semester_id', $semester->id)->first();
                                            @endphp
                                            <tr>
                                                <td class="px-6 py-4">{{ $semester->school_year }}</td>
                                                <td class="px-6 py-4">{{ $semester->semester }}</td>
                                                <td class="px-6 py-4">
                                                    @if($enrollment && $enrollment->is_enrolled)
                                                       <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Enrolled</span>

                                                    @else
                                                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Not Enrolled</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if($enrollment && $enrollment->is_enrolled)
                                                        <form action="{{ route('students.unenroll', [$student->id, $semester->id]) }}" method="POST">
                                                            @csrf
                                                            <x-secondary-button type="submit">Unenroll</x-secondary-button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('students.enroll', [$student->id, $semester->id]) }}" method="POST">
                                                            @csrf
                                                            <x-primary-button type="submit">Enroll</x-primary-button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if($activeSemester && $semester->id === $activeSemester->id)
                                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                            Active
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




