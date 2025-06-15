<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contracts') }}
        </h2>
    </x-slot>

                    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     
                   <h1 class="text-2xl font-bold mb-4">All Contracts</h1>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 p-3">
                        <div class="flex justify-between content-center">
                            <form method="GET" action="{{ route('contracts.index') }}" x-data class="flex gap-3 mb-4">

                                <!-- Sort By -->
                                <select name="sort_by" class="border-gray-300 rounded p-2 text-sm"
                                    @change="$root.submit()">
                                    <option value="">Sort By</option>
                                    <option value="contract_date" {{ request('sort_by') == 'contract_date' ? 'selected' : '' }}>Contract Date</option>
                                    <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                                    <option value="total_days" {{ request('sort_by') == 'total_days' ? 'selected' : '' }}>Total Days</option>
                                </select>

                                    <!-- Search Input -->
                                    <x-text-input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Search by ID or Name"
                                        class="border-gray-300 rounded p-2 text-sm w-80"
                                        @input.debounce.500ms="$root.submit()" />
                        </form>
                                <div x-data="{ openCreateContractModal: {{ $errors->any() ? 'true' : 'false' }} }" class="py-1">
                                    <!-- Create Contract Button -->
                                    <x-secondary-button @click="openCreateContractModal = true" >
                                        Create Contract
                                   </x-secondary-button>
                                    <!-- Include the modal -->
                                    @include('contracts.createContract')
                                </div>

                        </div>
                        
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-white bg-gray-600 dark:bg-gray-500 ">
                                <tr>
                                    <th scope="col" class="px-5 py-3">ID</th>
                                    <th scope="col" class="px-5 py-3">Student</th>
                                    <th scope="col" class="px-5 py-3">Status</th>
                                    <th scope="col" class="px-5 py-3">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contracts as $contract)
                                    <tr>
                                        <td class="px-6 py-4">{{ $contract->student->student_id }}</td>
                                        <td class="px-6 py-4">{{ $contract->student->first_name }} {{ $contract->student->last_name }}</td>
                                        <td class="px-6 py-4">{{ $contract->status }}</td>
                                        <td class="px-6 py-4">{{ $contract->contract_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

    <div class="mt-4">
        {{ $contracts->links() }}
    </div>

                
            </div>
        </div>
    </div>
</x-app-layout>






