<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Student Record for S.Y {{ $semesterRecord->school_year }} - {{ $semesterRecord->semester }}</h2>
    </x-slot>

    <div class="p-6 max-w-5xl mx-auto bg-white shadow rounded-lg border border-gray-300 mt-4">
        
        <h2 class="text-xl font-bold text-gray-800 mt-5 mb-4">Student Record for S.Y {{ $semesterRecord->schoolYear?->school_year ?? 'N/A' }} {{ $semesterRecord->semester }} Semester</h2>
   
        <!-- Profile Section -->
        <h3 class="text-lg font-bold text-red-700 mb-4 border-b pb-2">Profile Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-700">
            @forelse($student->profiles as $profile)
                <div class="flex flex-col bg-gray-50 p-4 rounded border shadow-sm">
                    <span class="font-semibold text-gray-600">Student</span>
                    <span class="font-bold text-red-800">{{ $profile->student->first_name }} {{ $profile->student->middle_name }} {{ $profile->student->last_name }}</span>
                </div>
                <div class="flex flex-col bg-gray-50 p-4 rounded border shadow-sm">
                    <span class="font-semibold text-gray-600">Student ID</span>
                    <span class="font-bold text-red-800">{{ $profile->student->student_id }} </span>
                </div>
                <div class="flex flex-col bg-gray-50 p-4 rounded border shadow-sm">
                    <span class="font-semibold text-gray-600">Course, year & Section</span>
                    <span class="font-bold text-red-800">{{ $profile->course }} - {{ $profile->year_level }} {{ $profile->section }}</span>
                </div>
            @empty
                <p class="text-gray-500 italic col-span-3">No profile data for this semester.</p>
            @endforelse
        </div>

        <!-- Contracts Section -->
        <h3 class="text-lg font-bold text-red-700 mt-6 mb-4 border-b pb-2">Contracts</h3>
        <div class=" rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="px-5 py-2">Contract Date</th>
                                    <th class="px-5 py-2 text-center">Contract Type</th>
                                    <th class="px-5 py-2 text-center">Total Days</th>
                                    <th class="px-5 py-2 text-center">Status</th>
                                    <th class="px-5 py-2 text-center">Due Date</th>
                                    <th class="px-5 py-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($student->contracts as $contract)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        <td class="px-5 py-2">{{ \Carbon\Carbon::parse($contract->contract_date)->format('M d, Y') }}</td>
                                        <td class="px-5 py-2 text-center">{{ $contract->contract_type ?? 'N/A' }}</td>
                                        <td class="px-5 py-2 text-center">{{ $contract->total_days ?? 'N/A' }}</td>
                                        <td class="px-5 py-2 text-center">
                                            @if($contract->status === 'Completed')
                                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Completed</span>
                                            @else
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">{{ $contract->status }}</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-2 text-center">{{ $contract->end_date ? \Carbon\Carbon::parse($contract->end_date)->format(' F jS, Y') : 'N/A' }}</td>
                                        <td class="px-5 py-2 text-center">
                                            <div x-data="{ openViewContractModal_{{ $contract->id }}: false }">
                                                <x-secondary-button @click="openMenu = false; openViewContractModal_{{ $contract->id }} = true">
                                                    View
                                                </x-secondary-button>
                                                @include('contracts.viewContract', ['contract' => $contract])
                                            </div>
                                            {{-- Optional: Future Edit/Delete buttons --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-gray-500">No contracts found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

        <!-- Referrals Section -->
        <h3 class="text-lg font-bold text-red-700 mt-6 mb-4 border-b pb-2">Referrals</h3>
        <div class=" rounded-lg border border-gray-200 shadow-md bg-white">
           <table class="w-full text-sm text-left text-gray-700">
                <thead style="background:#a82323; color:#fff;">
                    <tr>
                        <th class="px-5 py-2 text-center">Referral Date</th>
                        <th class="px-5 py-2 text-center">Reason for Referral</th>
                        <th class="px-5 py-2 text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($student->referrals as $referral)
                        <tr class="hover:bg-gray-100">
                            <td class="px-5 py-2 text-center">
                                {{ $referral->referral_date ? \Carbon\Carbon::parse($referral->referral_date)->format(' F jS, Y') : 'N/A' }}
                            </td>
                            <td class="px-5 py-2 text-center">{{ $referral->reason }}</td>
                            <td class="px-5 py-2 text-center">
                                <div x-data="{ openViewReferralModal_{{ $referral->id }}: false }">
                                    <x-secondary-button @click="openMenu = false; openViewReferralModal_{{ $referral->id }} = true">
                                        View
                                    </x-secondary-button>
                                    @include('referrals.view', ['referral' => $referral])
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500">No contracts found.</td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
        <!-- Counseling Section -->
        <h3 class="text-lg font-bold text-red-700 mt-6 mb-4 border-b pb-2">Counseling Records</h3>
        <div class=" rounded-lg border border-gray-200 shadow-md bg-white">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead style="background:#a82323; color:#fff;">
                    <tr class="items-center">
                    <th class="px-5 py-2 text-center"></th>
                    <th class="px-5 py-2 text-center">Counseling Date</th>
                    <th class="px-5 py-2 text-center"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($student->counselings as $counseling)
                    <tr>
                        <td class="px-5 py-2 text-center">Counseling Form</td>
                        <td class="px-5 py-2 text-center">{{ $counseling->counseling_date }}</td>
                        <!-- Inside your <tbody> foreach loop -->
                        <td class="px-5 py-2 text-center">
                            <div x-data="{ openViewCounselingModal_{{ $counseling->id }}: false }">
                                <x-secondary-button @click="openMenu = false; openViewCounselingModal_{{ $counseling->id }} = true"
                                       >
                                    View
                                </x-secondary-button>
                                @include('counselings.view', ['counseling' => $counseling])
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No contracts found.</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>

       
    </div>
</x-app-layout>
