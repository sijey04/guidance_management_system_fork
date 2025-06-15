<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 rounded space-y-4">

                   
                    <div class="my-2">
                        @include('layouts.view-tab')
                    </div>

                    
                    {{-- <div class="bg-gray-300 border border-gray-300 text-white-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Instruction:</strong>
                        <span class="block sm:inline">You are viewing detailed information for the selected student. Use the "Edit Profile" button to make changes or the "Delete" button to remove this record.</span>
                    </div> --}}

                    <div class="border rounded flex flex-col py-3 p-5 space-y-4">

                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                                {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}} {{$student->suffx}}
                            </span>
                            <div class="flex gap-3">
                                <div x-data="{ openEditStudentModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                    <x-secondary-button @click="openEditStudentModal = true">
                                        Edit Profile
                                    </x-secondary-button>
                                    @include('student.editStudent')
                                </div>

                               <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <x-secondary-button type="submit" class="bg-red-500 text-white hover:bg-red-600" title="Delete Student">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 011-1h6a1 1 0 011 1v1h3a1 1 0 110 2h-1v11a2 2 0 01-2 2H5a2 2 0 01-2-2V5H2a1 1 0 110-2h3V2zm2 3a1 1 0 112 0v9a1 1 0 11-2 0V5zm4 0a1 1 0 112 0v9a1 1 0 11-2 0V5z" clip-rule="evenodd" />
                                            </svg>
                                    </x-secondary-button>
                                </form>
                            </div>
                        </div>

                        {{-- Basic Information --}}
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-4">Basic Information</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Age" :value="$student->age" />
                            <x-student-info label="Gender" :value="$student->gender" />
                            <x-student-info label="Student ID" :value="$student->student_id" />
                            <x-student-info label="Course & Year" :value="$student->course_year ?? 'N/A'" />
                            <x-student-info label="Status" :value="$student->enrollment_status ?? 'N/A'" />
                            <x-student-info label="Home Address" :value="$student->home_address ?? 'N/A'" />
                        </div>

                        {{-- Family Background --}}
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-4"> Family Background</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Father's Occupation" :value="$student->father_occupation" />
                            <x-student-info label="Mother's Occupation" :value="$student->mother_occupation" />
                            <x-student-info label="No. of Sisters" :value="$student->number_of_sisters" />
                            <x-student-info label="No. of Brothers" :value="$student->number_of_brothers" />
                            <x-student-info label="Ordinal Position" :value="$student->ordinal_position" />
                        </div>

                        {{-- Contract and Referral --}}
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mt-4">Other Details</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Number of Contracts" :value="$student->contracts->count()" />
                            <x-student-info label="Referrals" :value="'0'" description="No referral records yet." />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
