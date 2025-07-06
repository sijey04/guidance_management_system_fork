<div x-show="openModal"
     style="display: none;"
     class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4"
     x-transition>
    <div @click.away="openModal = false"
         class="bg-white p-6 rounded-lg w-full max-w-lg sm:max-w-xl md:max-w-2xl relative shadow-lg overflow-y-auto max-h-[90vh]">

        <!-- Close Button -->
        <button @click="openModal = false"
                class="absolute top-3 right-3 text-gray-500 hover:text-red-600 text-xl">
            &times;
        </button>

        <!-- Modal Title -->
        <h2 class="text-xl font-semibold mb-4 text-center text-gray-800">
            Create Counseling Record
        </h2>

        <!-- Form -->
        <form method="POST" action="{{ route('counseling.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Student Selector -->
            <div x-data='{
                search: "",
                students: @json($students),
                selectedId: "",
                get filteredStudents() {
                    return this.students.filter(s =>
                        (s.first_name + " " + s.last_name + " " + s.student_id)
                        .toLowerCase()
                        .includes(this.search.toLowerCase())
                    );
                }
            }'>
                <label class="block text-sm font-medium text-gray-700 mb-1">Select Student <span class="text-red-600">*</span></label>
                <input type="text" x-model="search" placeholder="Type name or ID..."
                       class="w-full border-gray-300 rounded px-3 py-2 text-sm mb-1">
                <div class="bg-white border rounded shadow max-h-40 overflow-y-auto text-sm"
                     x-show="search.length > 0 && filteredStudents.length > 0">
                    <template x-for="student in filteredStudents" :key="student.id">
                        <div @click="selectedId = student.id; search = student.first_name + ' ' + student.last_name + ' (' + student.student_id + ')'"
                             class="px-3 py-2 hover:bg-gray-200 cursor-pointer">
                            <span x-text="student.first_name + ' ' + student.last_name + ' (' + student.student_id + ')'"></span>
                        </div>
                    </template>
                </div>
                <input type="hidden" name="student_id" x-model="selectedId">
                @error('student_id')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Counseling Date -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Counseling Date <span class="text-red-600">*</span></label>
                <input type="date" name="counseling_date"
                       class="w-full border-gray-300 rounded px-3 py-2 text-sm"
                       required>
                @error('counseling_date')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remarks -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Remarks <span class="text-gray-500 text-xs">(Optional)</span></label>
                <textarea name="remarks" rows="3"
                          class="w-full border-gray-300 rounded px-3 py-2 text-sm"
                          placeholder="Additional notes, if any..."></textarea>
                @error('remarks')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Counseling Form Images -->
<div x-data="{
    files: [],
    handleFiles(event) {
        const selectedFiles = Array.from(event.target.files);
        selectedFiles.forEach(file => {
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
        $event.target.closest('form').querySelector('#formImagesInput').files = dt.files;
    }
}" class="mt-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Counseling Form Pictures <span class="text-gray-500 text-xs">(Multiple)</span></label>
    
    <input type="file" name="form_images[]" id="formImagesInput" accept="image/*" multiple class="hidden" @change="handleFiles">

    <label for="formImagesInput"
           class="flex items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-gray-50 transition">
        <span class="text-4xl text-gray-400">+</span>
    </label>

    <div class="flex flex-wrap gap-4 mt-4">
        <template x-for="(file, index) in files" :key="index">
            <div class="relative w-32 h-32">
                <img :src="file.url" class="object-cover w-full h-full rounded-lg border">
                <button type="button"
                        @click="remove(index, $event)"
                        class="absolute top-0 right-0 bg-white rounded-full p-1 shadow text-red-600 hover:text-red-800">
                    &times;
                </button>
            </div>
        </template>
    </div>

    <p class="text-xs text-gray-500 mt-2">You can add or remove images before submitting.</p>
    @error('form_images')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>


            <!-- Student ID Card Images -->
<div x-data="{
    files: [],
    handleFiles(event) {
        const selectedFiles = Array.from(event.target.files);
        selectedFiles.forEach(file => {
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
        $event.target.closest('form').querySelector('#idImagesInput').files = dt.files;
    }
}" class="mt-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Student ID Card <span class="text-gray-500 text-xs">(Front/Back)</span></label>

    <input type="file" name="id_images[]" id="idImagesInput" accept="image/*" multiple class="hidden" @change="handleFiles">

    <label for="idImagesInput"
           class="flex items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 cursor-pointer hover:border-red-500 hover:bg-gray-50 transition">
        <span class="text-4xl text-gray-400">+</span>
    </label>

    <div class="flex flex-wrap gap-4 mt-4">
        <template x-for="(file, index) in files" :key="index">
            <div class="relative w-32 h-32">
                <img :src="file.url" class="object-cover w-full h-full rounded-lg border">
                <button type="button"
                        @click="remove(index, $event)"
                        class="absolute top-0 right-0 bg-white rounded-full p-1 shadow text-red-600 hover:text-red-800">
                    &times;
                </button>
            </div>
        </template>
    </div>

    <p class="text-xs text-gray-500 mt-2">You can upload both front and back of the ID. Remove as needed.</p>
    @error('id_images')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>


            <!-- Buttons -->
            <div class="pt-4 flex justify-end gap-3">
                <button type="button" @click="openModal = false"
                        class="px-4 py-2 text-sm rounded border border-gray-300 text-gray-700 hover:bg-gray-100">
                    Cancel
                </button>
                <button type="submit"
                        class="px-5 py-2 text-sm font-semibold text-white rounded"
                        style="background:#a82323;">
                    Save Counseling
                </button>
            </div>
        </form>
    </div>
</div>
