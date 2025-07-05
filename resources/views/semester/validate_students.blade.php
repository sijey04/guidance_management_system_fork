

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
                    <div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Transition Type</label>
                        <select name="filter_transition_type" onchange="this.form.requestSubmit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Types</option>
                            <option value="Shifting In" {{ request('filter_transition_type') == 'Shifting In' ? 'selected' : '' }}>Shifting In</option>
                            <option value="Shifting Out" {{ request('filter_transition_type') == 'Shifting Out' ? 'selected' : '' }}>Shifting Out</option>
                            <option value="Transferring Out" {{ request('filter_transition_type') == 'Transferring Out' ? 'selected' : '' }}>Transferring Out</option>
                            <option value="Dropped" {{ request('filter_transition_type') == 'Dropped' ? 'selected' : '' }}>Dropped</option>
                            <option value="Returning Student" {{ request('filter_transition_type') == 'Returning Student' ? 'selected' : '' }}>Returning Student</option>
                        </select>
                    </div>
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
                                        $transitionType = $student->latestTransition->transition_type ?? null;

                                        $isNewOrTransferredIn = !$student->previousProfile || $student->previousProfile->semester_id == $newSemester->id;

                                        $isExcluded = in_array($transitionType, ['Shifting Out', 'Transferring Out']);
                                        $isDropped = $transitionType === 'Dropped';

                                        $disableDropdowns = $student->alreadyValidated || $student->currentOutTransition || $isNewOrTransferredIn;

                                        $hasReturnableTransition = in_array($transitionType, ['Dropped']);
                                        $isDisabled = $student->alreadyValidated && !$hasReturnableTransition ;
                                    @endphp



                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-3 text-center">
                                            @if ($student->alreadyValidated)
                                                <span class="text-green-700 text-xs font-semibold bg-green-100 px-2 py-1 rounded">Validated</span>
                                            @elseif($student->currentOutTransition)
                                            <span class="text-red-700 text-xs font-semibold bg-red-100 px-2 py-1 rounded">{{ $transitionType }}</span>
                                            @else
                                                <input type="checkbox"
                                                    name="selected_students[]"
                                                    value="{{ $id }}"
                                                    x-bind:checked="isChecked('{{ $id }}')"
                                                    @change="toggle('{{ $id }}')"
                                                    class="form-checkbox">
                                            @endif
                                        </td>
                                        <td class="p-3 px-5">
                                            <div class="font-medium">
                                                {{ $student->first_name }} {{ $student->last_name }}
                                               <div class="text-xs text-gray-500">ID: {{ $student->student_id }}</div>
                                                 {{-- @if($student->latestTransition && $student->latestTransition->transition_type !== 'None')
                                                    <span class="ml-2 text-xs text-red-700 bg-red-100 px-1 py-1 rounded-full">
                                                        {{ $student->latestTransition->transition_type }}
                                                    </span>
                                                 @endif --}}
                                            </div>
                                            
                                        </td>

                                        <td class="p-3">
                                        @if ($isNewOrTransferredIn)
                                            <span class="text-sm text-blue-700 bg-blue-100 px-5 py-2 rounded">New</span>
                                        @else
                                            {{ $student->previousProfile->course ?? '' }}<br>
                                            {{ $student->previousProfile->year_level ?? '' }}{{ $student->previousProfile->section ?? '' }}

                                            @if($isExcluded && !$student->currentOutTransition)
                                                <span class="text-red-700 text-xs font-semibold bg-red-100 px-2 py-1 rounded">
                                                    {{ $transitionType }}
                                                </span>
                                            @endif
                                        @endif

                                         @if($student->isReturningThisSem)
                                            <div class="mt-1 text-xs inline-block bg-purple-100 text-purple-700 px-2 py-0.5 rounded-full">
                                                Returning Student
                                            </div>
                                        @endif
                                        @if($student->showShiftingInPill)
                                            <div class="mt-1 text-xs inline-block bg-yellow-100 text-red-700 px-2 py-0.5 rounded-full">
                                                Shifting In
                                            </div>
                                        @endif
                                    </td>



                                        <td class="p-3">
                                            <select name="students[{{ $id }}][course]"
                                                class="w-full border-gray-300 rounded"
                                                x-model="studentData['{{ $id }}']?.course ?? '{{ $profile->course }}'"
                                                @change="updateStudentValue('{{ $id }}', 'course', $event.target.value)"
                                                {{ $disableDropdowns ? 'disabled' : '' }}>
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->course }}">{{ $course->course }}</option>
                                                @endforeach
                                            </select>


                                        </td>
                                        <td class="p-3">
                                            <select name="students[{{ $id }}][year_level]"
                                                class="w-full border-gray-300 rounded"
                                                x-model="studentData['{{ $id }}']?.year_level ?? '{{ $profile->year_level }}'"
                                                @change="updateStudentValue('{{ $id }}', 'year_level', $event.target.value)"
                                                {{ $disableDropdowns ? 'disabled' : '' }}>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->year_level }}">{{ $year->year_level }}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td class="p-3">
                                            <select name="students[{{ $id }}][section]"
                                                class="w-full border-gray-300 rounded"
                                                x-model="studentData['{{ $id }}']?.section ?? '{{ $profile->section }}'"
                                                @change="updateStudentValue('{{ $id }}', 'section', $event.target.value)"
                                                {{ $disableDropdowns ? 'disabled' : '' }}>
                                                @foreach($sections as $section)
                                                    <option value="{{ $section->section }}">{{ $section->section }}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <div x-data="{ openModal{{ $id }}: false }">
                                            <button type="button"
                                                    @click="openModal{{ $id }} = true"
                                                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm font-semibold"
                                                    :disabled="{{ $isDisabled ? 'true' : 'false' }}">
                                                    Mark Transition
                                                </button>



                                                <div x-show="openModal{{ $id }}" @keydown.escape.window="openModal{{ $id }} = false"
                                                    x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                                                    <div @click.away="openModal{{ $id }} = false"
                                                        class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
                                                        <h2 class="text-lg font-bold mb-4 text-gray-800">Mark Transition for {{ $student->first_name }}</h2>

                                                        <div class="space-y-4">
                                                            <input type="hidden" name="transitions[{{ $id }}][student_id]" value="{{ $id }}">

                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700">Transition Type</label>
                                                                <select name="transitions[{{ $id }}][transition_type]" class="w-full border-gray-300 rounded">
                                                                    <option value="">None</option>
                                                                    <option value="Shifting In">Shifting In</option>
                                                                    <option value="Shifting Out">Shifting Out</option>
                                                                    <option value="Transferring Out">Transferring Out</option>
                                                                    <option value="Dropped">Dropped</option>
                                                                    <option value="Returning Student">Returning Student</option>
                                                                </select>
                                                            </div>

                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700">Transition Date</label>
                                                                <input type="date" name="transitions[{{ $id }}][transition_date]" class="w-full border-gray-300 rounded">
                                                            </div>

                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700">Remarks</label>
                                                                <textarea name="transitions[{{ $id }}][remark]" rows="2" class="w-full border-gray-300 rounded"></textarea>
                                                            </div>

                                                            <div class="text-right mt-4">
                                                                <button type="button" @click="openModal{{ $id }} = false" class="text-sm text-gray-600 hover:underline">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
