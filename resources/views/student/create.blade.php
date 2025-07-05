<div x-show="openStudentModal"
x-data="{ transitionType: '' }"
     x-transition
     class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center"
     style="display: none;">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl p-8 relative overflow-y-auto max-h-[90vh]">

        <!-- Close Button -->
        <button @click="openStudentModal = false" 
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold">
            &times;
        </button>

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Add New Student</h2>
        <p class="text-sm text-gray-500 mb-6 text-center">Please fill out the form below to add a new student. All required fields are marked with <span class="text-red-500">*</span>.</p>

        <form x-ref="addStudentForm" action="{{ route('student.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf

            <!-- Error Display -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
           <input type="hidden" name="is_enrolled" value="1">

            <!-- Personal Information -->
            <div>
                <h3 class="font-semibold text-gray-600 mb-2">Personal Information</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div>
                        <label for="student_id" class="text-sm text-gray-600">Student ID <span class="text-red-500">*</span></label>
                        <x-text-input id="student_id" name="student_id" type="text" :value="old('student_id')" placeholder="e.g. 2023001" required class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="first_name" class="text-sm text-gray-600">First Name <span class="text-red-500">*</span></label>
                        <x-text-input id="first_name" name="first_name" type="text" :value="old('first_name')" placeholder="" required class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="last_name" class="text-sm text-gray-600">Last Name <span class="text-red-500">*</span></label>
                        <x-text-input id="last_name" name="last_name" type="text" :value="old('last_name')" placeholder="" required class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="middle_name" class="text-sm text-gray-600">Middle Name</label>
                        <x-text-input id="middle_name" name="middle_name" type="text" :value="old('middle_name')" placeholder="Optional" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="birthday" class="text-sm text-gray-600">Birthday <span class="text-red-500">*</span></label>
                        <x-text-input id="birthday" name="birthday" type="date" :value="old('birthday')" placeholder="e.g. 2000-01-01" required class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="gender" class="text-sm text-gray-600">Gender <span class="text-red-500">*</span></label>
                        <select name="gender" id="gender" required class="w-full mt-1 border-gray-300 rounded">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="suffix" class="text-sm text-gray-600">Suffix</label>
                        <select name="suffix" id="suffix" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">None</option>
                            <option value="Jr.">Jr.</option>
                            <option value="Sr.">Sr.</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </div>
                </div>
            </div>

                <div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="home_address" class="text-sm text-gray-600">Home Address <span class="text-red-500"></span></label>
                            <x-text-input id="home_address" name="home_address" type="text" :value="old('home_address')" placeholder="e.g. 123 Purok St."  class="mt-1 w-full border-gray-300 rounded"/>
                        </div>

                        <div>
                            <label for="student_contact" class="text-sm text-gray-600">Contact no. <span class="text-red-500"></span></label>
                            <input id="student_contact" name="student_contact" type="tel" :value="old('student_contact')" placeholder=""  class="mt-1 w-full border-gray-300 rounded"/>
                        </div>
                    </div>
                </div>

                
            <div>
                <h3 class="font-semibold text-gray-600 mb-2">Course & Year</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4" >
                        <!-- Course & Year Dropdown -->
                        <div>
                            <label class="text-sm text-gray-600">Course & Year <span class="text-red-500">*</span></label>
                            <select name="course" required class="w-full mt-1 border-gray-300 rounded">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->course }}" {{ old('course') == $course->course ? 'selected' : '' }}>
                                        {{ $course->course }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="text-sm text-gray-600">Year Level <span class="text-red-500">*</span></label>
                          <select name="year_level" required class="w-full mt-1 border-gray-300 rounded">
                                <option value="">Select Year Level</option>
                                @foreach($years as $year)
                                    <option value="{{ $year->year_level }}" {{ old('year_level') == $year->year_level ? 'selected' : '' }}>
                                        {{ $year->year_level }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Section Dropdown -->
                        <div>
                            <label class="text-sm text-gray-600">Section<span class="text-red-500">*</span></label>
                            <select name="section" required class="w-full mt-1 border-gray-300 rounded">
                                <option value="">Select Section</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section->section }}" {{ old('section') == $section->section ? 'selected' : '' }}>
                                        {{ $section->section }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>


            <!-- Parent/Guardian Information -->
            <div>
                <h3 class="font-semibold text-gray-600 mb-2">Parent/Guardian Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="parent_guardian_name" class="text-sm text-gray-600">Parent/Guardian Name <span class="text-red-500">*</span></label>
                        <x-text-input id="parent_guardian_name" name="parent_guardian_name" type="text" :value="old('parent_guardian_name')" required class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="parent_guardian_contact" class="text-sm text-gray-600">Parent/Guardian Contact <span class="text-red-500">*</span></label>
                        <input id="parent_guardian_contact" name="parent_guardian_contact" type="tel" :value="old('parent_guardian_contact')" required class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                </div>
            </div>


            <!-- Transition Type -->
        <div>
    <h3 class="font-semibold text-gray-600 mb-2">Transition Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="text-sm text-gray-600">Transition Type</label>
            <select name="transition_type" x-model="transitionType" class="w-full mt-1 border-gray-300 rounded">
                <option value="">None</option>
                <option value="Shifting In">Shifting In</option>
                <option value="Transferring In">Transferring In</option>
            </select>
        </div>

        {{-- <template x-if="transitionType === 'Shifting In' || transitionType === 'Transferring In'">
            <div>
                <label class="text-sm text-gray-600">Transition Date</label>
                <input type="date" name="transition_date" class="w-full mt-1 border-gray-300 rounded" />
            </div>
        </template> --}}

        <template x-if="transitionType === 'Shifting In' || transitionType === 'Transferring In'">
            <div class="md:col-span-3">
                <label class="text-sm text-gray-600">Transition Remarks</label>
                <textarea name="transition_remark"
                          rows="3"
                          class="w-full mt-1 border-gray-300 rounded resize-y"
                          placeholder="Enter reason, background, and other notes here..."></textarea>
            </div>
        </template>

        <template x-if="transitionType === 'Shifting In' || transitionType === 'Transferring In'">
            <!-- Transition Images -->
            <div 
                x-data="{
                    files: [],
                    previews: [],
                    addFiles(event) {
                        const selected = Array.from(event.target.files);
                        for (let file of selected) {
                            this.files.push(file);
                            this.previews.push(URL.createObjectURL(file));
                        }
                        event.target.value = ''; // Reset to allow re-upload of same file
                    },
                    remove(index) {
                        this.files.splice(index, 1);
                        URL.revokeObjectURL(this.previews[index]);
                        this.previews.splice(index, 1);
                    }
                }"
                class="md:col-span-3"
                x-init="$watch('files', value => {
                    // Sync real input with manually tracked files
                    const dataTransfer = new DataTransfer();
                    files.forEach(file => dataTransfer.items.add(file));
                    $refs.realInput.files = dataTransfer.files;
                })"
            >

                <label class="block text-sm font-medium text-red-700 mb-1">Attach Transition Images</label>

                <!-- Real File Input (invisible) -->
                <input type="file" name="images[]" multiple accept="image/*" class="hidden" x-ref="realInput">

                <div class="flex flex-wrap gap-4">
                    <!-- Add Image Button -->
                    <label class="flex items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-gray-50 transition">
                        <span class="text-4xl text-gray-400">+</span>
                        <input type="file" accept="image/*" multiple class="hidden" @change="addFiles($event)">
                    </label>

                    <!-- Preview Thumbnails -->
                    <template x-for="(src, index) in previews" :key="index">
                        <div class="relative w-32 h-32">
                            <img :src="src" class="w-full h-full object-cover rounded-lg border">
                            <button type="button"
                                    @click="remove(index)"
                                    class="absolute top-0 right-0 bg-white bg-opacity-80 hover:bg-opacity-100 text-red-600 rounded-full p-1 shadow">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>

                <p class="text-xs text-gray-500 mt-2">You may add multiple images or upload one at a time. Click ❌ to remove.</p>
            </div>
        </template>

    </div>
</div>
                <!-- Family Information -->
            {{-- <div>
                <h3 class="font-semibold text-gray-600 mb-2">Family Information</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div>
                        <label for="fathers_name" class="text-sm text-gray-600">Father's Name <span class="text-red-500"></span></label>
                        <x-text-input id="fathers_name" name="fathers_name" type="text" :value="old('fathers_name')" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="father_occupation" class="text-sm text-gray-600">Father's Occupation</label>
                        <x-text-input id="father_occupation" name="father_occupation" type="text" :value="old('father_occupation')" placeholder="e.g. Farmer" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="mothers_name" class="text-sm text-gray-600">Mother's Name <span class="text-red-500"></span></label>
                        <x-text-input id="mothers_name" name="mothers_name" type="text" :value="old('mothers_name')" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="mother_occupation" class="text-sm text-gray-600">Mother's Occupation</label>
                        <x-text-input id="mother_occupation" name="mother_occupation" type="text" :value="old('mother_occupation')" placeholder="e.g. Vendor" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                </div>
            </div> --}}
                   

            

            <!-- Siblings Information -->
            {{-- <div>
                <h3 class="font-semibold text-gray-600 mb-2">Siblings Information</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div>
                        <label for="number_of_sisters" class="text-sm text-gray-600">Number of Sisters</label>
                        <x-text-input id="number_of_sisters" name="number_of_sisters" type="number" :value="old('number_of_sisters')" placeholder="e.g. 2" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="number_of_brothers" class="text-sm text-gray-600">Number of Brothers</label>
                        <x-text-input id="number_of_brothers" name="number_of_brothers" type="number" :value="old('number_of_brothers')" placeholder="e.g. 1" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                    <div>
                        <label for="ordinal_position" class="text-sm text-gray-600">Ordinal Position</label>
                        <x-text-input id="ordinal_position" name="ordinal_position" type="number" :value="old('ordinal_position')" placeholder="e.g. 1" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                </div>
            </div> --}}

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-4">
                <x-secondary-button type="button" @click="openStudentModal = false">Cancel</x-secondary-button>
                <x-primary-button class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">Save Student</x-primary-button>
            </div>
        </form>
    </div>
</div>
