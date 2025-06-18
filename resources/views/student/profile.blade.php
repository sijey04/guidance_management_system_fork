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
                    <div>
                        @include('layouts.view-tab')
                    </div>
                    <!-- Instruction Card -->
                    <div class="bg-[#f8eaea] p-5 rounded border border-[#a82323]" role="alert">
                        <strong class="font-bold" style="color:#a82323;">Instruction:</strong>
                        <span class="block sm:inline">You are viewing complete details of the selected student. Use the <span class="font-semibold">"Edit Profile"</span> button to update records or the <span class="font-semibold">"Delete"</span> button to remove the student profile.</span>
                    </div>
                    <!-- Student Information Card -->
                    <div class="border bg-white rounded-lg p-6 shadow space-y-6 transition hover:shadow-lg">
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-extrabold" style="color:#a82323;">
                                {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffx }}
                            </span>
                            <div class="flex gap-3">
                                <!-- Edit Button -->
                                <div x-data="{ openEditStudentModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                    <button @click="openEditStudentModal = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">Edit Profile</button>
                                    @include('student.editStudent')
                                </div>
                                <!-- Delete Button -->
                                <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="sign-in-btn" style="background:#fff; color:#a82323; border:1.5px solid #a82323; border-radius:6px; padding:7px 16px; font-weight:600;">Delete</button>
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
                            <x-student-info label="Course & Year" :value="($student->course_year ?? 'N/A') . ' - ' . ($student->section ?? 'N/A')" />
                            <x-student-info label="Status" :value="$student->enrollment_status ?? 'N/A'" />
                            <x-student-info label="Home Address" :value="$student->home_address ?? 'N/A'" />
                        </div>
                        <!-- Family Background -->
                        <h3 class="text-lg font-semibold" style="color:#a82323; border-bottom:1.5px solid #f8eaea; padding-bottom:6px; margin-top:18px;">Family Background</h3>
                        <p class="text-sm text-gray-500 mb-3">Details regarding the student's family background.</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
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
