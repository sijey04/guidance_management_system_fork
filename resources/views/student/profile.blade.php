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

                    <div class="border rounded flex flex-col py-6 p-5">
                        <div class=" p-3 pb-10 py-5 flex justify-between ">
                            <span class="text-2xl font-bold"> {{$student->first_name}} {{$student->last_name}}</span>
                            <x-secondary-button >Edit Profile</x-navigation-button>
                        </div>

                       <div class="flex-col  ">
                            <div class="py-5 p-3 flex ">
                                 <div class="flex flex-col py-5">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Age</span>
                                    <span class="text-base font-bold"> {{ $student->age}}</span>
                                </div>

                                 <div class="flex flex-col px-10 py-5">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Gender</span>
                                    <span class="text-base font-bold"> {{ $student->gender}}</span>
                                </div>
                                <div class="flex flex-col px-10 py-5 ">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Student ID</span>
                                    <span class="text-base font-bold"> {{$student->student_id}}</span>
                                </div>

                                <div class="flex flex-col px-10 py-5">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Course & year</span>
                                    <span class="text-base font-bold"> {{$student->course_year ?? 'N/A'}}</span>
                                </div>

                                <div class="flex flex-col px-8 py-5">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Status</span>
                                    <span class="text-base font-bold"> {{ $student->enrollment_status ?? 'N/A'}}</span>
                                </div>
                            </div>
                            <div class="py-6 p-3 flex">
                                <div class="flex flex-col py-5">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Father's Occupation</span>
                                    <span class="text-base font-bold"> {{ $student->father_occupation}}</span>
                                </div>

                                <div class="flex flex-col px-10 py-5">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Mother's Occupation</span>
                                    <span class="text-base font-bold"> {{ $student->mother_occupation}}</span>
                                </div>

                                <div class="flex flex-col px-8 py-5">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> No. of Sisters</span>
                                    <span class="text-base font-bold"> {{ $student->number_of_sisters}}</span>
                                </div>

                                <div class="flex flex-col px-10 py-5">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> No. of Brothers</span>
                                    <span class="text-base font-bold"> {{ $student->number_of_brothers}}</span>
                                </div>

                                <div class="flex flex-col px-8 py-5">
                                    <span class="text-base text-gray-400 dark:text-gray-300 font-bold"> Ordinal Position</span>
                                    <span class="text-base font-bold"> {{ $student->ordinal_position}}</span>
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


