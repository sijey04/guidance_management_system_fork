<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Contract Types') }}
        </h2>
        <p class="text-sm text-gray-500 mt-1">
            Define and manage different categories of student contracts such as Academic, Behavioral, or Disciplinary contracts.
        </p>
    </x-slot>

    <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Back Button -->
        <div>
            <a href="{{ route('contracts.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-sm font-semibold text-[#a82323] rounded hover:bg-gray-100 transition">
                ← Back to Contracts List
            </a>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Contract Type Form -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-100 mb-2">Add a New Contract Type</h3>
            <form method="POST" action="{{ route('contract-types.store') }}" class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-end">
                @csrf
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Contract Type Name
                    </label>
                    <input 
                        type="text" 
                        id="type" 
                        name="type" 
                        required
                        class="w-full border border-gray-300 rounded-md px-4 py-2"
                        placeholder="e.g. Academic Probation"
                    >
                </div>

                <div class="flex flex-col gap-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="requires_total_days" class="mr-2 text-[#a82323]">
                        Requires Total Days
                    </label>

                    <label class="inline-flex items-center">
                        <input type="checkbox" name="requires_start_date" class="mr-2 text-[#a82323]">
                        Requires Start Date
                    </label>
                </div>

                <div>
                    <button type="submit" class="bg-[#a82323] text-white px-5 py-2 rounded-md hover:bg-red-700">
                        Add Type
                    </button>
                </div>
            </form>

            <p class="text-sm text-gray-500 mt-2">
                Be specific and concise when naming contract types to maintain clarity across all student records.
            </p>
        </div>

        <!-- Contract Types Table -->
        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-sm rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
                <thead class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
                    <tr>
                        <th class="px-4 py-3">Contract Type</th>
                        <th class="px-4 py-3 text-center">Requires Total Days</th>
                        <th class="px-4 py-3 text-center">Requires Start Date</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($contractTypes as $type)
                        <tr class="hover:bg-[#fef2f2] dark:hover:bg-gray-700 transition">
                            <td class="px-4 py-3">{{ $type->type }}</td>

                            <!-- Update Form for Checkboxes -->
                            <form method="POST" action="{{ route('contract-types.update', $type->id) }}">
                                @csrf
                                @method('PUT')

                                <td class="px-4 py-3 text-center">
                                    <input type="checkbox" name="requires_total_days" {{ $type->requires_total_days ? 'checked' : '' }}>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <input type="checkbox" name="requires_start_date" {{ $type->requires_start_date ? 'checked' : '' }}>
                                </td>

                                <td class="px-4 py-3 text-center flex gap-3 justify-center">
                                    <button type="submit" class="text-green-600 hover:underline text-sm font-medium">
                                        Save
                                    </button>
                            </form>

                                    <form method="POST" action="{{ route('contract-types.destroy', $type->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit"
                                            onclick="return confirm('Are you sure you want to delete this contract type?')"
                                            class="text-red-600 hover:underline text-sm font-medium"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                No contract types added yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
