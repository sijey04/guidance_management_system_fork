<!-- Improved Contract Creation Modal -->
<div x-show="openCreateContractModal"
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
                      x-data="{ totalDays: '', startDate: '', endDate: '' }"
                      @input.debounce.500ms="
                            if(totalDays && startDate) {
                                let d = new Date(startDate);
                                d.setDate(d.getDate() + parseInt(totalDays));
                                endDate = d.toISOString().split('T')[0];
                            } else {
                                endDate = '';
                            }
                      ">
                    @csrf

                    <!-- Student Selector -->
                    <div x-data='{
                        search: "",
                        students: @json($students),
                        selectedStudentId: "",
                        get filteredStudents() {
                            return this.students.filter(s =>
                                (s.first_name + " " + s.last_name + " " + s.student_id)
                                    .toLowerCase()
                                    .includes(this.search.toLowerCase())
                            );
                        }
                    }' class="relative space-y-2">
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
                               x-model="startDate" 
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
                        <select name="contract_type" id="contract_type" required 
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                            <option value="">Select contract type...</option>
                            @foreach ($contractTypes as $type)
                                <option value="{{ $type->type }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        @error('contract_type')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Start Date -->
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
                                // Avoid duplicate files by checking name + size
                                if (!this.files.some(f => f.file.name === file.name && f.file.size === file.size)) {
                                    this.files.push({ file, url: URL.createObjectURL(file) });
                                }
                            });
                            const dataTransfer = new DataTransfer();
                            this.files.forEach(f => dataTransfer.items.add(f.file));
                            document.getElementById('finalInput').files = dataTransfer.files;
                        },
                        remove(index, $event) {
                            this.files.splice(index, 1);
                            const dataTransfer = new DataTransfer();
                            this.files.forEach(f => dataTransfer.items.add(f.file));
                            document.getElementById('finalInput').files = dataTransfer.files;
                        }
                    }" class="space-y-2">
                        <div class="flex gap-3">
                            <!-- Scan using Camera -->
                            <label for="cameraInput"
                                class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-red-50 transition-colors">
                                <span class="text-xs text-center text-gray-500">Scan / Camera</span>
                            </label>
                            <input type="file" accept="image/*" capture="environment"
                                class="hidden" id="cameraInput" @change="handleFiles" multiple>

                            <!-- Choose from Gallery -->
                            <label for="galleryInput"
                                class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-red-50 transition-colors">
                                <span class="text-xs text-center text-gray-500"><br>Gallery</span>
                            </label>
                           <input type="file" accept="image/*"
                                class="hidden" id="galleryInput" @change="handleFiles" multiple>   
                                
                                <input type="file" name="contract_images[]" id="finalInput" class="hidden" multiple>
                        </div>


                        <!-- Previews -->
                        <div x-show="files.length > 0" class="grid grid-cols-3 gap-3 mt-4" x-cloak>
                            <template x-for="(fileObj, index) in files" :key="index">
                                <div class="relative w-32 h-32">
                                    <img :src="fileObj.url" class="object-cover w-full h-full rounded-lg border border-gray-300">
                                    <button type="button"
                                            @click="remove(index, $event)"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm hover:bg-red-600 transition-colors">
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
