<div x-show="openModal" 
     style="display: none;" 
     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
     x-transition>
    <div @click.away="openModal = false" class="bg-white rounded-xl shadow-lg max-w-2xl w-full p-6 relative overflow-y-auto max-h-[90vh]">
        <button @click="openModal = false" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">&times;</button>
        <h2 class="text-xl font-semibold mb-4 text-center">Add New Referral</h2>
        <form method="POST" action="{{ route('referrals.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Searchable Dropdown for Student -->
            <div x-data='{
                    search: "",
                    students: @json($students),
                    selectedId: "",
                    get filteredStudents() {
                        return this.students.filter(s => 
                            (s.first_name + " " + s.last_name + " " + s.student_id).toLowerCase().includes(this.search.toLowerCase())
                        );
                    }
                }'>
                <label class="block text-sm font-medium mb-1">Select Student</label>
                <input type="text" x-model="search" placeholder="Type name or ID..." class="w-full border p-2 rounded mb-2">
                <div class="bg-white border rounded shadow max-h-40 overflow-y-auto" x-show="search.length > 0">
                    <template x-for="student in filteredStudents" :key="student.id">
                        <div @click="selectedId = student.id; search = student.first_name + ' ' + student.last_name + ' (' + student.student_id + ')'"
                             class="p-2 hover:bg-gray-200 cursor-pointer">
                            <span x-text="student.first_name + ' ' + student.last_name + ' (' + student.student_id + ')'"></span>
                        </div>
                    </template>
                </div>
                <input type="hidden" name="student_id" x-model="selectedId" required>
            </div>

            <!-- Reason Dropdown -->
            <div class="mt-4">
                <label class="block text-sm font-medium mb-1">Reason for Referral</label>
                <select name="reason" required class="w-full border p-2 rounded">
                    <option value="">Select Reason</option>
                    @foreach($reasons as $reason)
                        <option value="{{ $reason->reason }}">{{ $reason->reason }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Date of Referral -->
            <div class="mt-4">
                <label class="block text-sm font-medium mb-1">Date of Referral</label>
                <input type="date" name="referral_date" required class="w-full border p-2 rounded">
            </div>

            <!-- Image Attachment -->
             <div x-data="{
                    files: [],
                    handleFiles(event) {
                        const selectedFiles = Array.from(event.target.files);
                        selectedFiles.forEach(file => {
                            this.files.push({ file, url: URL.createObjectURL(file) });
                        });
                        // Create a new FileList with only the files in `this.files`
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
                    <label class="block text-sm mb-1" style="color:#a82323;">Attach Contract Images</label>

                    <input type="file" name="referral_images[]" accept="image/*" multiple class="hidden" id="referralUpload" @change="handleFiles">

                    <!-- Upload Box -->
                    <label for="referralUpload" class="flex items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-gray-50 transition">
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
                </div>


            <!-- Remarks -->
            <div class="mt-4">
                <label class="block text-sm font-medium mb-1">Remarks (Optional)</label>
                <textarea name="remarks" rows="3" class="w-full border p-2 rounded"></textarea>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" @click="openModal = false" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancel</button>
                <button class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">Save Referral</button>
            </div>
        </form>
    </div>
</div>
