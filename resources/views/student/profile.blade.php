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

                     <!-- Alert if no active semester profile -->
                    @if(!empty($profile))
    {{-- show something --}}
@else
    <div class="bg-yellow-100 text-yellow-800 p-3 rounded mb-4">
        No active profile found for this student for the current semester.
    </div>
@endif


{{-- @php
    $currentProfile = $student->profileForSemester($activeSemester->id);
@endphp

<x-student-info label="course_year" :value="$currentProfile->course_year ?? 'N/A'" />
<x-student-info label="Section" :value="$currentProfile->section ?? 'N/A'" />


<form action="{{ route('student.profile.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Course & Year Dropdown -->
    <div>
        <label class="text-sm text-gray-600">Course & Year</label>
        <select name="course_year" class="w-full mt-1 border-gray-300 rounded-lg" required>
            <option value="">Select</option>
            @foreach(config('student.course_years') as $courseYear)
                <option value="{{ $courseYear }}" {{ (old('course_year', $profile->course_year ?? '') == $courseYear) ? 'selected' : '' }}>
                    {{ $courseYear }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Section Dropdown -->
    <div>
        <label class="text-sm text-gray-600">Section</label>
        <select name="section" class="w-full mt-1 border-gray-300 rounded-lg" required>
            <option value="">Select Section</option>
            @foreach(config('student.sections') as $section)
                <option value="{{ $section }}" {{ (old('section', $profile->section ?? '') == $section) ? 'selected' : '' }}>
                    {{ $section }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Update Course & Section
        </button>
    </div>
</form> --}}

      

                    <!-- Student Information Card -->
                    <div class="border bg-white rounded-lg p-6 shadow space-y-6 transition hover:shadow-lg">
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-extrabold" style="color:#a82323;">
                                {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffix }}
                            </span>
                            <div class="flex gap-3">
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

                        
                        <!-- Basic Information -->
                        <h3 class="text-lg font-semibold" style="color:#a82323; border-bottom:1.5px solid #f8eaea; padding-bottom:6px;">Basic Information</h3>
                        <p class="text-sm text-gray-500 mb-3">Personal and enrollment details of the student.</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Birthday" :value="$student->birthday ? $student->birthday->format('Y-m-d') : ''" />
                            <x-student-info label="Gender" :value="$student->gender" />
                            <x-student-info label="Student ID" :value="$student->student_id" />
                            {{-- <!-- Enrollment Status -->
                            <x-student-info 
                                label="Status" 
                                :value="($profile && $profile->is_enrolled)
                                    ? '<span class=\'bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300\'>Enrolled</span>'
                                    : '<span class=\'bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300\'>Not Enrolled</span>'" 
                            /> --}}

                            <x-student-info label="Home Address" :value="$student->home_address ?? 'N/A'" />
                            
                            <!-- Course & Year and Section from Semester Profile -->
                           
                            <div class="flex flex-col bg-gray-100 dark:bg-gray-800 p-3 rounded shadow-sm">
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-500 dark:text-gray-300 font-medium"> Course, Year & Section</span>
                                <div x-data="{ open: false }">
                                <button @click="open = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:4px 15px; font-weight:500;">Update</button>
                                @include('student.updateYearSection')
                            </div>
                                </div>
                                <span class="text-base font-bold text-gray-800 dark:text-gray-100">{{ $profile?->course_year ?? 'N/A' }} - {{  $profile?->section ?? 'N/A' }}</span>
                            </div>

                            
                        </div>

                        <!-- Family Background -->
                        <h3 class="text-lg font-semibold" style="color:#a82323; border-bottom:1.5px solid #f8eaea; padding-bottom:6px; margin-top:18px;">Family Background</h3>
                        <p class="text-sm text-gray-500 mb-3">Details regarding the student's family background.</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Parent/Guardian Name" :value="$student->parent_guardian_name" />
                            <x-student-info label="Parent/Guardian Contact" :value="$student->parent_guardian_contact" />
                            <x-student-info label="Father's Occupation" :value="$student->father_occupation" />
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
