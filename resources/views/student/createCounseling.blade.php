<!-- Create Counseling Modal -->
<div 
    x-show="openAddModal" 
    x-transition
    style="display: none;" 
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg w-full max-w-3xl relative max-h-[90vh] overflow-y-auto">

        <!-- Close Button -->
        <button @click="openAddModal = false" 
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 text-2xl">&times;</button>

        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Create Counseling Record</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-600 rounded border border-red-400">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('counseling.store') }}" method="POST" class="space-y-4">
            @csrf

            <input type="hidden" name="student_id" value="{{ $student->id }}">

            <div>
                <label class="block font-medium mb-1">Session Date <span class="text-red-500">*</span></label>
                <input type="date" name="session_date" required class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white" value="{{ old('session_date') }}">
            </div>

            <div>
                <label class="block font-medium mb-1">Name</label>
                <input type="text" disabled value="{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block font-medium mb-1">Age</label>
                    <input type="text" disabled value="{{ $student->age }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="block font-medium mb-1">Gender</label>
                    <input type="text" disabled value="{{ $student->gender }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="block font-medium mb-1">Course & Year</label>
                    <input type="text" disabled value="{{ $student->course_year }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            <div>
                <label class="block font-medium mb-1">Home Address</label>
                <input type="text" disabled value="{{ $student->home_address }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Father's Occupation</label>
                    <input type="text" disabled value="{{ $student->father_occupation }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="block font-medium mb-1">Mother's Occupation</label>
                    <input type="text" disabled value="{{ $student->mother_occupation }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block font-medium mb-1">No. of Sisters</label>
                    <input type="text" disabled value="{{ $student->number_of_sisters }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="block font-medium mb-1">No. of Brothers</label>
                    <input type="text" disabled value="{{ $student->number_of_brothers }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="block font-medium mb-1">Ordinal Position</label>
                    <input type="text" disabled value="{{ $student->ordinal_position }}" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            <!-- Counseling Inputs -->
            <div>
                <label class="block font-medium mb-1">Referred By</label>
                <input type="text" name="referred_by" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label class="block font-medium mb-1">Statement of the Problem</label>
                <textarea name="statement_of_problem" rows="3" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Tests/Administered</label>
                <textarea name="tests_administered" rows="3" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Evaluation</label>
                <textarea name="evaluation" rows="3" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Recommendation/Action Taken</label>
                <textarea name="recommendation_action_taken" rows="3" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Follow-up</label>
                <textarea name="follow_up" rows="3" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Guidance Counselor</label>
                <input type="text" name="guidance_counselor" class="border rounded p-2 w-full dark:bg-gray-700 dark:text-white">
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow">
                    Save Counseling Record
                </button>
            </div>
        </form>
    </div>
</div>
