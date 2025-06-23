<div x-show="openSchoolYearModal" x-transition 
     class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
     style="display: none;">
    <div class="bg-white p-6 rounded shadow-lg w-96 relative">
        <button @click="openSchoolYearModal = false" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-xl">&times;</button>
        <h2 class="text-xl font-bold text-center text-red-600 mb-4">New School Year</h2>
        <form action="{{ route('school-years.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-red-600 mb-1">Start Date:</label>
                <input type="date" name="start_date" required class="w-full border-gray-300 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-red-600 mb-1">End Date:</label>
                <input type="date" name="end_date" required class="w-full border-gray-300 rounded px-3 py-2">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" @click="openSchoolYearModal = false" 
                        class="bg-gray-200 px-4 py-2 rounded">Cancel</button>
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>
