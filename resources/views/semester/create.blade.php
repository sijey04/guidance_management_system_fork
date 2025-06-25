<div x-show="openSemesterModal" x-transition class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-xl font-bold text-center text-red-600 mb-4">New Semester</h2>
        <form action="{{ route('semesters.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-red-600 mb-1">Semester:</label>
                <select name="semester" required class="w-full border-gray-300 rounded px-3 py-2">
                    <option value="">Select Semester</option>
                    <option value="1st" hidden>1st</option>
                    <option value="2nd">2nd</option>
                    <option value="Summer">Summer</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_current" value="1" class="mr-2"> Set as Current
                </label>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" @click="openSemesterModal = false" class="bg-gray-200 px-4 py-2 rounded">Cancel</button>
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>
