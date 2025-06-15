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

                    <div class="border rounded flex flex-col py-3 p-5">
                        <div class=" p-3 flex justify-between ">
                            <span class="text-2xl font-bold"> {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}} {{$student->suffx}}</span>
                            <div class="flex gap-3">
                                <div x-data="{ openEditStudentModal: {{ $errors->any() ? 'true' : 'false' }} }" class="flex justify-between content-center">
                                    <x-secondary-button @click="openEditStudentModal = true">
                                        Edit Profile
                                    </x-secondary-button>
                                    @include('student.editStudent')
                                </div>
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
                            </div>
                        </div>

                       <div class="flex-col  ">
                            <div class=" p-3 flex ">
                                 <div class="flex flex-col py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Age</span>
                                    <span class="text-base font-bold"> {{ $student->age}} </span>
                                </div>

                                 <div class="flex flex-col px-10 py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Gender</span>
                                    <span class="text-base font-bold"> {{ $student->gender}}</span>
                                </div>
                                <div class="flex flex-col px-10 py-3 ">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Student ID</span>
                                    <span class="text-base font-bold"> {{$student->student_id}}</span>
                                </div>

                                <div class="flex flex-col px-10 py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Course & year</span>
                                    <span class="text-base font-bold"> {{$student->course_year ?? 'N/A'}}</span>
                                </div>

                                <div class="flex flex-col px-8 py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Status</span>
                                    <span class="text-base font-bold"> {{ $student->enrollment_status ?? 'N/A'}}</span>
                                </div>

                                <div class="flex flex-col px-8 py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Home Address</span>
                                    <span class="text-base font-bold"> {{ $student->home_address ?? 'N/A'}}</span>
                                </div>
                            </div>
                            <div class=" p-3 flex">
                                <div class="flex flex-col py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Father's Occupation</span>
                                    <span class="text-base font-bold"> {{ $student->father_occupation}}</span>
                                </div>

                                <div class="flex flex-col px-10 py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Mother's Occupation</span>
                                    <span class="text-base font-bold"> {{ $student->mother_occupation}}</span>
                                </div>

                                <div class="flex flex-col px-8 py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> No. of Sisters</span>
                                    <span class="text-base font-bold"> {{ $student->number_of_sisters}}</span>
                                </div>

                                <div class="flex flex-col px-10 py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> No. of Brothers</span>
                                    <span class="text-base font-bold"> {{ $student->number_of_brothers}}</span>
                                </div>

                                <div class="flex flex-col px-8 py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Ordinal Position</span>
                                    <span class="text-base font-bold"> {{ $student->ordinal_position}}</span>
                                </div>
                            </div>

                            <div class=" p-3 flex">
                                <div class="flex flex-col py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Contract</span>
                                    <span class="text-base font-bold"> {{ $student->contracts->count() }}</span>
                                </div>

                                <div class="flex flex-col px-10 py-3">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Referral</span>
                                    <span class="text-base font-bold"> 0</span>
                                </div>
                            </div>
                        </div>
                       </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


