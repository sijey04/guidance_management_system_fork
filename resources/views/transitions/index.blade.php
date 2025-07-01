<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Student Movement Records</h2>
    </x-slot>

    <div class="px-4 py-6 max-w-7xl mx-auto" x-data="{ openModal: false }">

        <div class="mb-4">
            <button @click="openModal = true"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Add Student
            </button>
        </div>

        @include('transitions.create')

        <div class="bg-white p-4 rounded shadow">
            @if(session('success'))
                <div class="text-green-700 font-medium mb-2">{{ session('success') }}</div>
            @endif

            <table class="w-full text-sm text-left border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Name</th>
                        <th class="p-2">Type</th>
                        <th class="p-2">Date</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transitions as $transition)
                        <tr class="border-t">
                            <td class="p-2">{{ $transition->last_name }}, {{ $transition->first_name }}</td>
                            <td class="p-2">{{ $transition->transition_type }}</td>
                            <td class="p-2">{{ \Carbon\Carbon::parse($transition->transition_date)->format('M d, Y') }}</td>
                            <td class="p-2">
                                <a href="{{ route('transitions.show', $transition) }}" class="text-blue-600 hover:underline text-sm">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">No movement records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $transitions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
