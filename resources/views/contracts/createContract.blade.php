<div x-show="openCreateContractModal"
     x-transition
     class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center px-4"
     style="display: none;">

    <div class="bg-white rounded-xl shadow-lg max-w-2xl w-full p-6 relative overflow-y-auto max-h-[90vh]">

        <!-- Close Button -->
        <button @click="openCreateContractModal = false"
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>

        <h2 class="text-2xl font-bold mb-6 text-center text-[#a82323]">Create New Contract</h2>

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
            }' class="relative">
                <label class="block text-sm font-medium mb-1 text-[#a82323]">Select Student <span class="text-red-600">*</span></label>
                <input type="text" x-model="search" placeholder="Type student name or ID..."
                       class="w-full border-gray-300 rounded-lg px-3 py-2 text-sm">
                <div x-show="search.length > 0 && filteredStudents.length > 0"
                     class="absolute z-10 bg-white border w-full mt-1 max-h-40 overflow-y-auto rounded shadow">
                    <template x-for="student in filteredStudents" :key="student.id">
                        <div @click="selectedStudentId = student.id; search = student.first_name + ' ' + student.last_name + ' (ID: ' + student.student_id + ')'"
                             class="p-2 hover:bg-[#f8eaea] cursor-pointer">
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
            <div>
                <label class="block text-sm font-medium text-[#a82323] mb-1">Contract Date <span class="text-red-600">*</span></label>
                <input type="date" name="contract_date"
                       class="w-full border-gray-300 rounded-lg px-3 py-2 text-sm"
                       required>
                @error('contract_date')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contract Type -->
            <div>
                <label class="block text-sm font-medium text-[#a82323] mb-1">Contract Type <span class="text-red-600">*</span></label>
                <select name="contract_type" required class="w-full border-gray-300 rounded-lg px-3 py-2 text-sm">
                    <option value="">Select Contract Type</option>
                    @foreach ($contractTypes as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                    @endforeach
                </select>
                @error('contract_type')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Start Date -->
            <div>
                <label class="block text-sm font-medium text-[#a82323] mb-1">Start Date (Optional)</label>
                <input type="date" name="start_date" x-model="startDate"
                       class="w-full border-gray-300 rounded-lg px-3 py-2 text-sm">
                @error('start_date')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Total Days -->
            <div>
                <label class="block text-sm font-medium text-[#a82323] mb-1">Total Days (Optional)</label>
                <input type="number" name="total_days" x-model="totalDays" min="1"
                       class="w-full border-gray-300 rounded-lg px-3 py-2 text-sm">
                @error('total_days')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Auto-calculated End Date -->
            <div>
                <label class="block text-sm font-medium text-[#a82323] mb-1">Suggested End Date</label>
                <input type="text" name="end_date" x-model="endDate" readonly
                       class="w-full border-gray-300 bg-gray-100 rounded-lg px-3 py-2 text-sm">
            </div>

            <!-- Remarks -->
            <div>
                <label class="block text-sm font-medium text-[#a82323] mb-1">Remarks (Optional)</label>
                <textarea name="remarks" rows="3"
                          class="w-full border-gray-300 rounded-lg px-3 py-2 text-sm"></textarea>
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
                        this.files.push({ file, url: URL.createObjectURL(file) });
                    });
                    const dataTransfer = new DataTransfer();
                    this.files.forEach(f => dataTransfer.items.add(f.file));
                    event.target.files = dataTransfer.files;
                },
                remove(index, $event) {
                    this.files.splice(index, 1);
                    const dataTransfer = new DataTransfer();
                    this.files.forEach(f => dataTransfer.items.add(f.file));
                    $event.target.closest('form').querySelector('input[type=file]').files = dataTransfer.files;
                }
            }" class="mt-4">
                <label class="block text-sm font-medium text-[#a82323] mb-1">Attach Contract Images (Optional)</label>
                <input type="file" name="contract_images[]" accept="image/*" multiple
                       class="hidden" id="contractUpload" @change="handleFiles">

                <!-- Upload Area -->
                <label for="contractUpload"
                       class="flex items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-gray-50 transition">
                    <span class="text-4xl text-gray-400">+</span>
                </label>

                <!-- Previews -->
                <div class="flex flex-wrap gap-4 mt-4">
                    <template x-for="(fileObj, index) in files" :key="index">
                        <div class="relative w-32 h-32">
                            <img :src="fileObj.url" class="object-cover w-full h-full rounded-lg border">
                            <button type="button"
                                    @click="remove(index, $event)"
                                    class="absolute top-0 right-0 bg-white rounded-full p-1 shadow text-red-600 hover:text-red-800">
                                &times;
                            </button>
                        </div>
                    </template>
                </div>

                <p class="text-xs text-gray-500 mt-2">You can select one or more images. You may also remove them before submitting.</p>
                @error('contract_images')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" @click="openCreateContractModal = false"
                        class="px-5 py-2 text-sm font-semibold border border-gray-300 text-gray-700 rounded hover:bg-gray-100">
                    Cancel
                </button>
                <button type="submit"
                        class="px-5 py-2 text-sm font-semibold text-white rounded"
                        style="background:#a82323;">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
