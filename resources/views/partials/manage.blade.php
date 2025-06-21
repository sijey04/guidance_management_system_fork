<div x-show="openManageModal"
     x-transition
     class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center"
     style="display: none;">
    <div @click.away="openManageModal = false"
         class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl p-8 relative overflow-y-auto max-h-[90vh]">

        <!-- Close Button -->
        <button @click="openManageModal = false" 
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold">
            &times;
        </button>

        <h2 class="text-2xl font-bold mb-6 text-center">Manage Course / Year / Section</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Course Form -->
        <form method="POST" action="{{ route('courses.store') }}" class="mb-6">
            @csrf
            <label class="block font-medium mb-1">Course:</label>
            <input type="text" name="course" required class="border p-2 rounded w-full">
            <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded w-full">Add Course</button>
        </form>

        <!-- Course Table -->
        <table class="w-full text-sm mb-6 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-2 py-1 text-left">Courses</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Course::all() as $course)
                    <tr>
                        <td class="px-2 py-1 border">{{ $course->course }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Year Form -->
        <form method="POST" action="{{ route('years.store') }}" class="mb-6">
            @csrf
            <label class="block font-medium mb-1">Year:</label>
            <input type="text" name="year_level" required class="border p-2 rounded w-full">
            <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded w-full">Add Year</button>
        </form>

        <!-- Year Table -->
        <table class="w-full text-sm mb-6 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-2 py-1 text-left">Years</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Year::all() as $year)
                    <tr>
                        <td class="px-2 py-1 border">{{ $year->year_level }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Section Form -->
        <form method="POST" action="{{ route('sections.store') }}" class="mb-6">
            @csrf
            <label class="block font-medium mb-1">Section:</label>
            <input type="text" name="section" required class="border p-2 rounded w-full">
            <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded w-full">Add Section</button>
        </form>

        <!-- Section Table -->
        <table class="w-full text-sm border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-2 py-1 text-left">Sections</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Section::all() as $section)
                    <tr>
                        <td class="px-2 py-1 border">{{ $section->section }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
