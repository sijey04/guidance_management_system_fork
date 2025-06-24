<div x-show="openCreateContractModal"
     x-transition
     class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center"
     style="display: none;">

    <div class="bg-white rounded-xl shadow-lg max-w-2xl w-full p-6 relative overflow-y-auto max-h-[90vh]">

        <button @click="openCreateContractModal = false" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>

        <h2 class="text-2xl font-bold mb-6 text-center" style="color:#a82323;">Create New Contract</h2>

        <form method="POST" action="{{ route('contracts.store') }}" class="space-y-4" enctype="multipart/form-data" 
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

            <!-- Select Student (searchable) -->
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
                <label for="student_id" class="block text-sm mb-1" style="color:#a82323;">Select Student</label>
                <input type="text" x-model="search" placeholder="Type student name or ID..." class="w-full border-gray-300 rounded-lg px-3 py-2 text-gray-900">
                <div x-show="search.length > 0" class="absolute z-10 bg-white border w-full mt-1 max-h-40 overflow-y-auto rounded shadow">
                    <template x-for="student in filteredStudents" :key="student.id">
                        <div @click="selectedStudentId = student.id; search = student.first_name + ' ' + student.last_name + ' (ID: ' + student.student_id + ')'"
                             class="p-2 hover:bg-[#f8eaea] cursor-pointer">
                            <span x-text="student.first_name + ' ' + student.last_name + ' (ID: ' + student.student_id + ')'" style="color:#a82323;"></span>
                        </div>
                    </template>
                </div>
                <input type="hidden" name="student_id" x-model="selectedStudentId" required>
            </div>

            <!-- Contract Date -->
            <div>
                <label class="block text-sm mb-1" style="color:#a82323;">Contract Date</label>
                <input type="date" name="contract_date" required class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
            </div>

            <!-- Contract Type -->
            <div>
                <label class="block text-sm mb-1" style="color:#a82323;">Contract Type</label>
                <select name="contract_type" required class="w-full border-gray-300 rounded mt-1">
                    <option value="">Select Contract Type</option>
                    @foreach ($contractTypes as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Start Date (Optional) -->
            <div>
                <label class="block text-sm mb-1" style="color:#a82323;">Start Date (Optional)</label>
                <input type="date" name="start_date" x-model="startDate" class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
            </div>

            <!-- Total Days (Optional) -->
            <div>
                <label class="block text-sm mb-1" style="color:#a82323;">Total Days (Optional)</label>
                <input type="number" name="total_days" x-model="totalDays" min="1" class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
            </div>

            <!-- End Date (auto-calculated) -->
            <div>
                <label class="block text-sm mb-1" style="color:#a82323;">Suggested End Date</label>
                <input type="text" name="end_date" x-model="endDate" readonly class="w-full border-gray-300 bg-gray-100 rounded-lg mt-1 px-3 py-2 text-gray-900">
            </div>

            <!-- Remarks (Optional) -->
            <div>
                <label class="block text-sm mb-1" style="color:#a82323;">Remarks (Optional)</label>
                <textarea name="remarks" rows="3" class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900"></textarea>
            </div>

            <!-- Contract Image -->
            <div x-data="{ files: [] }">
                <label class="block text-sm mb-1" style="color:#a82323;">Attach Contract Images</label>
                <div class="flex flex-wrap gap-4">
                    <label for="contract_images" class="flex items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-gray-50 transition">
                        <span class="text-4xl text-gray-400">+</span>
                        <input type="file" id="contract_images" name="contract_images[]" multiple accept="image/*" class="hidden"
                            @change="files = Array.from($event.target.files).map(file => URL.createObjectURL(file))">
                    </label>

                    <!-- Image Previews -->
                    <template x-for="file in files" :key="file">
                        <img :src="file" class="w-32 h-32 object-cover rounded-lg border">
                    </template>
                </div>
                <p class="text-xs text-gray-500 mt-2">You can select multiple images.</p>
            </div>


            <!-- Status -->
            <div>
                <label class="text-sm">Status:</label>
                <select name="status" required class="w-full mt-1 border-gray-300 rounded">
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" @click="openCreateContractModal = false" class="sign-in-btn" style="background:#fff; color:#a82323; border:1.5px solid #a82323;">Cancel</button>
                <button type="submit" class="sign-in-btn" style="background:#a82323; color:#fff;">Save</button>
            </div>
        </form>
    </div>
</div>
