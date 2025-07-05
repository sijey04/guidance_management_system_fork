<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Manage Contract Types') }}
        </h2>
    </x-slot>

    <div class="mb-4">
            <a href="{{ route('contracts.index') }}"
            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-sm font-semibold text-[#a82323] rounded hover:bg-gray-100 transition">
                ← Back to Contracts List
            </a>
        </div>
    <div class="py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">

                <!-- Flash Message -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Instruction Card -->
                <div class="bg-[#f8eaea] border border-[#a82323] p-5 rounded">
                    <h3 class="text-lg font-bold text-[#a82323] mb-1">Instructions</h3>
                    <p class="text-sm text-gray-600">
                        You can add a new contract type using the input below. Contract types help categorize the types of behavioral or academic agreements created for students.
                    </p>
                </div>

                <!-- Add New Contract Type Form -->
                <form method="POST" action="{{ route('contract-types.store') }}" class="flex flex-wrap gap-4 items-end">
                    @csrf
                    <div class="flex-1 min-w-[250px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">New Contract Type:</label>
                        <input type="text" name="type" placeholder="e.g., Counseling Contract" required
                               class="w-full border border-gray-300 rounded px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-[#a82323]">
                    </div>
                    <div class="flex gap-2">
                        <button type="submit"
                                class="bg-[#a82323] text-white px-5 py-2 rounded font-semibold text-sm hover:bg-red-700 transition">
                            Add Type
                        </button>
                        
                    </div>
                </form>

                <!-- Contract Types Table -->
                <div class="overflow-x-auto border rounded-lg shadow bg-white">
                    <table class="w-full divide-y divide-gray-200 text-sm">
                        <thead style="background:#a82323; color:white;">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold">Contract Type</th>
                                <th class="px-4 py-3 text-left font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($contractTypes as $type)
                                <tr class="hover:bg-[#fef2f2] transition">
                                    <td class="px-4 py-3">{{ $type->type }}</td>
                                    <td class="px-4 py-3">
                                        <form method="POST" action="{{ route('contract-types.destroy', $type->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this contract type?')"
                                                    class="text-red-600 hover:underline text-sm font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-4 text-gray-500">
                                        No contract types added yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
