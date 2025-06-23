<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Manage Referral Reasons</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-4">
        <form action="{{ route('referral-reasons.store') }}" method="POST" class="mb-4">
            @csrf
            <input type="text" name="reason" placeholder="New Reason" required class="border p-2 rounded">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Add Reason</button>
        </form>

        <table class="w-full border-collapse border mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th>ID</th>
                    <th>Reason</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reasons as $reason)
                    <tr class="border-t">
                        <td>{{ $reason->id }}</td>
                        <td>{{ $reason->reason }}</td>
                        <td>
                            <form action="{{ route('referral-reasons.destroy', $reason->id) }}" method="POST" onsubmit="return confirm('Delete this reason?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
