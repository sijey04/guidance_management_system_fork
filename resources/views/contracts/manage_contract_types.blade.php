<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Manage Contract Types</h2>
    </x-slot>

    <div class="p-6">
        @if(session('success'))
            <div class="bg-green-100 p-3 rounded mb-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contract-types.store') }}" class="flex gap-2 mb-4">
            @csrf
            <input type="text" name="type" placeholder="New Contract Type" required class="border p-2 rounded w-1/3">
            <button type="submit" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">Add Type</button>
            <a href="{{ route('contracts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Contracts</a>
        </form>

        <table class="w-full border">
            <thead class="bg-gray-200">
                <tr><th class="p-2">Contract Type</th><th class="p-2">Actions</th></tr>
            </thead>
            <tbody>
                @foreach($contractTypes as $type)
                    <tr>
                        <td class="border p-2">{{ $type->type }}</td>
                        <td class="border p-2">
                            <form method="POST" action="{{ route('contract-types.destroy', $type->id) }}">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this type?')" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
