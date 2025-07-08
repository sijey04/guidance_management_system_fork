<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>
    

    <div class="">
        <div class="mb-4">
            <a href="{{ route('student.index') }}"
            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-sm font-semibold text-[#a82323] rounded hover:bg-gray-100 transition">
                ← Back to Student List
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="">
                <div class="p-6 space-y-6">
                    
                    <!-- Tabs -->
                    <div>
                        @include('layouts.view-tab')
                    </div>

                    <!-- Instruction Box -->
                    <div class="flex items-center justify-between bg-[#f8eaea] p-5 rounded border border-[#a82323]">
                        <div>
                            <h2 class="text-xl md:text-2xl font-bold text-[#a82323] mb-1">Referral History</h2>
                            <p class="text-sm text-gray-600">
                                These are the recorded referrals for 
                                <span class="font-semibold text-gray-800">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</span>.
                                You can view or manage each referral using the actions menu.
                            </p>
                        </div>
                    </div>

                    <!-- Referral Table -->
                    <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow">
                        <table class="min-w-full divide-y divide-gray-200 text-sm md:text-base">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="px-4 py-3 text-left">School Year</th>
                                    <th class="px-4 py-3 text-left">Semester</th>
                                    <th class="px-4 py-3 text-left">Referral Date</th>
                                    <th class="px-4 py-3 text-left">Reason</th>
                                    <th class="px-4 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($student->referrals as $referral)
                                    <tr class="hover:bg-[#fef2f2] transition">
                                        <td class="px-4 py-3">{{ $referral->semester?->schoolYear?->school_year ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $referral->semester?->semester ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $referral->referral_date ? \Carbon\Carbon::parse($referral->referral_date)->format('F j, Y') : 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $referral->reason }}</td>
                                        <td class="px-4 py-3 text-left">
                                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                                <button @click="open = !open"
                                                    class="text-gray-700 hover:text-gray-900 focus:outline-none">
                                                    ⋮
                                                </button>
                                                <div x-show="open" @click.away="open = false"
                                                    class="absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded shadow z-10">
                                                    <a href="{{ route('referrals.view', ['id' => $referral->id, 'source' => 'student']) }}"
                                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        View
                                                    </a>
                                                    <form action="{{ route('referrals.destroy', $referral->id) }}" method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete this referral record?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-gray-500 py-6">
                                            No referrals found for this student.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
