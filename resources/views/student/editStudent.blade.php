<div x-show="openEditStudentModal"
     x-transition
     class="fixed inset-0 bg-gray-500 bg-opacity-50 z-50 flex items-center justify-center"
     style="display: none;">

    <div class="bg-white rounded-xl shadow-lg w-md p-6 relative overflow-y-auto max-h-[90vh]">

        <button @click="openEditStudentModal = false" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-xl">
            &times;
        </button>

        <h2 class="text-lg font-semibold mb-4 text-center">Edit Student</h2>

        <form action="{{ route('student.update', $student->id) }}" method="POST" class="space-y-3">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="text-red-700 p-2 rounded text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex justify-between gap-3 ">
                <div>
                    <label for="student_id" class="text-sm">Student ID</label>
                    <x-text-input id="student_id" type="text" name="student_id" :value="old('student_id', $student->student_id)" required class="w-full mt-1 border-gray-300 rounded" />
                </div>

                <div>
                    <label for="first_name" class="text-sm">First Name</label>
                    <x-text-input id="first_name" type="text" name="first_name" :value="old('first_name', $student->first_name)" required class="w-full mt-1 border-gray-300 rounded" />
                </div>

                <div>
                    <label for="last_name" class="text-sm">Last Name</label>
                    <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name', $student->last_name)" required class="w-full mt-1 border-gray-300 rounded" />
                </div>

                <div>
                    <label for="middle_name" class="text-sm">Middle Name</label>
                    <x-text-input id="middle_name" type="text" name="middle_name" :value="old('middle_name', $student->middle_name)" class="w-full mt-1 border-gray-300 rounded" />
                </div>
            </div>

            <div class="flex justify-between gap-3 mt-4">
                <div>
                    <label for="suffix" class="text-sm">Suffix</label><br>
                    <select name="suffix" id="suffix" class="w-20 mt-1 border-gray-300 rounded">
                        <option value="" {{ old('suffix', $student->suffix) == '' ? 'selected' : '' }}></option>
                        <option value="Jr." {{ old('suffix', $student->suffix) == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                        <option value="Sr." {{ old('suffix', $student->suffix) == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                        <option value="III" {{ old('suffix', $student->suffix) == 'III' ? 'selected' : '' }}>III</option>
                        <option value="IV" {{ old('suffix', $student->suffix) == 'IV' ? 'selected' : '' }}>IV</option>
                        <option value=" " {{ old('suffix', $student->suffix) == ' ' ? 'selected' : '' }}>None</option>
                    </select>
                </div>

                <div>
                    <label for="age" class="text-sm">Age</label><br>
                    <x-text-input id="age" type="number" name="age" :value="old('age', $student->age)" required class="w-30 mt-1 border-gray-300 rounded" />
                </div>

                <div>
                    <label for="gender" class="text-sm">Gender</label>
                    <select name="gender" id="gender" required class="w-full mt-1 border-gray-300 rounded">
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div>
                    <label for="is_enrolled" class="text-sm">Enrollment Status</label>
                    <select name="is_enrolled" id="is_enrolled" required class="w-full mt-1 border-gray-300 rounded">
                        <option value="">--Select Status--</option>
                        <option value="1" {{ $student->is_enrolled == 1 ? 'selected' : '' }}>Yes, Enrolled</option>
                        <option value="0" {{ $student->is_enrolled == 0 ? 'selected' : '' }}>No, Not Enrolled</option>
                    </select>
                </div>

                <div>
                    <label for="course_year" class="text-sm">Course & Year</label>
                    <input type="text" id="course_year" name="course_year" value="{{ old('course_year', $student->course_year) }}" required class="w-full mt-1 border-gray-300 rounded">
                </div>
            </div>

            <div class="flex justify-between mt-4">
                <div>
                    <label for="home_address" class="text-sm">Home Address</label>
                    <input type="text" id="home_address" name="home_address" value="{{ old('home_address', $student->home_address) }}" required class="w-full mt-1 border-gray-300 rounded">
                </div>

                <div>
                    <label for="father_occupation" class="text-sm">Father's Occupation</label>
                    <input type="text" id="father_occupation" name="father_occupation" value="{{ old('father_occupation', $student->father_occupation) }}" required class="w-full mt-1 border-gray-300 rounded">
                </div>

                <div>
                    <label for="mother_occupation" class="text-sm">Mother's Occupation</label>
                    <input type="text" id="mother_occupation" name="mother_occupation" value="{{ old('mother_occupation', $student->mother_occupation) }}" required class="p-2 w-full mt-1 border-gray-300 rounded">
                </div>
            </div>

            <div class="flex justify-between mt-4">
                <div>
                    <label for="number_of_sisters" class="text-sm">Number of Sisters</label>
                    <input type="number" id="number_of_sisters" name="number_of_sisters" value="{{ old('number_of_sisters', $student->number_of_sisters) }}" class="w-full mt-1 border-gray-300 rounded">
                </div>

                <div>
                    <label for="number_of_brothers" class="text-sm">Number of Brothers</label>
                    <input type="number" id="number_of_brothers" name="number_of_brothers" value="{{ old('number_of_brothers', $student->number_of_brothers) }}" class="w-full mt-1 border-gray-300 rounded">
                </div>

                <div>
                    <label for="ordinal_position" class="text-sm">Ordinal Position</label>
                    <input type="number" id="ordinal_position" name="ordinal_position" value="{{ old('ordinal_position', $student->ordinal_position) }}" class="w-full mt-1 border-gray-300 rounded">
                </div>
            </div>

            <div class="flex justify-end space-x-2 pt-2 mt-3 gap-3">
                <x-secondary-button type="button" @click="openEditStudentModal = false">Cancel</x-secondary-button>
                <x-primary-button type="submit">Update</x-primary-button>
            </div>

        </form>
    </div>
</div>
