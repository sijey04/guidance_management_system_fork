<!-- Improved Referral Creation Modal -->
<div x-show="openModal" 
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
         @click="openModal = false"></div>
    
    <!-- Modal Container -->
    <div class="flex min-h-full items-center justify-center p-4 relative"
         style="z-index: 10000;">
        <div x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @click.away="openModal = false"
             class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl"
             style="z-index: 10001;">
            
            <!-- Header -->
            <div class="border-b border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Create New Referral</h3>
                    <button @click="openModal = false" 
                            class="rounded-full p-1 text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-1">Create a new referral record for a student</p>
            </div>
            
            <!-- Form Content -->
            <div class="p-6 max-h-[60vh] overflow-y-auto">
        <form method="POST" action="{{ route('referrals.store') }}" enctype="multipart/form-data" class="space-y-4">
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
                }' class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Select Student</label>
                <input type="text" x-model="search" placeholder="Type student name or ID..." 
                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                <div class="bg-white border rounded-lg shadow-sm max-h-40 overflow-y-auto" x-show="search.length > 0" x-cloak>
                    <template x-for="student in filteredStudents" :key="student.id">
                        <div @click="selectedId = student.id; search = student.first_name + ' ' + student.last_name + ' (' + student.student_id + ')'"
                             class="p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 transition-colors">
                            <span x-text="student.first_name + ' ' + student.last_name + ' (' + student.student_id + ')'"></span>
                        </div>
                    </template>
                </div>
                <input type="hidden" name="student_id" x-model="selectedId" required>
            </div>

            <!-- Reason Dropdown -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Reason for Referral</label>
                <select name="reason" required 
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                    <option value="">Choose reason...</option>
                    @foreach($reasons as $reason)
                        <option value="{{ $reason->reason }}">{{ $reason->reason }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Date of Referral -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Date of Referral</label>
                <input type="date" name="referral_date" required 
                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
            </div>

            <!-- File Upload Section -->
           <div 
    x-data="{
        files: [],
        handleFiles(event) {
            const selectedFiles = Array.from(event.target.files);
            selectedFiles.forEach(file => {
                this.files.push({ file, url: URL.createObjectURL(file) });
            });

            const dt = new DataTransfer();
            this.files.forEach(f => dt.items.add(f.file));
            $refs.hiddenUpload.files = dt.files;
        },
        remove(index) {
            this.files.splice(index, 1);

            const dt = new DataTransfer();
            this.files.forEach(f => dt.items.add(f.file));
            $refs.hiddenUpload.files = dt.files;
        }
    }"
    class="space-y-3"
>
    <!-- Label -->
    <label class="block text-sm font-medium text-gray-700">
        Supporting Documents
    </label>

    <!-- Hidden input that holds all selected images -->
    <input type="file" name="image_path[]" multiple accept="image/*" class="hidden" x-ref="hiddenUpload">

    <!-- Upload Buttons -->
    <div class="flex gap-4">
        <!-- Camera Input -->
        <label class="flex-1 flex items-center justify-center px-3 py-2 border border-gray-400 rounded-lg bg-white text-sm font-medium text-gray-700 cursor-pointer hover:bg-gray-100 transition">
             Take Photo
            <input type="file" accept="image/*" capture="environment" class="hidden" @change="handleFiles">
        </label>

        <!-- Gallery Input -->
        <label class="flex-1 flex items-center justify-center px-3 py-2 border border-gray-400 rounded-lg bg-white text-sm font-medium text-gray-700 cursor-pointer hover:bg-gray-100 transition">
           Gallery
            <input type="file" accept="image/*" multiple class="hidden" @change="handleFiles">
        </label>
    </div>

    <!-- Thumbnails Preview -->
    <div x-show="files.length > 0" class="grid grid-cols-3 gap-3 mt-4" x-cloak>
        <template x-for="(fileObj, index) in files" :key="index">
            <div class="relative group">
                <img :src="fileObj.url" class="object-cover w-full h-20 rounded-lg border border-gray-200">
                <button type="button"
                        @click="remove(index)"
                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-opacity opacity-0 group-hover:opacity-100">
                    ×
                </button>
            </div>
        </template>
    </div>

    <p class="text-xs text-gray-500">
        Upload relevant documents or images. You can use your camera or choose from your gallery.
    </p>
</div>


            <!-- Remarks -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Additional Notes</label>
                <textarea name="remarks" rows="3" 
                          placeholder="Enter any additional information about this referral..."
                          class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors resize-none"></textarea>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" @click="openModal = false" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancel</button>
                <button class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">Save Referral</button>
            </div>
        </form>
    </div>
</div>
