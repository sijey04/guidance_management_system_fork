<div x-show="openTransitionModal" x-cloak class="fixed inset-0 z-50 bg-black bg-opacity-40 flex items-center justify-center">
    <div @click.away="openTransitionModal = false" class="bg-white rounded-lg shadow-lg p-6 w-full max-w-xl">
        <h2 class="text-lg font-semibold mb-4 text-gray-800">Student Movement Record</h2>

        <form method="POST" action="{{ route('student.transition.store') }}">
            @csrf

            <input type="hidden" name="student_id" value="{{ $student->id }}">

            <div class="mb-4">
                <label class="block text-sm font-medium">Movement Type</label>
                <select name="transition_type" class="w-full border p-2 rounded" required>
                    <option value="">-- Select --</option>
                    <option value="Shiftee">Shift-Out</option>
                    <option value="Transferee">Transfer-Out</option>
                    <option value="Returnee">Returnee</option>
                    <option value="Dropped">Dropped</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">From Course/Program</label>
                <input type="text" name="from_program" class="w-full border p-2 rounded" value="{{ $profile?->course }}">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">To Course/Program (optional)</label>
                <input type="text" name="to_program" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Reason</label>
                <textarea name="reason_leaving" class="w-full border p-2 rounded"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Counselor Remarks</label>
                <textarea name="remark" class="w-full border p-2 rounded"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Date of Movement</label>
                <input type="date" name="transition_date" class="w-full border p-2 rounded" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
                <button type="button" @click="openTransitionModal = false" class="ml-2 text-gray-600">Cancel</button>
            </div>
        </form>
    </div>
</div>
