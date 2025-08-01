<!-- Improved Contract Creation Modal -->
<div x-show="openCreateContractModal || {{ $errors->any() ? 'true' : 'false' }}" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[9999] overflow-y-auto"
     style="z-index: 9999;">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" 
         style="z-index: 9998;" 
         @click="openCreateContractModal = false"></div>
    
    <!-- Modal Container -->
    <div class="flex min-h-full items-center justify-center p-4 relative"
         style="z-index: 10000;">
        <div x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @click.away="openCreateContractModal = false"
             class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl"
             style="z-index: 10001;">
            
            <!-- Header -->
            <div class="border-b border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Create New Contract</h3>
                    <button @click="openCreateContractModal = false" 
                            class="rounded-full p-1 text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-1">Create a new contract record for a student</p>
            </div>
            
            <!-- Form Content -->
            <div class="p-6 max-h-[60vh] overflow-y-auto">
                <form method="POST" action="{{ route('contracts.store') }}" enctype="multipart/form-data"
                        class="space-y-4"
                        x-data="{
                        contractDate: '{{ old('contract_date') }}',
                        startDate: '{{ old('start_date') }}',
                        endDate: '{{ old('end_date') }}',
                        totalDays: '{{ old('total_days') }}',
                        selectedContractType: '{{ old('contract_type') }}',
                        contractTypes: {{ Js::from($contractTypes) }},
                        get selectedTypeObject() {
                            return this.contractTypes.find(t => t.type === this.selectedContractType) || {};
                        }
                    }"

                        @input.debounce.300ms="
                            if(totalDays && startDate) {
                                let d = new Date(startDate);
                                d.setDate(d.getDate() + parseInt(totalDays));
                                endDate = d.toISOString().split('T')[0];
                            } else {
                                endDate = '';
                            }
                        "
                    >

                    @csrf

                    <!-- Student Selector -->
                    @php
                            $oldStudent = old('student_id') ? $students->firstWhere('id', old('student_id')) : null;
                            $oldStudentName = $oldStudent ? $oldStudent->first_name . ' ' . $oldStudent->last_name . ' (ID: ' . $oldStudent->student_id . ')' : '';
                        @endphp

                        <div 
                            x-data="{
                                search: '{{ $oldStudentName }}',
                                students: {{ Js::from($students) }},
                                selectedStudentId: '{{ old('student_id') }}',
                                get filteredStudents() {
                                    return this.students.filter(s =>
                                        (s.first_name + ' ' + s.last_name + ' ' + s.student_id)
                                            .toLowerCase()
                                            .includes(this.search.toLowerCase())
                                    );
                                }
                            }"
                            class="relative space-y-2"
                        >

                        <label for="student_search" class="block text-sm font-medium text-gray-700">
                            Select Student <span class="text-red-500">*</span>
                        </label>
                        <input type="text" x-model="search" id="student_search" 
                               placeholder="Type student name or ID..."
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                        <div x-show="search.length > 0 && filteredStudents.length > 0"
                             class="absolute z-10 bg-white border border-gray-200 w-full mt-1 max-h-40 overflow-y-auto rounded-lg shadow-lg">
                            <template x-for="student in filteredStudents" :key="student.id">
                                <div @click="selectedStudentId = student.id; search = student.first_name + ' ' + student.last_name + ' (ID: ' + student.student_id + ')'"
                                     class="p-3 hover:bg-red-50 cursor-pointer transition-colors">
                                    <span x-text="student.first_name + ' ' + student.last_name + ' (ID: ' + student.student_id + ')'"></span>
                                </div>
                            </template>
                        </div>
                        <input type="hidden" name="student_id" x-model="selectedStudentId">
                        @error('student_id')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contract Date -->
                    <div class="space-y-2">
                        <label for="contract_date" class="block text-sm font-medium text-gray-700">
                            Contract Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="contract_date" id="contract_date" required
                        x-model="contractDate" 
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                        @error('contract_date')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    
                    <!-- Contract Type -->
                    <div class="space-y-2">
                        <label for="contract_type" class="block text-sm font-medium text-gray-700">
                            Contract Type <span class="text-red-500">*</span>
                        </label>
                        <select name="contract_type" id="contract_type" required x-model="selectedContractType"
                                class="border-gray-300 rounded-lg px-3 py-2 text-sm w-full focus:ring focus:ring-red-200 focus:border-red-500 transition">
                            <option value="">Select contract type...</option>
                            @foreach ($contractTypes as $type)
                                <option value="{{ $type->type }}" {{ old('contract_type') === $type->type ? 'selected' : '' }}>
                                    {{ $type->type }}
                                </option>
                            @endforeach
                        </select>



                        @error('contract_type')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Start Date -->
                    <div x-show="selectedTypeObject.requires_start_date && !startDate" class="text-sm text-red-500">
                        This contract type requires a Start Date.
                    </div>

                    <div class="space-y-2">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">
                            Start Date <span class="text-gray-400 text-xs">(optional)</span>
                        </label>
                        <input type="date" name="start_date" id="start_date" x-model="startDate"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                        @error('start_date')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Total Days -->
                    <div x-show="selectedTypeObject.requires_total_days && !totalDays" class="text-sm text-red-500">
                        This contract type requires Total Days.
                    </div>
                    <div class="space-y-2">
                        <label for="total_days" class="block text-sm font-medium text-gray-700">
                            Total Days <span class="text-gray-400 text-xs">(optional)</span>
                        </label>
                        <input type="number" name="total_days" id="total_days" x-model="totalDays" min="1"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                        @error('total_days')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    
                    <!-- Auto-calculated End Date -->
                    <div class="space-y-2">
                        <label for="end_date" class="block text-sm font-medium text-gray-700">
                            Suggested End Date
                        </label>
                        <input type="text" name="end_date" id="end_date" x-model="endDate" readonly
                               class="block w-full rounded-lg border-gray-300 bg-gray-100 shadow-sm transition-colors">
                    </div>

                    <!-- Remarks -->
                    <div class="space-y-2">
                        <label for="remarks" class="block text-sm font-medium text-gray-700">
                            Remarks <span class="text-gray-400 text-xs">(optional)</span>
                        </label>
                        <textarea name="remarks" id="remarks" rows="3"
                                  class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors"
                                  placeholder="Enter additional remarks..."></textarea>
                        @error('remarks')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    
                    <!-- File Upload with Preview -->
                    <div x-data="{
    files: [],
    handleFiles(event) {
        const selectedFiles = Array.from(event.target.files);
        selectedFiles.forEach(file => {
            // Avoid duplicates using name + size
            if (!this.files.some(f => f.file.name === file.name && f.file.size === file.size)) {
                this.files.push({ file, url: URL.createObjectURL(file) });
            }
        });
        this.syncFinalInput();
    },
    remove(index) {
        this.files.splice(index, 1);
        this.syncFinalInput();
    },
    syncFinalInput() {
        const dataTransfer = new DataTransfer();
        this.files.forEach(f => dataTransfer.items.add(f.file));
        document.getElementById('finalInput').files = dataTransfer.files;
    }
}" class="space-y-2">
    
    <!-- Upload Options -->
    <div class="flex gap-3">
        <!-- Camera -->
        <label for="cameraInput"
            class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-red-50 transition">
            <span class="text-xs text-center text-gray-500">Scan / Camera</span>
        </label>
        <input type="file" accept="image/*" capture="environment"
            class="hidden" id="cameraInput" @change="handleFiles" multiple>

        <!-- Gallery -->
        <label for="galleryInput"
            class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-red-50 transition">
            <span class="text-xs text-center text-gray-500">Gallery</span>
        </label>
        <input type="file" accept="image/*"
            class="hidden" id="galleryInput" @change="handleFiles" multiple>

        <!-- Final submission input -->
        <input type="file" name="contract_images[]" id="finalInput" class="hidden" multiple>
    </div>

    <!-- Image Previews -->
    <div x-show="files.length > 0" class="grid grid-cols-3 gap-3 mt-4" x-cloak>
        <template x-for="(fileObj, index) in files" :key="index">
            <div class="relative w-32 h-32">
                <img :src="fileObj.url" class="object-cover w-full h-full rounded-lg border border-gray-300">
                <button type="button"
                    @click="remove(index)"
                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm hover:bg-red-600 transition">
                    ×
                </button>
            </div>
        </template>
    </div>

    <p class="text-xs text-gray-500">You can select multiple images. Preview and remove them before submitting.</p>
    @error('contract_images')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

                    
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-end space-x-3 pt-4">
                        <button type="button" @click="openCreateContractModal = false" 
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            Create Contract
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>