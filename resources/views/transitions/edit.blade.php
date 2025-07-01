<!-- transitions/edit.blade.php -->
<div x-show="openEditModal" @keydown.escape.window="openEditModal = false"
     x-cloak
     class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div @click.away="openEditModal = false"
         class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-6 overflow-y-auto max-h-[90vh]">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Student Movement</h2>

        <form action="{{ route('transitions.update', $transition) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm">Last Name</label>
                    <input type="text" name="last_name" class="w-full border rounded p-2" value="{{ $transition->last_name }}" required>
                </div>
                <div>
                    <label class="block text-sm">First Name</label>
                    <input type="text" name="first_name" class="w-full border rounded p-2" value="{{ $transition->first_name }}" required>
                </div>
                <div>
                    <label class="block text-sm">Middle Name</label>
                    <input type="text" name="middle_name" class="w-full border rounded p-2" value="{{ $transition->middle_name }}">
                </div>
                <div>
                    <label class="block text-sm">Type of Movement</label>
                    <select name="transition_type" class="w-full border rounded p-2" required>
                        @foreach(['Shiftee','Transferee','Returnee','Dropped','Stopped'] as $type)
                            <option value="{{ $type }}" {{ $transition->transition_type === $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm">From Course/School</label>
                    <input type="text" name="from_program" class="w-full border rounded p-2" value="{{ $transition->from_program }}">
                </div>
                <div>
                    <label class="block text-sm">To Course/School</label>
                    <input type="text" name="to_program" class="w-full border rounded p-2" value="{{ $transition->to_program }}">
                </div>
                <div>
                    <label class="block text-sm">Reason for Leaving</label>
                    <textarea name="reason_leaving" class="w-full border rounded p-2">{{ $transition->reason_leaving }}</textarea>
                </div>
                <div>
                    <label class="block text-sm">Reason for Entering</label>
                    <textarea name="reason_returning" class="w-full border rounded p-2">{{ $transition->reason_returning }}</textarea>
                </div>
                <div>
                    <label class="block text-sm">Leave/Drop Reason</label>
                    <textarea name="leave_reason" class="w-full border rounded p-2">{{ $transition->leave_reason }}</textarea>
                </div>
                <div>
                    <label class="block text-sm">Counselor Notes</label>
                    <textarea name="remark" class="w-full border rounded p-2">{{ $transition->remark }}</textarea>
                </div>
                <div>
                    <label class="block text-sm">Movement Date</label>
                    <input type="date" name="transition_date" class="w-full border rounded p-2" value="{{ $transition->transition_date }}" required>
                </div>

                <div class="mt-4 text-right">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update Record</button>
                    <button type="button" @click="openEditModal = false" class="ml-2 text-gray-500 hover:underline">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
