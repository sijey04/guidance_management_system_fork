<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Validate Students
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8"
         x-data="{
             selected: {{ $selectedStudents->toJson() }},
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
             },

            warnIfSelected() {
    if (this.selected.length > 0) {
        alert('⚠️ You have selected students. Please validate them first or your selection will be lost.');
        return false;
    }
    return true;
}
}"

x-init="
    $nextTick(() => {
        document.querySelectorAll('.pagination a').forEach(link => {
            link.addEventListener('click', function(event) {
                if (!warnIfSelected()) {
                    event.preventDefault();
                }
            });
        });
    })
"
>

        <div class="bg-white p-6 shadow rounded-lg">

            
            <div class="mb-4">
            <a href="{{ route('semester.index') }}"
   class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-sm font-semibold text-[#a82323] rounded hover:bg-gray-100 transition">
   ← Back to A.y Setup List
</a>


        </div>
{{-- Success and Error Flash Messages --}}
@if (session('success'))
    <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 px-4 py-3 bg-red-100 border border-red-300 text-red-800 rounded">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 px-4 py-3 bg-red-100 border border-red-300 text-red-800 rounded">
        <strong>There were some issues with your submission:</strong>
        <ul class="list-disc pl-5 mt-2 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Validate Students from Previous Semesters</h2>
            <p class="text-gray-500 mb-6">
                Select and validate students from <strong>all previous semesters</strong> into the new semester 
                <strong>{{ $newSemester->schoolYear->school_year }} - {{ $newSemester->semester }}</strong>.
            </p>

            <!-- FILTER FORM -->
            <form method="GET" action="{{ route('semester.validate', $newSemester->id) }}" @submit.prevent="injectHiddenInputs($el); $el.submit()">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">

                    <div>
                        <label class="text-sm font-medium text-gray-600">Course</label>
                        <select name="filter_course"  @change.prevent="if (warnIfSelected()) $el.form.requestSubmit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Courses</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->course }}" {{ request('filter_course') == $course->course ? 'selected' : '' }}>{{ $course->course }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Year Level</label>
                        <select name="filter_year_level"  @change.prevent="if (warnIfSelected()) $el.form.requestSubmit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Years</option>
                            @foreach($years as $year)
                                <option value="{{ $year->year_level }}" {{ request('filter_year_level') == $year->year_level ? 'selected' : '' }}>{{ $year->year_level }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Section</label>
                        <select name="filter_section"  @change.prevent="if (warnIfSelected()) $el.form.requestSubmit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Sections</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->section }}" {{ request('filter_section') == $section->section ? 'selected' : '' }}>{{ $section->section }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Transition Type</label>
                        <select name="filter_transition_type"  @change.prevent="if (warnIfSelected()) $el.form.requestSubmit()" class="w-full mt-1 border-gray-300 rounded">
                            <option value="">All Types</option>
                            <option value="Shifting In" {{ request('filter_transition_type') == 'Shifting In' ? 'selected' : '' }}>Shifting In</option>
                            <option value="Shifting Out" {{ request('filter_transition_type') == 'Shifting Out' ? 'selected' : '' }}>Shifting Out</option>
                            <option value="Transferring Out" {{ request('filter_transition_type') == 'Transferring Out' ? 'selected' : '' }}>Transferring Out</option>
                            <option value="Dropped" {{ request('filter_transition_type') == 'Dropped' ? 'selected' : '' }}>Dropped</option>
                            <option value="Returning Student" {{ request('filter_transition_type') == 'Returning Student' ? 'selected' : '' }}>Returning Student</option>
                             <option value="Graduated" {{ request('filter_transition_type') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm font-medium text-gray-600">Search</label>
                        <input type="text"
    name="search"
    value="{{ request('search') }}"
    placeholder="Search by student ID or name"
    class="w-full mt-1 border-gray-300 rounded"
   @keydown.enter.prevent="if (warnIfSelected()) { injectHiddenInputs($el.form); $el.form.submit() }"
>

                    </div>
                </div>
                <div id="selected-hidden"></div>
            </form>

            <!-- VALIDATION FORM -->
            <form id="validateForm" method="POST" enctype="multipart/form-data" action="{{ route('semester.processValidate', $newSemester->id) }}" @submit="injectHiddenInputs($el)">
                @csrf
                <div id="selected-hidden"></div>

                <div class="flex justify-between items-center px-4 py-3 sticky bottom-0 bg-white border-t border-gray-200 z-10">
                    <div  class="flex gap-3 items-center">
                        <button type="button" @click="toggleAllOnPage"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-semibold">
                            <span x-text="allSelectedOnPage() ? 'Unselect All on Page' : 'Select All on Page'"></span>
                        </button>
                         <button type="submit"
                                class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                            Validate Selected Students
                        </button>
                    </div>
                       
                        <div class="pagination">
                            {{ $students->links() }}
                        </div>
                </div>

                @if($students->count() > 0)

                  <div class="relative max-h-[70vh] overflow-y-auto border rounded shadow">
                    
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
                                    <th class="p-3 text-center"></th>
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
                                                 {{ $student->last_name }},  {{ $student->first_name }} {{ $student->middle_name }}.  {{ $student->suffix }}
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
                                        @if($student->wasDroppedInPreviousSem)
                                            <div class="mt-1 text-xs inline-block bg-red-100 text-red-700 px-2 py-0.5 rounded-full">
                                                Dropped (Previous Sem)
                                            </div>
                                        @endif
                                        @if ($student->currentOutTransition)
                                            <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">
                                                {{ $student->currentOutTransition->transition_type }}
                                            </span>
                                        @endif
                                        @if ($student->latestTransition && $student->latestTransition->transition_type === 'Graduated')
                                            <div class="mt-1 text-xs inline-block bg-gray-300 text-gray-700 px-2 py-0.5 rounded-full">
                                                Graduated
                                            </div>
                                        @endif
                                    </td>



                                        <td class="p-3">
                                            <select name="students[{{ $id }}][course]"
                                                class="w-full border-gray-300 rounded"
                                                x-model="studentData['{{ $id }}']?.course ?? '{{ $profile->course }}'"
                                                @change="updateStudentValue('{{ $id }}', 'course', $event.target.value)"
                                                {{ $disableDropdowns ? 'disabled' : '' }} >
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
                                        <td class="p-3">
                                            <div x-data="{ openModal{{ $id }}: false }">
                                            <button type="button"
                                                    @click="openModal{{ $id }} = true"
                                                    class="bg-[#a82323] text-white text-xs font-semibold px-2 py-2 rounded hover:bg-red-700 transition"
                                                    :disabled="{{ $isDisabled ? 'true' : 'false' }}">
                                                    Update
                                                </button>



                                                <!-- Improved Student Transition Modal -->
                                                <div x-show="openModal{{ $id }}" 
                                                     @keydown.escape.window="openModal{{ $id }} = false"
                                                     x-transition:enter="transition ease-out duration-300"
                                                     x-transition:enter-start="opacity-0"
                                                     x-transition:enter-end="opacity-100"
                                                     x-transition:leave="transition ease-in duration-200"
                                                     x-transition:leave-start="opacity-100"
                                                     x-transition:leave-end="opacity-0"
                                                     x-cloak class="fixed inset-0 z-[9999] overflow-y-auto"
                                                     style="z-index: 9999;">
                                                    
                                                    <!-- Backdrop -->
                                                    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" 
                                                         style="z-index: 9998;" 
                                                         @click="openModal{{ $id }} = false"></div>
                                                    
                                                    <!-- Modal Container -->
                                                    <div class="flex min-h-full items-center justify-center p-4 relative"
                                                         style="z-index: 10000;">
                                                        <div x-data="{ transitionType: '' }"
                                                        x-transition:enter="transition ease-out duration-300"
                                                             x-transition:enter-start="opacity-0 scale-95"
                                                             x-transition:enter-end="opacity-100 scale-100"
                                                             x-transition:leave="transition ease-in duration-200"
                                                             x-transition:leave-start="opacity-100 scale-100"
                                                             x-transition:leave-end="opacity-0 scale-95"
                                                             @click.away="openModal{{ $id }} = false"
                                                             class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl"
                                                             style="z-index: 10001;">
                                                            
                                                            <!-- Header -->
                                                            <div class="border-b border-gray-100 p-6">
                                                                <div class="flex items-center justify-between">
                                                                    <div>
                                                                        <h3 class="text-lg font-semibold text-gray-900">Mark Student Transition</h3>
                                                                        <p class="text-sm text-gray-500 mt-1">{{ $student->first_name }} {{ $student->last_name }}</p>
                                                                    </div>
                                                                    <button @click="openModal{{ $id }} = false" 
                                                                            class="rounded-full p-1 text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Content -->
                                                            <div class="p-6 space-y-6">
                                                                <input type="hidden" name="transitions[{{ $id }}][student_id]" value="{{ $id }}">

                                                                <!-- Transition Type -->
                                                                <div class="space-y-2">
                                                                    <label class="block text-sm font-medium text-gray-700">
                                                                        Transition Type
                                                                    </label>
                                                                    <select name="transitions[{{ $id }}][transition_type]"
                                                                            x-model="transitionType"
                                                                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                                                                        <option value="">No transition</option>
                                                                        <option value="Shifting In">Shifting In</option>
                                                                        <option value="Shifting Out">Shifting Out</option>
                                                                        <option value="Transferring Out">Transferring Out</option>
                                                                        <option value="Dropped">Dropped</option>
                                                                        <option value="Returning Student">Returning Student</option>
                                                                        <option value="Graduated">Graduated</option>
                                                                    </select>

                                                                </div>

                                                                <div x-show="['Shifting In', 'Returning Student', 'Dropped'].includes(transitionType)" x-cloak class="space-y-4">
                                                                    <!-- Course Dropdown -->
                                                                    <div>
                                                                        <label class="block text-sm font-medium text-gray-700">New Course</label>
                                                                        <select x-model="studentData['{{ $id }}']?.course ?? '{{ $profile->course }}'"
                                                                         x-ref="newCourse" name="transitions[{{ $id }}][new_course]"  class="block w-full mt-1 rounded-md border-gray-300 text-sm">
                                                                            <option value="">Select Course</option>
                                                                            @foreach($courses as $course)
                                                                                <option value="{{ $course->course }}">{{ $course->course }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <!-- Year Level Dropdown -->
                                                                    <div>
                                                                        <label class="block text-sm font-medium text-gray-700">New Year Level</label>
                                                                        <select  x-model="studentData['{{ $id }}']?.year_level ?? '{{ $profile->year_level }}'" x-ref="newYear" name="transitions[{{ $id }}][new_year_level]" class="block w-full mt-1 rounded-md border-gray-300 text-sm">
                                                                            <option value="">Select Year Level</option>
                                                                            @foreach($years as $year)
                                                                                <option value="{{ $year->year_level }}">{{ $year->year_level }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <!-- Section Dropdown -->
                                                                    <div>
                                                                        <label class="block text-sm font-medium text-gray-700">New Section</label>
                                                                        <select  x-model="studentData['{{ $id }}']?.section ?? '{{ $profile->section }}'" x-ref="newSection" name="transitions[{{ $id }}][new_section]" class="block w-full mt-1 rounded-md border-gray-300 text-sm">
                                                                            <option value="">Select Section</option>
                                                                            @foreach($sections as $section)
                                                                                <option value="{{ $section->section }}">{{ $section->section }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <!-- Remarks -->
                                                                <div class="space-y-2">
                                                                    <label class="block text-sm font-medium text-gray-700">
                                                                        Additional Notes
                                                                    </label>
                                                                    <textarea name="transitions[{{ $id }}][remark]" rows="3" 
                                                                              placeholder="Enter any additional information about this transition..."
                                                                              class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors resize-none"></textarea>
                                                                </div>

                                                                <!-- File Upload Section with Take Photo or Gallery -->
                                                                <div x-data="{
                                                                    files: [],
                                                                    handleFiles(event) {
                                                                        const selected = Array.from(event.target.files);
                                                                        selected.forEach(file => {
                                                                            this.files.push({ file, url: URL.createObjectURL(file) });
                                                                        });
                                                                        const dt = new DataTransfer();
                                                                        this.files.forEach(f => dt.items.add(f.file));
                                                                        event.target.files = dt.files;
                                                                    },
                                                                    remove(index, $event) {
                                                                        this.files.splice(index, 1);
                                                                        const dt = new DataTransfer();
                                                                        this.files.forEach(f => dt.items.add(f.file));
                                                                        $event.target.closest('form').querySelector('#transitionUpload-{{ $id }}').files = dt.files;
                                                                    },
                                                                    openCamera() {
                                                                        this.$refs.input.setAttribute('capture', 'environment');
                                                                        this.$refs.input.click();
                                                                    },
                                                                    openGallery() {
                                                                        this.$refs.input.removeAttribute('capture');
                                                                        this.$refs.input.click();
                                                                    }
                                                                }" class="space-y-3">
                                                                    <label class="block text-sm font-medium text-gray-700">Supporting Documents</label>

                                                                    <!-- Hidden File Input -->
                                                                    <input type="file" name="transition_images[{{ $id }}][]" accept="image/*" multiple
                                                                        class="hidden" id="transitionUpload-{{ $id }}" x-ref="input" @change="handleFiles">

                                                                    <!-- Action Buttons: Take Photo / Choose Gallery -->
                                                                    <div class="flex gap-4">
                                                                        <!-- Take Photo -->
                                                                        <button type="button" @click="openCamera"
                                                                                class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-28 h-28 hover:border-red-500 hover:bg-gray-50 transition">
                                                                            <span class="text-2xl">📷</span>
                                                                            <span class="text-xs mt-1 text-gray-600">Take Photo</span>
                                                                        </button>

                                                                        <!-- Choose Gallery -->
                                                                        <button type="button" @click="openGallery"
                                                                                class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-28 h-28 hover:border-red-500 hover:bg-gray-50 transition">
                                                                            <span class="text-2xl">🖼️</span>
                                                                            <span class="text-xs mt-1 text-gray-600">Choose Gallery</span>
                                                                        </button>
                                                                    </div>

                                                                    <!-- Preview Thumbnails -->
                                                                    <div x-show="files.length > 0" class="grid grid-cols-3 gap-3 mt-4">
                                                                        <template x-for="(fileObj, index) in files" :key="index">
                                                                            <div class="relative group">
                                                                                <img :src="fileObj.url" class="object-cover w-full h-20 rounded-lg border border-gray-200">
                                                                                <button type="button"
                                                                                        @click="remove(index, $event)"
                                                                                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-colors opacity-0 group-hover:opacity-100">
                                                                                    ×
                                                                                </button>
                                                                            </div>
                                                                        </template>
                                                                    </div>

                                                                    <p class="text-xs text-gray-500">You may upload relevant documents or take a photo directly.</p>
                                                                </div>

                                                            </div>
                                                            
                                                            <!-- Footer -->
                                                            <div class="border-t border-gray-100 p-6">
                                                                <div class="flex items-center justify-end space-x-3">
                                                                    <button type="button" @click="openModal{{ $id }} = false" 
                                                                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                                                        Cancel
                                                                    </button>
                                                                   <button
    type="button"
    @click="
        if (!studentData['{{ $id }}']) {
            studentData['{{ $id }}'] = {};
        }

        if (['Shifting In', 'Returning Student', 'Dropped'].includes(transitionType)) {
            studentData['{{ $id }}'].course = $refs.newCourse.value;
            studentData['{{ $id }}'].year_level = $refs.newYear.value;
            studentData['{{ $id }}'].section = $refs.newSection.value;
        }

        // Mark this student as selected for validation
        if (!selected.includes('{{ $id }}')) {
            selected.push('{{ $id }}');
        }

        localStorage.setItem('studentData', JSON.stringify(studentData));

        // Close modal
        openModal{{ $id }} = false;

        // Submit form immediately to validate
        $nextTick(() => document.getElementById('validateForm').submit());
    "
    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700"
>
    Save Transition & Validate
</button>



                                                                </div>
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
                    </div>
                @else
                    <p class="text-center text-gray-500 py-6">No students found based on filters.</p>
                @endif
            </form>
        </div>
    </div>
</x-app-layout>
