<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="mb-4">
            <a href="{{ route('student.index') }}"
            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-sm font-semibold text-[#a82323] rounded hover:bg-gray-100 transition">
                ← Back to Student List
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="main-content">
                <div class="p-6 space-y-6">

                {{-- Tabs --}}
                @include('layouts.view-tab')

                {{-- Instruction --}}
                <div class="bg-[#fef3f2] border border-[#fca5a5] text-[#a82323] rounded p-4 text-sm">
                    <p class="font-medium mb-1">Instruction:</p>
                    <p>
                        You are viewing the student’s complete profile. Use the
                        <strong>“Edit Profile”</strong> to update student records,
                        <strong>“Mark as Dropped”</strong> for drop status, or
                        <strong>“Delete”</strong> to remove the student from the system.
                    </p>
                </div>

                {{-- Student Card --}}
                <div class="bg-white border rounded-lg shadow p-6 space-y-6 transition hover:shadow-lg">
                    {{-- Header --}}
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <h1 class="text-2xl font-extrabold text-[#a82323]">
                            {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffix }}
                        </h1>

                        {{-- Action Buttons --}}
                        <div class="flex flex-wrap gap-3">
                            {{-- Drop Modal --}}
                            <div x-data="{ openDropModal: false }">
                                <button @click="openDropModal = true"
                                    class="bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-semibold px-4 py-2 rounded">
                                    Mark as Dropped
                                </button>

                                {{-- Drop Modal --}}
                                <div x-show="openDropModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                    <div @click.away="openDropModal = false"
                                        class="bg-white rounded-xl shadow-lg max-w-2xl w-full p-6 relative overflow-y-auto max-h-[90vh]">
                                        <h2 class="text-lg font-semibold mb-4 text-gray-800">Confirm Drop</h2>
                                        <form action="{{ route('student.drop', $student->id) }}" method="POST" enctype="multipart/form-data"
      x-data="{
        files: [],
        handleFiles(event) {
            const selectedFiles = Array.from(event.target.files);
            selectedFiles.forEach(file => {
                this.files.push({ file, url: URL.createObjectURL(file) });
            });
            const dataTransfer = new DataTransfer();
            this.files.forEach(f => dataTransfer.items.add(f.file));
            event.target.files = dataTransfer.files;
        },
        remove(index, $event) {
            this.files.splice(index, 1);
            const dataTransfer = new DataTransfer();
            this.files.forEach(f => dataTransfer.items.add(f.file));
            $event.target.closest('form').querySelector('input[type=file]').files = dataTransfer.files;
        }
    }">
    @csrf

    <!-- Remarks -->
    <label class="block text-sm font-medium text-gray-700 mb-1">Remarks:</label>
    <textarea name="remark" rows="3"
              class="w-full border-gray-300 rounded-md shadow-sm mb-4 focus:ring focus:ring-red-300 focus:border-red-300"></textarea>

    <!-- Image Upload (Multiple) -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Attach Images (Optional)</label>
        <input type="file" name="images[]" accept="image/*" multiple id="dropImageUpload" class="hidden" @change="handleFiles">
        
        <!-- Upload Area -->
        <label for="dropImageUpload"
               class="flex items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-gray-50 transition">
            <span class="text-4xl text-gray-400">+</span>
        </label>

        <!-- Previews -->
        <div class="flex flex-wrap gap-4 mt-4">
            <template x-for="(fileObj, index) in files" :key="index">
                <div class="relative w-32 h-32">
                    <img :src="fileObj.url" class="object-cover w-full h-full rounded-lg border">
                    <button type="button"
                            @click="remove(index, $event)"
                            class="absolute top-0 right-0 bg-white rounded-full p-1 shadow text-red-600 hover:text-red-800">
                        &times;
                    </button>
                </div>
            </template>
        </div>

        <p class="text-xs text-gray-500 mt-2">You can select one or more images. You may also remove them before submitting.</p>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-end gap-3">
        <button type="button" @click="openDropModal = false" class="text-sm text-gray-500 hover:underline">
            Cancel
        </button>
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-2 rounded">
            Confirm Drop
        </button>
    </div>
</form>

                                    </div>
                                </div>
                            </div>

                            {{-- Edit Profile Modal --}}
                            <div x-data="{ openEditStudentModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                <button @click="openEditStudentModal = true"
                                    class="bg-[#a82323] hover:bg-[#8b1c1c] text-white text-sm font-semibold px-4 py-2 rounded">
                                    Edit Profile
                                </button>
                                @include('student.editStudent')
                            </div>

                            {{-- Delete Form --}}
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this student?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="border border-[#a82323] text-[#a82323] hover:bg-red-50 text-sm font-semibold px-4 py-2 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Dropped Tag --}}
                    @if($student->transitions()->where('transition_type', 'Dropped')->where('semester_id', $activeSemester->id)->exists())
                        <div>
                            <span class="bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded-full inline-block">
                                Dropped This Semester
                            </span>
                        </div>
                    @endif

                    {{-- Section: Basic Info --}}
                    <section>
                        <h3 class="text-xl font-semibold text-[#a82323] border-b border-red-100 pb-2 mb-2"> Basic Information</h3>
                        <p class="text-sm text-gray-500 mb-4">Personal and enrollment details of the student.</p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Student ID" :value="$student->student_id" />
                            <x-student-info label="Birthday" :value="$student->birthday?->format('F j, Y')" />
                            <x-student-info label="Gender" :value="$student->gender ?? 'N/A'" />

                            <div class="flex flex-col bg-gray-100 p-3 rounded shadow-sm">
                                <span class="text-sm font-medium text-gray-500">Course, Year & Section</span>
                                <span class="text-base font-bold text-gray-800">
                                    {{ $profile?->course ?? 'N/A' }} - {{ $profile?->year_level ?? 'N/A' }}{{ $profile?->section ?? '' }}
                                </span>
                            </div>

                            <x-student-info label="Home Address" :value="$student->home_address ?? 'N/A'" />
                            <x-student-info label="Contact Number" :value="$student->student_contact ?? 'N/A'" />
                        </div>
                    </section>

                    {{-- Section: Family Background --}}
                    <section class="mt-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-xl font-semibold text-[#a82323] border-b border-red-100 pb-2"> Family Background</h3>
                            <div x-data="{ openEditFamilyModal: {{ $errors->any() ? 'true' : 'false' }} }">
                                <button @click="openEditFamilyModal = true"
                                    class="bg-[#a82323] hover:bg-[#8b1c1c] text-white text-sm font-semibold px-4 py-2 rounded">
                                    Edit
                                </button>
                                @include('student.editFamily')
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mb-4">Details about the student’s household, siblings, and parents.</p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Parent/Guardian Name" :value="$student->parent_guardian_name ?? 'N/A'" />
                            <x-student-info label="Parent/Guardian Contact" :value="$student->parent_guardian_contact ?? 'N/A'" />
                            <x-student-info label="Father's Name" :value="$student->fathers_name ?? 'N/A'" />
                            <x-student-info label="Father's Occupation" :value="$student->father_occupation ?? 'N/A'" />
                            <x-student-info label="Mother's Name" :value="$student->mothers_name ?? 'N/A'" />
                            <x-student-info label="Mother's Occupation" :value="$student->mother_occupation ?? 'N/A'" />
                            <x-student-info label="No. of Sisters" :value="$student->number_of_sisters ?? '0'" />
                            <x-student-info label="No. of Brothers" :value="$student->number_of_brothers ?? '0'" />
                            <x-student-info label="Ordinal Position" :value="$student->ordinal_position ?? 'N/A'" />
                        </div>
                    </section>

                    {{-- Section: Other Info --}}
                    <section class="mt-6">
                        <h3 class="text-xl font-semibold text-[#a82323] border-b border-red-100 pb-2"> Other Records</h3>
                        <p class="text-sm text-gray-500 mb-4">Contract and referral records of the student.</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <x-student-info label="Number of Contracts" :value="$student->contracts->count()" />
                            <x-student-info label="Referrals" :value="'0'" description="No referral records yet." />
                        </div>
                    </section>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
