<div x-show="openStudentModal"
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

        <form action="{{ route('student.store') }}" method="POST" class="space-y-6">
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
                        <x-text-input id="first_name" name="first_name" type="text" :value="old('first_name')" placeholder="e.g. John" required class="mt-1 w-full border-gray-300 rounded"/>
                    </div>

                    <div>
                        <label for="last_name" class="text-sm text-gray-600">Last Name <span class="text-red-500">*</span></label>
                        <x-text-input id="last_name" name="last_name" type="text" :value="old('last_name')" placeholder="e.g. Doe" required class="mt-1 w-full border-gray-300 rounded"/>
                    </div>

                    <div>
                        <label for="middle_name" class="text-sm text-gray-600">Middle Name</label>
                        <x-text-input id="middle_name" name="middle_name" type="text" :value="old('middle_name')" placeholder="Optional" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                </div>
            </div>

            <!-- Additional Details -->
            <div>
                <h3 class="font-semibold text-gray-600 mb-2">Additional Details</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

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

                    <div>
                        <label for="age" class="text-sm text-gray-600">Age <span class="text-red-500">*</span></label>
                        <x-text-input id="age" name="age" type="number" :value="old('age')" placeholder="e.g. 20" required class="mt-1 w-full border-gray-300 rounded"/>
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
                        <label for="is_enrolled" class="text-sm text-gray-600">Enrollment Status <span class="text-red-500">*</span></label>
                        <select name="is_enrolled" id="is_enrolled" required class="w-full mt-1 border-gray-300 rounded">
                            <option value="">Select</option>
                            <option value="1">Enrolled</option>
                            <option value="0">Not Enrolled</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Academic & Family Information -->
            <div>
                <h3 class="font-semibold text-gray-600 mb-2">Academic & Family Information</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <div>
                        <label class="text-sm text-gray-600">Course & Year</label>
                        <select name="course_year" class="w-full mt-1 border-gray-300 rounded-lg" required>
                            <option value="">Select </option>
                            @foreach(config('student.course_years') as $courseYear)
                                <option value="{{ $courseYear }}" {{ (old('course_year', $student->course_year ?? '') == $courseYear) ? 'selected' : '' }}>{{ $courseYear }}</option>
                            @endforeach
                        </select>
                   </div>

                   <div>
                         <label class="text-sm text-gray-600">Section</label>
                        <select name="section" class="w-full mt-1 border-gray-300 rounded-lg" required>
                            <option value="">Select Section</option>
                            @foreach(config('student.sections') as $section)
                                <option value="{{ $section }}" {{ (old('section', $student->section ?? '') == $section) ? 'selected' : '' }}>{{ $section }}</option>
                            @endforeach
                        </select>
                   </div>

                    <div>
                        <label for="home_address" class="text-sm text-gray-600">Home Address <span class="text-red-500">*</span></label>
                        <x-text-input id="home_address" name="home_address" type="text" :value="old('home_address')" placeholder="e.g. 123 Purok St." required class="mt-1 w-full border-gray-300 rounded"/>
                    </div>

                    <div>
                        <label for="father_occupation" class="text-sm text-gray-600">Father's Occupation</label>
                        <x-text-input id="father_occupation" name="father_occupation" type="text" :value="old('father_occupation')" placeholder="e.g. Farmer" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>

                    <div>
                        <label for="mother_occupation" class="text-sm text-gray-600">Mother's Occupation</label>
                        <x-text-input id="mother_occupation" name="mother_occupation" type="text" :value="old('mother_occupation')" placeholder="e.g. Vendor" class="mt-1 w-full border-gray-300 rounded"/>
                    </div>
                </div>
            </div>

            <!-- Siblings Information -->
            <div>
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
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-4">
                <x-secondary-button type="button" @click="openStudentModal = false">Cancel</x-secondary-button>
                <x-primary-button type="submit">Save Student</x-primary-button>
            </div>
        </form>
    </div>
</div>
