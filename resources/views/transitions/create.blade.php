<!-- transitions/create.blade.php -->
<div x-show="openModal" @keydown.escape.window="openModal = false"
     x-cloak
     class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div @click.away="openModal = false"
         class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-6 overflow-y-auto max-h-[90vh]">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Add Student Movement</h2>

        <form action="{{ route('transitions.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm">Last Name</label>
                    <input type="text" name="last_name" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block text-sm">First Name</label>
                    <input type="text" name="first_name" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block text-sm">Middle Name</label>
                    <input type="text" name="middle_name" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm">Type of Movement</label>
                    <select name="transition_type" class="w-full border rounded p-2" required>
                        <option value="">-- Select --</option>
                        <option value="Shiftee">Shiftee</option>
                        <option value="Transferee">Transferee</option>
                        <option value="Returnee">Returnee</option>
                        <option value="Dropped">Dropped</option>
                        <option value="Stopped">Stopped</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm">From Course/School</label>
                    <input type="text" name="from_program" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm">To Course/School</label>
                    <input type="text" name="to_program" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm">Reason for Leaving</label>
                    <textarea name="reason_leaving" class="w-full border rounded p-2"></textarea>
                </div>
                <div>
                    <label class="block text-sm">Reason for Entering</label>
                    <textarea name="reason_returning" class="w-full border rounded p-2"></textarea>
                </div>
                <div>
                    <label class="block text-sm">Leave/Drop Reason (if applicable)</label>
                    <textarea name="leave_reason" class="w-full border rounded p-2"></textarea>
                </div>
                <div>
                    <label class="block text-sm">Counselor Notes</label>
                    <textarea name="remark" class="w-full border rounded p-2"></textarea>
                </div>
                <div>
                    <label class="block text-sm">Movement Date</label>
                    <input type="date" name="transition_date" class="w-full border rounded p-2" required>
                </div>
                <div class="mt-4 text-right">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                    <button type="button" @click="openModal = false" class="ml-2 text-gray-500 hover:underline">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
