<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Courses, Year Levels, and Sections
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-6 px-4 space-y-8">

        <!-- Back Button -->
        <a href="{{ route('student.index') }}" class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">
            ← Back to Students List
        </a>

        <p class="text-gray-600 text-sm">
            Use this page to add or customize Courses, Year Levels, and Sections. These values will be shown in the student registration and validation forms. 
            You can add multiple entries below.
        </p>

        <!-- Courses -->
        <div class="bg-white shadow-md rounded p-6 space-y-4" id="manageCourse">
            <h3 class="font-semibold text-lg text-red-700">Manage Courses</h3>
            <p class="text-sm text-gray-500">Examples: BSIT, BSCS, ACT, BSEd, etc.</p>

            <form method="POST" action="{{ route('course.store') }}" class="flex gap-3">
                @csrf
                <input type="text" name="course" placeholder="Enter Course Name" required class="flex-1 border-gray-300 rounded px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm">
                    Add Course
                </button>
            </form>

            <table class="w-full text-sm text-left border mt-4">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">Course Name</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-3 py-2">{{ $item->course }}</td>
                        </tr>
                    @empty
                        <tr><td class="text-center text-gray-400 py-2" colspan="1">No courses added yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Year Levels -->
        <div class="bg-white shadow-md rounded p-6 space-y-4" id="manageYear">
            <h3 class="font-semibold text-lg text-red-700">Manage Year Levels</h3>
            <p class="text-sm text-gray-500">Examples: 1st Year, 2nd Year, 3rd Year, 4th Year.</p>

            <form method="POST" action="{{ route('year.store') }}" class="flex gap-3">
                @csrf
                <input type="text" name="year_level" placeholder="Enter Year Level" required class="flex-1 border-gray-300 rounded px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm">
                    Add Year Level
                </button>
            </form>

            <table class="w-full text-sm text-left border mt-4">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">Year Level</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($years as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-3 py-2">{{ $item->year_level }}</td>
                        </tr>
                    @empty
                        <tr><td class="text-center text-gray-400 py-2" colspan="1">No year levels added yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Sections -->
        <div class="bg-white shadow-md rounded p-6 space-y-4" id="manageSection">
            <h3 class="font-semibold text-lg text-red-700">Manage Sections</h3>
            <p class="text-sm text-gray-500">Examples: A, B, C, D, etc.</p>

            <form method="POST" action="{{ route('section.store') }}" class="flex gap-3">
                @csrf
                <input type="text" name="section" placeholder="Enter Section" required class="flex-1 border-gray-300 rounded px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm">
                    Add Section
                </button>
            </form>

            <table class="w-full text-sm text-left border mt-4">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">Section Name</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sections as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-3 py-2">{{ $item->section }}</td>
                        </tr>
                    @empty
                        <tr><td class="text-center text-gray-400 py-2" colspan="1">No sections added yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
