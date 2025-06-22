<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Referral</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow mt-4">
        <form method="POST" action="{{ route('referrals.update', $referral->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Reason for Referral</label>
                <select name="reason" required class="w-full border p-2 rounded">
                    <option value="">Select Reason</option>
                    @foreach($reasons as $reason)
                        <option value="{{ $reason->reason }}" {{ $referral->reason == $reason->reason ? 'selected' : '' }}>
                            {{ $reason->reason }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Remarks</label>
                <textarea name="remarks" rows="3" class="w-full border p-2 rounded">{{ old('remarks', $referral->remarks) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Date of Referral</label>
                <input type="date" name="referral_date" value="{{ old('referral_date', $referral->referral_date) }}" required class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Update Attachment (Optional)</label>
                <input type="file" name="image_path" class="w-full border p-2 rounded">
                @if($referral->image_path)
                    <p class="mt-2">Current Attachment:</p>
                    <img src="{{ asset('storage/'.$referral->image_path) }}" alt="Attachment" class="w-48 border rounded">
                @endif
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('referrals.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update Referral</button>
            </div>
        </form>
    </div>
</x-app-layout>
