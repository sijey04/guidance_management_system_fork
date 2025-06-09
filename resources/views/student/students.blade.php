<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     
                    <div class="flex items-center justify-between">
                        <h1 class="font-xl">Student List</h1>
                          <a href="{{ route('student.create') }}" class="btn btn-primary mb-4"> <x-secondary-button >Add New Student</x-navigation-button></a>
                    </div>
                    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">  {{-- Added styling class --}}
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3">Student ID</th>
                                <th scope="col" class="px-6 py-3">Last Name</th>
                                <th scope="col" class="px-6 py-3">First Name</th>
                                <th scope="col" class="px-6 py-3">Gender</th>
                                <th scope="col" class="px-6 py-3">Enrollment Status</th>
                                <th scope="col" class="px-6 py-3">Course & yr</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td class="px-6 py-4">{{ $student->student_id }}</td>
                                    <td class="px-6 py-4">{{ $student->first_name }}</td>
                                    <td class="px-6 py-4">{{ $student->last_name }}</td>
                                    {{-- <td>{{ $student->age ?? 'N/A' }}</td>  Handle null values --}}
                                    <td class="px-6 py-4">{{ $student->gender ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 ">{{ $student->enrollment_status ?? 'N/A' }}</td>
                                    <td class="px-6 py-4">{{ $student->course_year ?? 'N/A' }}</td>
                                    <td class="px-6 py-4"> Action</td>
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