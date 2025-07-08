<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="" x-data="{ openAddModal: false, openViewModal: false, selectedCounseling: {} }">
        
        <div class="mb-4">
            <a href="{{ route('student.index') }}"
            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-sm font-semibold text-[#a82323] rounded hover:bg-gray-100 transition">
                ← Back to Student List
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="">
                <div class="p-6 space-y-6">

                    <!-- Tab Navigation -->
                    <div>
                        @include('layouts.view-tab')
                    </div>

                    <!-- Page Header -->
                    <div class="bg-[#f8eaea] p-5 rounded border border-[#a82323]">
                        <h2 class="text-xl md:text-2xl font-bold text-[#a82323] mb-1">Counseling Records</h2>
                        <p class="text-sm text-gray-600">
                            View, manage, and add counseling sessions for 
                            <span class="font-semibold text-gray-800">
                                {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}
                            </span>.
                        </p>
                    </div>

                    <!-- Add Button -->
                    {{-- <div class="flex justify-end">
                        <button @click="openAddModal = true"
                            class="bg-[#a82323] hover:bg-[#891a1a] text-white text-sm md:text-base font-semibold px-5 py-2 rounded-lg transition">
                            + New Counseling Record
                        </button>
                    </div> --}}

                    <!-- Counseling Table -->
                    <div class="overflow-x-auto border border-gray-200 rounded-lg shadow bg-white">
                        <table class="min-w-full divide-y divide-gray-200 text-sm md:text-base">
                            <thead class="bg-[#a82323] text-white">
                                <tr>
                                    <th class="px-5 py-3 text-left">Date</th>
                                    <th class="px-5 py-3 text-left">Status</th>
                                    <th class="px-5 py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-800">
                                @forelse($student->counselings as $counseling)
                                    <tr class="hover:bg-[#fef2f2] transition">
                                        <td class="px-5 py-3">
                                            {{ \Carbon\Carbon::parse($counseling->session_date)->format('F j, Y') }}
                                        </td>
                                        <td class="px-5 py-3">
                                            <span class="text-xs font-semibold px-2 py-1 rounded-full
                                                {{ $counseling->status === 'Completed' 
                                                    ? 'bg-green-100 text-green-700' 
                                                    : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $counseling->status }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-3 text-center">
                                            <a href="{{ route('counseling.view', ['id' => $counseling->id, 'source' => 'student']) }}"
                                               class="text-sm font-medium text-[#a82323] hover:underline">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-gray-400 py-6">
                                            No counseling records found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Note -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-4 text-sm text-yellow-700 rounded">
                        <p><strong>Note:</strong> Use the <span class="font-semibold">"+ New Counseling Record"</span> button to log a new session. Click "View" to see full session details.</p>
                    </div>

                    <!-- Modals -->
                    @include('student.createCounseling')
                    @include('student.viewCounseling')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
