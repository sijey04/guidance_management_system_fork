<div x-show="openCreateContractModal"
     x-transition
     class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center"
     style="display: none;">

    <div class="bg-white rounded-xl shadow-lg max-w-2xl w-full p-6 relative overflow-y-auto max-h-[90vh]">

        <button @click="openCreateContractModal = false" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>

        <h2 class="text-2xl font-bold mb-6 text-center" style="color:#a82323;">Create New Contract</h2>

        <form method="POST" action="{{ route('contracts.store') }}" class="space-y-4" enctype="multipart/form-data">
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
                <label for="student_id" class="block text-sm mb-1" style="color:#a82323;">Select Student</label>
                <input type="text" 
                       x-model="search" 
                       placeholder="Type student name or ID..." 
                       class="w-full border-gray-300 rounded-lg px-3 py-2 text-gray-900">

                <div x-show="search.length > 0" 
                     class="absolute z-10 bg-white border w-full mt-1 max-h-40 overflow-y-auto rounded shadow">
                    <template x-for="student in filteredStudents" :key="student.id">
                        <div @click="selectedStudentId = student.id; search = student.first_name + ' ' + student.last_name + ' (ID: ' + student.student_id + ')'"
                             class="p-2 hover:bg-[#f8eaea] cursor-pointer">
                            <span x-text="student.first_name + ' ' + student.last_name + ' (ID: ' + student.student_id + ')'" style="color:#a82323;"></span>
                        </div>
                    </template>
                </div>

                <!-- Hidden input to submit the selected student ID -->
                <input type="hidden" name="student_id" x-model="selectedStudentId" required>
            </div>

            <!-- Semester -->
            <div>
                <label for="semester_id" class="block text-sm mb-1" style="color:#a82323;">Semester</label>
                <select name="semester_id" required class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
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
                <label for="contract_date" class="block text-sm mb-1" style="color:#a82323;">Contract Date</label>
                <input type="date" name="contract_date" required class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm mb-1" style="color:#a82323;">Content</label>
                <textarea name="content" required class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900"></textarea>
            </div>

            <!-- Total Days (Optional) -->
            <div>
                <label for="total_days" class="block text-sm mb-1" style="color:#a82323;">Total Days (Optional)</label>
                <input type="number" name="total_days" min="1" class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
            </div>

            <!-- Completed Days (Optional) -->
            <div>
                <label for="completed_days" class="block text-sm mb-1" style="color:#a82323;">Completed Days (Optional)</label>
                <input type="number" name="completed_days" min="0" class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm mb-1" style="color:#a82323;">Status</label>
                <select name="status" required class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <!-- Contract Image -->
            <div>
                <label for="contract_image" class="block text-sm mb-1" style="color:#a82323;">Contract Image</label>
                <input type="file" name="contract_image" accept="image/*" class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
            </div>

            <!-- Contract Count -->
            <div>
                <label for="contract_count" class="block text-sm mb-1" style="color:#a82323;">Number of Times This Contract is For</label>
                <input type="number" name="contract_count" min="1" required class="w-full border-gray-300 rounded-lg mt-1 px-3 py-2 text-gray-900">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" @click="openCreateContractModal = false" class="sign-in-btn" style="background:#fff; color:#a82323; border:1.5px solid #a82323; border-radius:6px; padding:7px 16px; font-weight:600;">Cancel</button>
                <button type="submit" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">Save</button>
            </div>
        </form>
    </div>
</div>
