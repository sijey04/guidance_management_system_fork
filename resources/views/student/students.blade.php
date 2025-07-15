<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl md:text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="bg-white shadow-md rounded-xl p-6 space-y-6">
            
            <!-- Heading & Description -->
            <div>
                <h1 class="text-2xl font-bold text-[#a82323] mb-2">Student List</h1>
                <p class="text-gray-600 text-sm">View and manage enrolled students for the current semester. You can filter by course, year, section, sort students, or search by ID or name.</p>
            </div>

            <!-- Feedback Messages -->
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 text-red-800 px-4 py-3 rounded shadow">
                    {{ session('error') }}
                </div>
            @endif
            @if($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-3 rounded shadow">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Filters -->
            <form method="GET" action="{{ route('student.index') }}" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Filter by Course</label>
                    <select name="filter_course" onchange="this.form.submit()" class="w-full mt-1 rounded-md border-gray-300 text-sm">
                        <option value="">All</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->course }}" {{ request('filter_course') == $course->course ? 'selected' : '' }}>
                                {{ $course->course }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Filter by Year Level</label>
                    <select name="filter_year_level" onchange="this.form.submit()" class="w-full mt-1 rounded-md border-gray-300 text-sm">
                        <option value="">All</option>
                        @foreach($years as $year)
                            <option value="{{ $year->year_level }}" {{ request('filter_year_level') == $year->year_level ? 'selected' : '' }}>
                                {{ $year->year_level }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Filter by Section</label>
                    <select name="filter_section" onchange="this.form.submit()" class="w-full mt-1 rounded-md border-gray-300 text-sm">
                        <option value="">All</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->section }}" {{ request('filter_section') == $section->section ? 'selected' : '' }}>
                                {{ $section->section }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Sort Students</label>
                    <select name="sort" onchange="this.form.submit()" class="w-full mt-1 rounded-md border-gray-300 text-sm">
                        <option value="">Default</option>
                        <option value="student_id" {{ request('sort') == 'student_id' ? 'selected' : '' }}>Student ID</option>
                        <option value="first_name" {{ request('sort') == 'first_name' ? 'selected' : '' }}>First Name</option>
                        <option value="last_name" {{ request('sort') == 'last_name' ? 'selected' : '' }}>Last Name</option>
                        
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Filter by Transition</label>
                    <select name="filter_transition" onchange="this.form.submit()" class="w-full mt-1 rounded-md border-gray-300 text-sm">
                        <option value="">All</option>
                        <option value="Shifting In" {{ request('filter_transition') == 'Shifting In' ? 'selected' : '' }}>Shifting In</option>
                        <option value="Shifting Out" {{ request('filter_transition') == 'Shifting Out' ? 'selected' : '' }}>Shifting Out</option>
                        <option value="Transferring Out" {{ request('filter_transition') == 'Transferring Out' ? 'selected' : '' }}>Transferring Out</option>
                        <option value="Returning Student" {{ request('filter_transition') == 'Returning Student' ? 'selected' : '' }}>Returning Student</option>
                        <option value="Dropped" {{ request('filter_transition') == 'Dropped' ? 'selected' : '' }}>Dropped</option>
                        <option value="Graduated" {{ request('filter_transition') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                    </select>
                </div>

                <div class="col-span-full">
                    <label class="block text-sm font-semibold text-gray-700">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by ID or Name"
                        class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2"
                        onkeydown="if (event.key === 'Enter') this.form.submit();"
                        oninput="this.form.requestSubmit()" />
                </div>
            </form>

            <!-- Action Buttons -->
            <div class="flex flex-wrap  items-center mt-4 gap-4">
                <div x-data="{ openStudentModal: {{ $errors->any() ? 'true' : 'false' }} }">
                    <button @click="openStudentModal = true"
                        class="bg-[#a82323] text-white px-4 py-2 rounded-md font-semibold hover:bg-red-800 transition">
                        + Add New Student
                    </button>
                    @include('student.create')
                </div>
                <a href="{{ route('course_year_section.index') }}"
                   class="bg-[#a82323] text-white px-4 py-2 rounded-md font-semibold hover:bg-red-800 transition">
                    Manage Course/Year/Section
                </a>

                <div x-data="{ openImportModal: false }"> 
                    <button @click="openImportModal = true"
                        class="bg-[#a82323] text-white px-4 py-2 rounded-md font-semibold hover:bg-red-400 transition">
                        Import Students
                    </button>

                    <div x-show="openImportModal" 
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                        x-cloak>
                        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl overflow-y-auto max-h-[90vh]">
                            <h2 class="text-2xl font-bold mb-3">Import Students</h2>

                            <p class="text-gray-700 text-sm mb-4">
                                Please use the provided Excel template to import students. Each row in your Excel file must contain the following columns:
                            </p>

                            <ul class="list-disc list-inside text-sm text-gray-800 mb-4 space-y-1">
                                <li><strong>student_id</strong> - Student's unique ID (required)</li>
                                <li><strong>first_name</strong> - First name (required)</li>
                                <li><strong>middle_name</strong> - Middle name (optional)</li>
                                <li><strong>last_name</strong> - Last name (required)</li>
                                <li><strong>suffix</strong> - Name suffix like Jr., Sr. (optional)</li>
                                <li><strong>birthday</strong> - Date of birth (format: YYYY-MM-DD)</li>
                                <li><strong>gender</strong> - Male/Female/Other</li>
                                <li><strong>home_address</strong> - Home address (optional)</li>
                                <li><strong>student_contact</strong> - Student's contact number (optional)</li>
                                <li><strong>parent_guardian_name</strong> - Name of parent/guardian (optional)</li>
                                <li><strong>parent_guardian_contact</strong> - Parent/guardian contact number (optional)</li>
                                <li><strong>course</strong> - Course code (must match system course list)</li>
                                <li><strong>year_level</strong> - Year level (e.g., 1, 2, 3, 4)</li>
                                <li><strong>section</strong> - Section name (e.g., A, B, C)</li>
                                <li><strong>transition_type</strong> - (optional) Shifting In / Transferring In / Dropped</li>
                                <li><strong>transition_remark</strong> - (optional) Reason or note about the transition</li>
                            </ul>

                            <div class="bg-yellow-100 text-yellow-800 text-xs p-3 rounded mb-4">
                                <strong>Note:</strong> Fields marked as "required" must not be left blank. Invalid or missing required data will skip that row during import.
                            </div>

                            <form action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Excel File (.xlsx / .xls )</label>
                                <input type="file" name="excel_file" accept=".xlsx,.xls,.csv" required class="w-full mb-4 border rounded p-2">

                                <div class="flex justify-between items-center">
                                    <a href="{{ asset('templates/student_template.xlsx') }}" class="text-blue-600 underline text-sm">
                                        📄 Download Template
                                    </a>
                                    <div class="flex gap-2">
                                        <button type="button" @click="openImportModal = false"
                                            class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">Cancel</button>
                                        <button type="submit"
                                            class="bg-[#a82323] text-white px-4 py-2 rounded-md font-semibold hover:bg-red-800 transition">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Table -->
            <div class="overflow-auto rounded-lg border border-gray-200 mt-4">
                <table class="min-w-full text-sm divide-y divide-gray-200">
                    <thead class="bg-[#a82323] text-white text-left">
                        <tr>
                            <th class="px-4 py-3">Student ID</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Course</th>
                            <th class="px-4 py-3">Year & Section</th>
                            <th class="px-4 py-3">Contracts</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @php
                            $activeSemester = $activeSemester ?? App\Models\Semester::where('is_current', true)->first();
                        @endphp
                        @forelse ($students as $student)
                            <tr class="hover:bg-[#fdf4f4]">
                                <td class="px-4 py-3">{{ $student->student_id }}</td>
                                <td class="px-4 py-3">
                                    {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffix }}

                                    @php
                                        $transition = $student->transitions()
                                            ->where('semester_id', $activeSemester->id)
                                            ->latest('transition_date')
                                            ->first();
                                    @endphp

                                    @if($transition)
                                        <div class="mt-1">
                                            <span class="inline-block text-xs font-medium px-3 py-1 rounded-full
                                                @switch($transition->transition_type)
                                                    @case('Shifting In') bg-blue-100 text-blue-800 @break
                                                    @case('Shifting Out') bg-yellow-100 text-yellow-800 @break
                                                    @case('Transferring Out') bg-orange-100 text-orange-800 @break
                                                    @case('Returning Student') bg-green-100 text-green-800 @break
                                                    @case('Dropped') bg-red-100 text-red-800 @break
                                                    @default bg-gray-100 text-gray-800
                                                @endswitch">
                                                {{ $transition->transition_type }}
                                            </span>
                                        </div>
                                    @endif

                                    
                                </td>
                                @php
                                    $profile = $activeSemester 
                                        ? $student->profiles->where('semester_id', $activeSemester->id)->first()
                                        : null;
                                @endphp
                                <td class="px-4 py-3">{{ $profile?->course ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $profile?->year_level ?? 'N/A' }} {{ $profile?->section ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $student->contracts_count ?? 0 }}</td>
                                <td class="px-4 py-3 text-right">
                                    <div x-data="{ open: false }" class="relative inline-block text-left">
                                        <button @click="open = !open" class="text-gray-600 hover:text-gray-800">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3z"/>
                                            </svg>
                                        </button>
                                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-32 bg-white border rounded-md shadow-lg z-10">
                                            <a href="{{ route('student.show', $student->id) }}"
                                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View</a>
                                            <form action="{{ route('student.destroy', $student->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this student?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500">No students found for the current filters.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($students instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="mt-6 flex justify-center">
                    {{ $students->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>