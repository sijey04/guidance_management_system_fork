<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="main-content">
                <div class="p-6 space-y-4">
                    <div>
                        @include('layouts.view-tab')
                    </div>
                    <!-- Page Description Box -->
                    <div class="flex items-center justify-between bg-[#f8eaea] p-5 rounded border border-[#a82323]">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-semibold" style="color:#a82323;">Contract History</h2>
                            <p class="text-sm text-gray-500">
                                Below is the Referral history for 
                                <span class="font-semibold">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</span>. 
                                You can review past referrals.
                            </p>
                        </div>
                         <!-- Add Contract Button -->
                        {{-- <div class="flex items-center justify-end">
                            <div x-data="{ open: false }">
                                <button @click="open = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">New Contract</button>
                                @include('student.createContract')
                            </div>
                        </div> --}}
                    </div>
                    <!-- Contract Records Table -->
                    <div class=" rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="px-4 py-2">A.Y</th>
                                     <th class="px-4 py-2">Semester</th>
                                    <th class="px-4 py-2">Referral Date</th>
                                    <th class="px-4 py-2">Reason</th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($student->referrals as $referral)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                       <td class="px-3 py-2">{{ $referral->semester?->schoolYear?->school_year ?? 'N/A' }}</td>
                                       <td> {{ $referral->semester?->semester ?? 'N/A' }} Semester</td>
                                       <td class="px-4 py-2">{{ $referral->reason }}</td>
                                        <td class="px-4 py-2">
                                            {{ $referral->referral_date ? \Carbon\Carbon::parse($referral->referral_date)->format(' F jS, Y') : 'N/A' }}
                                        </td>
                                        <td class="px-4 py-2">
                                <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open">⋮</button>
                                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-32 bg-white shadow rounded z-10">
                                        <a href="{{ route('referrals.view', ['id' => $referral->id, 'source' => 'student']) }}">View</a>             
                                        
                                    <form action="{{ route('referrals.destroy', $referral->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this counseling record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                            Delete
                                        </button>
                                    </form>
                                    </div>
                                </div>
                            </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-gray-500">No Referralsfound.</td>
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
