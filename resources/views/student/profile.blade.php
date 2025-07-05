<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="main-content">
                <div class="p-6 rounded space-y-6">

                    <!-- Tabs -->
                    <div>
                        @include('layouts.view-tab')
                    </div>

                    <!-- Instruction Card -->
                    <div class="bg-[#f8eaea] p-5 rounded border border-[#a82323]" role="alert">
                        <strong class="font-bold" style="color:#a82323;">Instruction:</strong>
                        <span class="block sm:inline">
                            You are viewing complete details of the selected student. Use the 
                            <span class="font-semibold">"Edit Profile"</span> button to update records or the 
                            <span class="font-semibold">"Delete"</span> button to remove the student profile.
                        </span>
                    </div>

                    <!-- Student Information Card -->
                    <div class="border bg-white rounded-lg p-6 shadow space-y-6 transition hover:shadow-lg">
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-extrabold" style="color:#a82323;">
                                {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffix }}
                            </span>
                            <div class="flex gap-3">
                                <!-- Mark as Dropped Button + Modal -->
                                <div x-data="{ openDropModal: false }">
                                    <button @click="openDropModal = true"
                                        class="sign-in-btn"
                                        style="background:#d97706; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">
                                        Mark as Dropped
                                    </button>

                                    <!-- Drop Modal -->
                                    <div x-show="openDropModal"
                                        x-cloak
                                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                        <div @click.away="openDropModal = false"
                                            class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">

                                            <h2 class="text-lg font-semibold mb-4 text-gray-800">Confirm Drop for {{ $student->first_name }}</h2>

                                            <form action="{{ route('student.drop', $student->id) }}" method="POST">
                                                @csrf
                                                <div class="mb-4">
                                                    <label class="block text-sm font-medium text-gray-700">Remarks</label>
                                                    <textarea name="remark" rows="3"
                                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"></textarea>
                                                </div>

                                                <div class="flex justify-end gap-3">
                                                    <button type="button" @click="openDropModal = false"
                                                        class="text-gray-500 hover:underline">Cancel</button>
                                                    <button type="submit"
                                                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                                        Confirm Drop
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Button -->
                                <div x-data="{ openEditStudentModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                    <button @click="openEditStudentModal = true" class="sign-in-btn" 
                                            style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">
                                        Edit Profile
                                    </button>
                                    @include('student.editStudent')
                                </div>

                                <!-- Delete Button -->
                                <form action="{{ route('student.destroy', $student->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this student?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="sign-in-btn" 
                                            style="background:#fff; color:#a82323; border:1.5px solid #a82323; border-radius:6px; padding:7px 16px; font-weight:600;">
                                        Delete
                                    </button>
                                </form>
                                

                            </div>
                        </div>
                     @if($student->transitions()->where('transition_type', 'Dropped')->where('semester_id', $activeSemester->id)->exists())
                        <div class="mt-2">
                            <span class="bg-red-100 text-red-800 text-base font-medium px-2 py-1 rounded-full">
                                Dropped This Semester
                            </span>
                        </div>
                    @endif

                        <!-- Basic Information -->
                        <h3 class="text-lg font-semibold" style="color:#a82323; border-bottom:1.5px solid #f8eaea; padding-bottom:6px;">Basic Information</h3>
                        <p class="text-sm text-gray-500 mb-3">Personal and enrollment details of the student.</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Student ID" :value="$student->student_id" />
                            <!-- Course & Year and Section from Semester Profile -->
                            <div class="flex flex-col bg-gray-100 dark:bg-gray-800 p-3 rounded shadow-sm">
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-500 dark:text-gray-300 font-medium"> Course, Year & Section</span>
                                {{-- <div x-data="{ open: false }">
                                <button @click="open = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:4px 15px; font-weight:500;">Update</button>
                                @include('student.updateYearSection')
                            </div> --}}
                                </div>
                                <span class="text-base font-bold text-gray-800 dark:text-gray-100">{{ $profile?->course ?? 'N/A' }} - {{  $profile?->year_level ?? 'N/A' }}{{  $profile?->section ?? 'N/A' }}</span>
                            </div>
                            <x-student-info label="Birthday" :value="$student->birthday ? $student->birthday->format(' F jS, Y') : ''" />
                            <x-student-info label="Gender" :value="$student->gender" />
                            {{-- <!-- Enrollment Status -->
                            <x-student-info 
                                label="Status" 
                                :value="($profile && $profile->is_enrolled)
                                    ? '<span class=\'bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300\'>Enrolled</span>'
                                    : '<span class=\'bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300\'>Not Enrolled</span>'" 
                            /> --}}

                            <x-student-info label="Home Address" :value="$student->home_address ?? 'N/A'" />
                            <x-student-info label="Contact no." :value="$student->student_contact ?? 'N/A'" />
                            
                        </div>

                        <!-- Family Background -->
                        <div class="flex justify-between items-center" style="color:#a82323; border-bottom:1.5px solid #f8eaea; padding-bottom:6px; margin-top:25px;">
                            <h3 class="text-lg font-semibold">Family Background</h3>
                             <div x-data="{ openEditFamilyModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                <button @click="openEditFamilyModal = true" class="sign-in-btn" 
                                        style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">
                                    Edit
                                </button>
                                @include('student.editFamily')
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mb-3">Details regarding the student's family background.</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Parent/Guardian Name" :value="$student->parent_guardian_name" />
                            <x-student-info label="Parent/Guardian Contact" :value="$student->parent_guardian_contact" />
                            <x-student-info label="Father's Name" :value="$student->fathers_name" />
                            <x-student-info label="Father's Occupation" :value="$student->father_occupation" />
                            <x-student-info label="Mother's Name" :value="$student->mothers_name" />
                            <x-student-info label="Mother's Occupation" :value="$student->mother_occupation" />
                            <x-student-info label="No. of Sisters" :value="$student->number_of_sisters" />
                            <x-student-info label="No. of Brothers" :value="$student->number_of_brothers" />
                            <x-student-info label="Ordinal Position" :value="$student->ordinal_position" />
                        </div>

                        <!-- Contract and Referral -->
                        <h3 class="text-lg font-semibold" style="color:#a82323; border-bottom:1.5px solid #f8eaea; padding-bottom:6px; margin-top:18px;">Other Details</h3>
                        <p class="text-sm text-gray-500 mb-3">Contract records and referrals associated with this student.</p>
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
