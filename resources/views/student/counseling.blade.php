<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-5" x-data="{ openAddModal: false, openViewModal: false, selectedCounseling: {} }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="main-content">
                <div class="p-6 space-y-4">
                    <div>
                        @include('layouts.view-tab')
                    </div>
                    <!-- Page Description Box -->

                    <div class="bg-[#f8eaea] p-5 rounded border border-[#a82323]">
                        <h2 class="text-xl font-semibold" style="color:#a82323;">Counseling Records</h2>
                        <p class="text-sm text-gray-500">
                            Below are the counseling records for 
                            <span class="font-semibold">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</span>. 
                            You may view details or add new counseling records.
                        </p>
                    </div>
                    <!-- Add Counseling Button -->
                    <div class="flex justify-end">
                        <button @click="openAddModal = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">+ New Counseling Record</button>

                    </div>
                    <!-- Counseling Records Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="px-5 py-3">Date</th>
                                    <th class="px-5 py-3">Status</th>
                                    <th class="px-5 py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($student->counselings as $counseling)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        <td class="px-5 py-4">{{ \Carbon\Carbon::parse($counseling->session_date)->format('M d, Y') }}</td>
                                        <td class="px-4 py-3">
                                            <span class="text-xs px-2 py-1 rounded-full font-semibold
                                                {{ $counseling->status === 'Completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                                {{ $counseling->status }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 text-center">
                                             <a href="{{ route('counseling.view', ['id' => $counseling->id, 'source' => 'student']) }}">View</a>             
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-gray-400">No counseling records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Note Section -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-4 text-sm text-yellow-700 rounded">
                        <p><strong>Note:</strong> To add a new counseling record, click the "+ New Counseling Record" button. To view full details of a counseling session, click "View."</p>
                    </div>
                    <!-- Modals -->
                    @include('student.createCounseling')
                    @include('student.viewCounseling')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
