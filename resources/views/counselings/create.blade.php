<div x-show="openModal" 
     style="display: none;" 
     class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" 
     x-transition>
    <div @click.away="openModal = false" class="bg-white p-6 rounded-lg w-full max-w-lg relative">
        <button @click="openModal = false" class="absolute top-2 right-2 text-gray-600 text-xl">&times;</button>
        <h2 class="text-xl font-semibold mb-4 text-center">Create Counseling Record</h2>

        <form method="POST" action="{{ route('counseling.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Searchable Dropdown -->
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

            <!-- Date -->
            <div class="mt-4">
                <label class="block text-sm mb-1">Session Date</label>
                <input type="date" name="counseling_date" required class="w-full border p-2 rounded">
            </div>

            <!-- Image Upload -->
            <div class="mt-4">
                <label class="block text-sm mb-1">Attach Image (Optional)</label>
                <input type="file" name="image_path" accept="image/*" class="w-full border p-2 rounded">
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" @click="openModal = false" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save Counseling</button>
            </div>
        </form>
    </div>
</div>
