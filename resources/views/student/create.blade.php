
<div x-show="openStudentModal"
     x-transition
     class="fixed inset-0 bg-gray-500 bg-opacity-50 z-50 flex items-center justify-center"
     style="display: none;">
     
    <div class="bg-white rounded-xl shadow-lg w-60 p-6 relative overflow-y-auto max-h-[90vh]">

     
        <button @click="openStudentModal = false" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-xl">
            &times;
        </button>

        <h2 class="text-lg font-semibold mb-4 text-center">Add New Student</h2>

        <form action="{{ route('student.store') }}" method="POST" class="space-y-3">
            @csrf

            @if ($errors->any())
                <div class=" text-red-700 p-2 rounded text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

           <div class="flex justify-between gap-3 ">
                <!-- Student ID -->
                <div>
                    <label for="student_id" class="text-sm">Student ID</label>
                    <x-text-input id="student_id" type="text" name="student_id" :value="old('student_id')" required class="w-full mt-1 border-gray-300 rounded" />
                </div>

                <!-- First Name -->
                <div>
                    <label for="first_name" class="text-sm">First Name</label>
                    <x-text-input id="first_name" type="text" name="first_name" :value="old('first_name')" required class="w-full mt-1 border-gray-300 rounded" />
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="text-sm">Last Name</label>
                    <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name')" required class="w-full mt-1 border-gray-300 rounded" />
                </div>

                <!-- Middle Name -->
                <div>
                    <label for="middle_name" class="text-sm">Middle Name</label>
                    <x-text-input id="middle_name" type="text" name="middle_name" :value="old('middle_name')" class="w-full mt-1 border-gray-300 rounded" />
                </div>

           </div>

           <div class="flex justify-between gap-3 mt-4">
            <!-- Suffix -->
                <div>
                    <label for="suffix" class="text-sm">Suffix</label><br>
                    <select name="suffix" id="suffix" class="w-20 mt-1 border-gray-300 rounded">
                        <option value=""></option>
                        <option value="Jr.">Jr.</option>
                        <option value="Sr.">Sr.</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value=" ">None</option>
                    </select>
                </div>
                <!-- Age -->
                <div>
                    <label for="age" class="text-sm">Age</label><br>
                    <x-text-input id="age" type="number" name="age" :value="old('age')" required class="w-30 mt-1 border-gray-300 rounded" />
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="text-sm">Gender</label>
                    <select name="gender" id="gender" required class="w-full mt-1 border-gray-300 rounded">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Is Enrolled -->
                <div>
                    <label for="is_enrolled" class="text-sm">Enrollment Status</label>
                    <select name="is_enrolled" id="is_enrolled" required class="w-full mt-1 border-gray-300 rounded">
                        <option value="">--Select Status--</option>
                        <option value="1">Yes, Enrolled</option>
                        <option value="0">No, Not Enrolled</option>
                    </select>
                </div>

                    <!-- Course & Year -->
                <div>
                    <label for="course_year" class="text-sm">Course & Year</label>
                    <input type="text" id="course_year" name="course_year" value="{{ old('course_year') }}" required class="w-full mt-1 border-gray-300 rounded">
                </div>
           </div>

            <div class="flex justify-between mt-4">

                <!-- Home Address -->
                <div>
                    <label for="home_address" class="text-sm">Home Address</label>
                    <input type="text" id="home_address" name="home_address" value="{{ old('home_address') }}" required class="w-full mt-1 border-gray-300 rounded">
                </div>

                <!-- Father's Occupation -->
                <div>
                    <label for="father_occupation" class="text-sm">Father's Occupation</label>
                    <input type="text" id="father_occupation" name="father_occupation" value="{{ old('father_occupation') }}" required class="w-full mt-1 border-gray-300 rounded">
                </div>

                   <!-- Mother's Occupation -->
                <div>
                    <label for="mother_occupation" class="text-sm">Mother's Occupation</label>
                    <input type="text" id="mother_occupation" name="mother_occupation" value="{{ old('mother_occupation') }}" required class="p-2 w-full mt-1 border-gray-300 rounded">
                </div>
            </div>

           <div class="flex justify-between mt-4">
                <!-- Number of Sisters -->
                <div>
                    <label for="number_of_sisters" class="text-sm">Number of Sisters</label>
                    <input type="number" id="number_of_sisters" name="number_of_sisters" value="{{ old('number_of_sisters') }}" class="w-full mt-1 border-gray-300 rounded">
                </div>

                <!-- Number of Brothers -->
                <div>
                    <label for="number_of_brothers" class="text-sm">Number of Brothers</label>
                    <input type="number" id="number_of_brothers" name="number_of_brothers" value="{{ old('number_of_brothers') }}" class="w-full mt-1 border-gray-300 rounded">
                </div>

                 <!-- Ordinal Position -->
                <div>
                    <label for="ordinal_position" class="text-sm">Ordinal Position</label>
                    <input type="number" id="ordinal_position" name="ordinal_position" value="{{ old('ordinal_position') }}" class="w-full mt-1 border-gray-300 rounded">
                </div>
           </div>

                

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-2 pt-2 mt-3 gap-3">
                    <x-secondary-button type="button" @click="openStudentModal = false" >Cancel</x-secondary-button>
                    <x-primary-button type="submit">Save</x-primary-button>
                </div>
           
        </form>
    </div>
</div>
