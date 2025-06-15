<div x-show="openCreateContractModal"
     x-transition
     class="fixed inset-0 bg-gray-500 bg-opacity-50 z-50 flex items-center justify-center"
     style="display: none;">

    <div class="bg-white rounded-xl shadow-lg w-96 p-6 relative overflow-y-auto max-h-[90vh]">

        <button @click="openCreateContractModal = false" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-xl">
            &times;
        </button>

        <h2 class="text-lg font-semibold mb-4 text-center">Create New Contract</h2>

        <form method="POST" action="{{ route('contracts.store') }}" class="space-y-3">
            @csrf

            <!-- Searchable Select Student -->
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
                <label for="student_id" class="block text-sm mb-1">Select Student</label>
                <input type="text" 
                       x-model="search" 
                       placeholder="Type student name or ID..." 
                       class="w-full border-gray-300 rounded p-2">

                <div x-show="search.length > 0" 
                     class="absolute z-10 bg-white border w-full mt-1 max-h-40 overflow-y-auto rounded shadow">
                    <template x-for="student in filteredStudents" :key="student.id">
                        <div @click="selectedStudentId = student.id; search = student.first_name + ' ' + student.last_name + ' (ID: ' + student.student_id + ')'"
                             class="p-2 hover:bg-gray-100 cursor-pointer">
                            <span x-text="student.first_name + ' ' + student.last_name + ' (ID: ' + student.student_id + ')'"></span>
                        </div>
                    </template>
                </div>

                <!-- Hidden input to submit the selected student ID -->
                <input type="hidden" name="student_id" x-model="selectedStudentId" required>
            </div>

            <!-- Semester -->
            <div>
                <label for="semester_id" class="block text-sm mb-1">Semester</label>
                <select name="semester_id" required class="w-full border-gray-300 rounded mt-1 p-2">
    @foreach ($semesters as $semester)
        <option value="{{ $semester->id }}">
            A.Y {{ $semester->school_year }} {{ $semester->semester }} Semester
            @if($semester->is_current) — Active @endif
        </option>
    @endforeach
</select>
            </div>

            <!-- Contract Date -->
            <div>
                <label for="contract_date" class="block text-sm mb-1">Contract Date</label>
                <input type="date" name="contract_date" required class="w-full border-gray-300 rounded mt-1 p-2">
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm mb-1">Content</label>
                <textarea name="content" required class="w-full border-gray-300 rounded mt-1 p-2"></textarea>
            </div>

            <!-- Total Days (Optional) -->
            <div>
                <label for="total_days" class="block text-sm mb-1">Total Days (Optional)</label>
                <input type="number" name="total_days" min="1" class="w-full border-gray-300 rounded mt-1 p-2">
            </div>

            <!-- Completed Days (Optional) -->
            <div>
                <label for="completed_days" class="block text-sm mb-1">Completed Days (Optional)</label>
                <input type="number" name="completed_days" min="0" class="w-full border-gray-300 rounded mt-1 p-2">
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm mb-1">Status</label>
                <select name="status" required class="w-full border-gray-300 rounded mt-1 p-2">
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 mt-4">
                <x-secondary-button type="button" @click="openCreateContractModal = false" 
                        class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancel</x-secondary-button>
                <x-primary-button type="submit" >Save</x-primary-button>
            </div>
        </form>
    </div>
</div>
