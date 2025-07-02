

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Validate Students
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8"
         x-data="{
             selected: {{ json_encode(request('selected_students', [])) }},
             allOnPage: {{ json_encode($students->pluck('id')->map(fn($id) => (string) $id)) }},
             studentData: JSON.parse(localStorage.getItem('studentData') || '{}'),

             toggle(id) {
                 id = id.toString();
                 if (this.selected.includes(id)) {
                     this.selected = this.selected.filter(s => s !== id);
                 } else {
                     this.selected.push(id);
                 }
             },

             isChecked(id) {
                 return this.selected.includes(id.toString());
             },

             toggleAllOnPage() {
                 const allSelected = this.allOnPage.every(id => this.selected.includes(id));
                 if (allSelected) {
                     this.selected = this.selected.filter(id => !this.allOnPage.includes(id));
                 } else {
                     this.allOnPage.forEach(id => {
                         if (!this.selected.includes(id)) {
                             this.selected.push(id);
                         }
                     });
                 }
             },

             allSelectedOnPage() {
                 return this.allOnPage.every(id => this.selected.includes(id));
             },

             injectHiddenInputs(form) {
                 const container = form.querySelector('#selected-hidden');
                 container.innerHTML = '';
                 this.selected.forEach(id => {
                     const input = document.createElement('input');
                     input.type = 'hidden';
                     input.name = 'selected_students[]';
                     input.value = id;
                     container.appendChild(input);
                 });
                 const dropdownInput = document.createElement('input');
                 dropdownInput.type = 'hidden';
                 dropdownInput.name = 'student_dropdown_data';
                 dropdownInput.value = JSON.stringify(this.studentData);
                 container.appendChild(dropdownInput);
             },

             updateStudentValue(id, field, value) {
                 if (!this.studentData[id]) this.studentData[id] = {};
                 this.studentData[id][field] = value;
                 localStorage.setItem('studentData', JSON.stringify(this.studentData));
             }
         }">

        <div class="bg-white p-6 shadow rounded-lg">
            <div class="mb-4">
                <a href="{{ route('semester.index') }}" class="text-blue-600 hover:underline text-sm">← Back to Academic Setup</a>
            </div>

            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Validate Students from Previous Semesters</h2>
            <p class="text-gray-500 mb-6">
                Select and validate students from <strong>all previous semesters</strong> into the new semester 
                <strong>{{ $newSemester->schoolYear->school_year }} - {{ $newSemester->semester }}</strong>.
            </p>

            <!-- FILTER FORM -->
            <form method="GET" action="{{ route('semester.validate', $newSemester->id) }}" @submit.prevent="injectHiddenInputs($el); $el.submit()">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div>
                        <label class="text-sm font-medium text-gray-600">Course</label>
                        <select name="filter_course" onchange="this.form.requestSubmit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Courses</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->course }}" {{ request('filter_course') == $course->course ? 'selected' : '' }}>{{ $course->course }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Year Level</label>
                        <select name="filter_year_level" onchange="this.form.requestSubmit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Years</option>
                            @foreach($years as $year)
                                <option value="{{ $year->year_level }}" {{ request('filter_year_level') == $year->year_level ? 'selected' : '' }}>{{ $year->year_level }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Section</label>
                        <select name="filter_section" onchange="this.form.requestSubmit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Sections</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->section }}" {{ request('filter_section') == $section->section ? 'selected' : '' }}>{{ $section->section }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm font-medium text-gray-600">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Student name or ID..."
                            class="w-full mt-1 border-gray-300 rounded"
                            @keydown.enter.prevent="injectHiddenInputs($el.form); $el.form.submit()">
                    </div>
                </div>
                <div id="selected-hidden"></div>
            </form>

            <!-- VALIDATION FORM -->
            <form method="POST" action="{{ route('semester.processValidate', $newSemester->id) }}" @submit="injectHiddenInputs($el)">
                @csrf
                <div id="selected-hidden"></div>

                <div class="flex justify-between items-center mt-6 mb-3">
                    <button type="button" @click="toggleAllOnPage"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-semibold">
                        <span x-text="allSelectedOnPage() ? 'Unselect All on Page' : 'Select All on Page'"></span>
                    </button>
                    <button type="submit"
                            class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 font-semibold">
                        Validate Selected Students
                    </button>
                </div>

                {{ $students->links() }}

                @if($students->count() > 0)
                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full border text-sm text-gray-700">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3 text-center">Select</th>
                                    <th class="p-3">Student Info</th>
                                    <th class="p-3">Previous Course</th>
                                    <th class="p-3">New Course</th>
                                    <th class="p-3">New Year</th>
                                    <th class="p-3">New Section</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    @php
                                        $profile = $student->validatedProfile ?? $student->latestProfile;
                                        $id = $student->id;
                                    @endphp
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-3 text-center">
                                            @if ($student->alreadyValidated)
                                                <span class="text-green-700 text-xs font-semibold bg-green-100 px-2 py-1 rounded">Validated</span>
                                            @else
                                                <input type="checkbox"
                                                       name="selected_students[]"
                                                       value="{{ $id }}"
                                                       x-bind:checked="isChecked('{{ $id }}')"
                                                       @change="toggle('{{ $id }}')"
                                                       class="form-checkbox">
                                            @endif
                                        </td>
                                        <td class="p-3">
                                            <div class="font-medium">{{ $student->first_name }} {{ $student->last_name }}</div>
                                            <div class="text-xs text-gray-500">ID: {{ $student->student_id }}</div>
                                        </td>
                                        <td class="p-3">
                                            {{ $student->latestProfile->course ?? '-' }}<br>
                                            {{ $student->latestProfile->year_level ?? '-' }}{{ $student->latestProfile->section ?? '' }}
                                        </td>
                                        <td class="p-3">
                                            <select name="students[{{ $id }}][course]" class="w-full border-gray-300 rounded"
                                            x-model="studentData['{{ $id }}']?.course ?? '{{ $student->alreadyValidated ? $student->validatedProfile->course : $student->latestProfile->course }}'"
                                            @change="updateStudentValue('{{ $id }}', 'course', $event.target.value)"
                                            {{ $student->alreadyValidated ? 'disabled' : '' }}>
                                            @foreach($courses as $course)
                                                <option value="{{ $course->course }}">{{ $course->course }}</option>
                                            @endforeach
                                        </select>

                                        </td>
                                        <td class="p-3">
                                            <select name="students[{{ $id }}][year_level]" class="w-full border-gray-300 rounded"
                                                x-model="studentData['{{ $id }}']?.year_level ?? '{{ $profile->year_level }}'"
                                                @change="updateStudentValue('{{ $id }}', 'year_level', $event.target.value)"
                                                {{ $student->alreadyValidated ? 'disabled' : '' }}>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->year_level }}">{{ $year->year_level }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="p-3">
                                            <select name="students[{{ $id }}][section]" class="w-full border-gray-300 rounded"
                                                x-model="studentData['{{ $id }}']?.section ?? '{{ $profile->section }}'"
                                                @change="updateStudentValue('{{ $id }}', 'section', $event.target.value)"
                                                {{ $student->alreadyValidated ? 'disabled' : '' }}>
                                                @foreach($sections as $section)
                                                    <option value="{{ $section->section }}">{{ $section->section }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center text-gray-500 py-6">No students found based on filters.</p>
                @endif
            </form>
        </div>
    </div>
</x-app-layout>
