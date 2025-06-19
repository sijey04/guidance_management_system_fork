<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contracts') }}
        </h2>
    </x-slot>

    <div class="" style="padding-top:0;">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="main-content" style="margin-top: 16px; margin-bottom: 24px; padding-top: 18px;">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-2" style="color:#a82323;">All Contracts</h1>
                    <!-- Filter & Search Section -->
                    <div class="flex flex-wrap items-end gap-4 mb-6">
                        <form method="GET" action="{{ route('contracts.index') }}" class="flex gap-3 items-end">
                            <div>
                                <label class="block text-sm mb-1 text-gray-700">Sort By:</label>
                                <select name="sort_by" class="border-gray-300 rounded-lg px-3 py-2 text-sm">
                                    <option value="">Sort By</option>
                                    <option value="contract_date" {{ request('sort_by') == 'contract_date' ? 'selected' : '' }}>Contract Date</option>
                                    <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                                    <option value="total_days" {{ request('sort_by') == 'total_days' ? 'selected' : '' }}>Total Days</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm mb-1 text-gray-700"> </label>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by ID or Name" class="border-gray-300 rounded-lg px-3 py-2 text-sm w-80" />
                            </div>
                        </form>
                        <!-- Create Contract Button -->
                        <div x-data="{ openCreateContractModal: {{ $errors->any() ? 'true' : 'false' }} }">
                            <button @click="openCreateContractModal = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">Create Contract</button>
                            @include('contracts.createContract')
                        </div>
                    </div>
                    <!-- Contracts Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="w-full border text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="px-5 py-3">ID</th>
                                    <th class="px-5 py-3">Student</th>
                                    <th class="px-5 py-3">Status</th>
                                    <th class="px-5 py-3">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contracts as $contract)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        <td class="px-6 py-4">{{ $contract->student->student_id }}</td>
                                        <td class="px-6 py-4">{{ $contract->student->first_name }} {{ $contract->student->last_name }}</td>
                                        <td class="px-6 py-4">{{ $contract->status }}</td>
                                        <td class="px-6 py-4">{{ $contract->contract_date }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('contracts.view', $contract->id) }}" 
                                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                                            View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="mt-2 flex justify-center">
                        {{ $contracts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






