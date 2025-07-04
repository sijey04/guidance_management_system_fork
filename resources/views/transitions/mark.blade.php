<div x-show="openModal" @keydown.escape.window="openModal = false"
     x-cloak
     class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div @click.away="openModal = false"
         class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-6 overflow-y-auto max-h-[90vh]">
        <form action="{{ route('transitions.storeStudentTransition') }}" method="POST" class="p-6 space-y-4">
            @csrf

            <!-- ✅ Make sure this is passed correctly -->
            <input type="hidden" name="student_id" value="{{ $student->id }}">

            <h2 class="text-lg font-semibold text-gray-800">Mark Student as Transitioned</h2>

            <div>
                <label class="block text-sm font-medium text-gray-700">Transition Type</label>
               <select name="transitions[{{ $id }}][transition_type]" class="w-full border-gray-300 rounded">
                    <option value="">None</option>
                    <option value="Shifting In">Shifting In</option>
                    <option value="Shifting Out">Shifting Out</option>
                    <option value="Transferring Out">Transferring Out</option>
                    <option value="Dropped">Dropped</option>
                    <option value="Returning Student">Returning Student</option>
                </select>


            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Transition Date</label>
                <input type="date" name="transition_date" class="w-full border-gray-300 rounded mt-1" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Remarks</label>
                <textarea name="remark" rows="3" class="w-full border-gray-300 rounded mt-1"></textarea>
            </div>

            <div class="mt-4 text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                <button type="button" @click="openModal = false" class="ml-2 text-gray-500 hover:underline">Cancel</button>
            </div>
        </form>
    </div>
</div>
