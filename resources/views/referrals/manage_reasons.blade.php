<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Referral Reasons') }}
        </h2>
        <p class="text-sm text-gray-500 mt-1">
            Add, view, or remove referral reasons used in student guidance referrals.
        </p>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div>
            <a href="{{ route('referrals.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-sm font-semibold text-[#a82323] rounded hover:bg-gray-100 transition">
                ← Back to Referral List
            </a>
        </div>

        {{-- Add Reason Form --}}
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 mb-6 mt-3">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-100 mb-2">Add a New Referral Reason</h3>
            <form action="{{ route('referral-reasons.store') }}" method="POST" class="flex flex-col sm:flex-row gap-4 sm:items-center">
                @csrf
                <input 
                    type="text" 
                    name="reason" 
                    placeholder="e.g., Behavioral Issues" 
                    required
                    class="w-full sm:w-1/2 border border-gray-300 dark:border-gray-600 p-2 rounded-md focus:outline-none focus:ring focus:ring-red-500"
                >
                <button 
                    type="submit" 
                    class="bg-[#a82323] text-white font-semibold px-5 py-2 rounded-md hover:bg-red-700 transition"
                >
                    Add Reason
                </button>
            </form>
            <p class="text-sm text-gray-500 mt-2">
                Make sure the reason is clearly defined and appropriate for referral documentation.
            </p>
        </div>

        {{-- Reason Table --}}
        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-sm rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
                <thead class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Referral Reason</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reasons as $reason)
                        <tr class="border-t dark:border-gray-700">
                            <td class="px-4 py-3">{{ $reason->id }}</td>
                            <td class="px-4 py-3">{{ $reason->reason }}</td>
                            <td class="px-4 py-3">
                                <form 
                                    action="{{ route('referral-reasons.destroy', $reason->id) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Are you sure you want to delete this reason?')"
                                >
                                    @csrf @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="bg-[#a82323] text-white px-4 py-2 rounded-md font-semibold hover:bg-red-700 transition"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                No referral reasons found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
