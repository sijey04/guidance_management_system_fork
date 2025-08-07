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
            <div class="">
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
                          {{ $student->last_name }},  {{ $student->first_name }} {{ $student->middle_name }}.  {{ $student->suffix }}
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

                                        <!-- Image Upload with Take Photo or Gallery -->
                                        <div x-data="{
                                            files: [],
                                            handleFiles(event) {
                                                const selectedFiles = Array.from(event.target.files);
                                                selectedFiles.forEach(file => {
                                                    this.files.push({ file, url: URL.createObjectURL(file) });
                                                });
                                                const dt = new DataTransfer();
                                                this.files.forEach(f => dt.items.add(f.file));
                                                event.target.files = dt.files;
                                            },
                                            remove(index, $event) {
                                                this.files.splice(index, 1);
                                                const dt = new DataTransfer();
                                                this.files.forEach(f => dt.items.add(f.file));
                                                $event.target.closest('form').querySelector('#dropImageInput').files = dt.files;
                                            },
                                            openCamera() {
                                                this.$refs.input.setAttribute('capture', 'environment');
                                                this.$refs.input.click();
                                            },
                                            openGallery() {
                                                this.$refs.input.removeAttribute('capture');
                                                this.$refs.input.click();
                                            }
                                        }">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Attach Images (Optional)</label>

                                            <!-- Hidden File Input -->
                                            <input type="file" name="images[]" multiple accept="image/*" id="dropImageInput"
                                                class="hidden" x-ref="input" @change="handleFiles">

                                            <!-- Action Buttons -->
                                            <div class="flex gap-4">
                                                <!-- Take Photo -->
                                                <button type="button" @click="openCamera"
                                                        class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 hover:border-red-500 hover:bg-gray-50 transition">
                                                    <span class="text-3xl text-gray-500"></span>
                                                    <span class="text-xs mt-1 text-gray-600">Take Photo</span>
                                                </button>

                                                <!-- Choose from Gallery -->
                                                <button type="button" @click="openGallery"
                                                        class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 hover:border-red-500 hover:bg-gray-50 transition">
                                                    <span class="text-3xl text-gray-500"></span>
                                                    <span class="text-xs mt-1 text-gray-600">Choose Gallery</span>
                                                </button>
                                            </div>

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

                                            <p class="text-xs text-gray-500 mt-2">You may take photos or choose from gallery, and remove them before submitting.</p>
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


                    @php
                        $transition = $student->transitions()
                            ->where('semester_id', $activeSemester->id)
                            ->latest('transition_date')
                            ->first();
                    @endphp

                    @if($transition)
                        <div class="mt-1">
                            <span class="inline-block text-base font-medium px-3 py-1 rounded-full
                                @switch($transition->transition_type)
                                    @case('Shifting In') bg-blue-100 text-blue-800 @break
                                    @case('Shifting Out') bg-yellow-100 text-yellow-800 @break
                                    @case('Transferring Out') bg-orange-100 text-orange-800 @break
                                    @case('Returning Student') bg-green-100 text-green-800 @break
                                    @case('Dropped') bg-red-100 text-red-800 @break
                                    @default bg-gray-100 text-gray-800
                                @endswitch">
                                <div class="flex items-center gap-5">
                                    {{ $transition->transition_type }}
                                    <a href="{{ route('transitions.show', ['transition' => $transition->id, 'source' => 'student']) }}" 
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 rounded-t-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                        View Details
                                    </a>
                                </div>
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

                            <div class="flex flex-col bg-gray-100 p-3 rounded shadow-sm relative">
                                <div class="flex justify-between">

                                    <span class="text-sm font-medium text-gray-500">Course, Year & Section</span>
                                <!-- Edit Button -->
                                <button
                                      class="bg-[#a82323] hover:bg-[#8b1c1c] text-white text-sm font-semibold px-4 py-2 rounded"
                                    onclick="document.getElementById('editCourseModal').classList.remove('hidden')" >
                                    Update
                                </button>
                                </div>
                                <span class="text-base font-bold text-gray-800">
                                    {{ $profile?->course ?? 'N/A' }} - {{ $profile?->year_level ?? 'N/A' }}{{ $profile?->section ?? '' }}
                                </span>

                                
                            </div>


                            <x-student-info label="Home Address" :value="$student->home_address ?? 'N/A'" />
                            <x-student-info label="Contact Number" :value="$student->student_contact ?? 'N/A'" />
                        </div>
                    </section>
<!-- Modal -->
<div id="editCourseModal" class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg relative">
        <h2 class="text-lg font-semibold mb-4">Edit Course, Year & Section</h2>

        <form action="{{ route('student.updateProfile', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="course" class="block text-sm font-medium">Course</label>
                <select name="course" id="course" class="w-full border-gray-300 rounded">
                    @foreach($courses as $course)
                        <option value="{{ $course->course }}" {{ $course->course == $profile?->course ? 'selected' : '' }}>{{ $course->course }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="year_level" class="block text-sm font-medium">Year Level</label>
                <select name="year_level" id="year_level" class="w-full border-gray-300 rounded">
                    @foreach($years as $year)
                        <option value="{{ $year->year_level }}" {{ $year->year_level == $profile?->year_level ? 'selected' : '' }}>{{ $year->year_level }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="section" class="block text-sm font-medium">Section</label>
                <select name="section" id="section" class="w-full border-gray-300 rounded">
                    @foreach($sections as $section)
                        <option value="{{ $section->section }}" {{ $section->section == $profile?->section ? 'selected' : '' }}>{{ $section->section }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('editCourseModal').classList.add('hidden')" class="text-gray-600 hover:text-gray-800">Cancel</button>
                <button type="submit"   class="bg-[#a82323] hover:bg-[#8b1c1c] text-white text-sm font-semibold px-4 py-2 rounded">
      Save</button>
            </div>
        </form>

        <button class="absolute top-2 right-2 text-gray-500 hover:text-gray-700" onclick="document.getElementById('editCourseModal').classList.add('hidden')">
            &times;
        </button>
    </div>
</div>

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
                            {{-- <x-student-info label="No. of Sisters" :value="$student->number_of_sisters ?? '0'" />
                            <x-student-info label="No. of Brothers" :value="$student->number_of_brothers ?? '0'" />
                            <x-student-info label="Ordinal Position" :value="$student->ordinal_position ?? 'N/A'" /> --}}
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
