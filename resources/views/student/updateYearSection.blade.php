
<div x-show="open"
     x-transition
     class="fixed inset-0 bg-gray-800 bg-opacity-50 z-40 flex items-center justify-center"
     style="display: none;">

    <div class="bg-white rounded-xl shadow-lg w-96 p-6 relative overflow-y-auto max-h-[90vh]">

       
        <button @click="open = false" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-xl">
            &times;
        </button>

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
    <div class="mt-4 ">
        <button type="submit" class="sign-in-btn " style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:500;">
            Update 
        </button>
    </div>
</form>

       
    </div>
</div>
