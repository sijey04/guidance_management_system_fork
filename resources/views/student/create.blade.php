<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="flex flex-col mb-3 max-w-sm">
                            <label for="student_id" class="form-label">Student ID</label>
                            <x-text-input  id="student_id" type="text" name="student_id" :value="old('student_id')" required />
                                @error('student_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <x-text-input id="first_name" type="text" name="first_name" :value="old('first_name')" required />
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name')" required />
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <x-text-input id="age" type="text" name="age" :value="old('age')" required />
                            @error('age')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="is_enrolled" class="form-label">Status</label>
                            <select name="is_enrolled" required>
                                <option value="1">Yes, Enrolled in Current Semester</option>
                                <option value="0">No, Not Enrolled</option>
                            </select>


                            @error('is_enrolled')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="course_year" class="form-label"> Course & yr</label>
                            <input type="text" class="form-control @error('course_year') is-invalid @enderror" id="course_year" name="course_year" value="{{ old('course_year') }}" required>
                            @error('course_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="home_address" class="form-label"> Home Address</label>
                            <input type="text" class="form-control @error('home_address') is-invalid @enderror" id="home_address" name="home_address" value="{{ old('home_address') }}" required>
                            @error('home_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="mb-3">
                            <label for="father_occupation" class="form-label"> Father's Occupation</label>
                            <input type="text" class="form-control @error('father_occupation') is-invalid @enderror" id="father_occupation" name="father_occupation" value="{{ old('father_occupation') }}" required>
                            @error('father_occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mother_occupation" class="form-label"> Mother's Occupation</label>
                            <input type="text" class="form-control @error('mother_occupation') is-invalid @enderror" id="mother_occupation" name="mother_occupation" value="{{ old('mother_occupation') }}" required>
                            @error('mother_occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="number_of_sisters" class="form-label">Number of Sisters</label>
                            <input type="number" class="form-control @error('number_of_sisters') is-invalid @enderror" id="number_of_sisters" name="number_of_sisters" value="{{ old('number_of_sisters') }}">
                            @error('number_of_sisters')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="number_of_brothers" class="form-label">Number of Brothers</label>
                            <input type="number" class="form-control @error('number_of_brothers') is-invalid @enderror" id="number_of_brothers" name="number_of_brothers" value="{{ old('number_of_brothers') }}">
                            @error('number_of_sisters')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ordinal_position" class="form-label">Ordinal Position</label>
                            <input type="number" class="form-control @error('ordinal_position') is-invalid @enderror" id="ordinal_position" name="ordinal_position" value="{{ old('ordinal_position') }}">
                            @error('number_of_sisters')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        



                        {{-- <div class="mb-3">
                            <label for="enrollment_date" class="form-label">Enrollment Date</label>
                            <input type="date" class="form-control @error('enrollment_date') is-invalid @enderror" id="enrollment_date" name="enrollment_date" value="{{ old('enrollment_date') }}">
                            @error('enrollment_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div> --}}


                        

                        {{-- ... Add other fields similarly with select boxes where appropriate and error handling ... --}}
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
