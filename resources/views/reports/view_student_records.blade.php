<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Student Record for S.Y {{ $semesterRecord->school_year }} - {{ $semesterRecord->semester }}</h2>
    </x-slot>

    <div class="p-4">
        <h3 class="text-lg font-semibold mb-2">Profile</h3>
        @forelse($student->profiles as $profile)
            <p><strong>Course:</strong> {{ $profile->course }}</p>
            <p><strong>Year Level:</strong> {{ $profile->year_level }}</p>
            <p><strong>Section:</strong> {{ $profile->section }}</p>
        @empty
            <p>No profile for this semester.</p>
        @endforelse

        <h3 class="text-lg font-semibold mt-4 mb-2">Contracts</h3>
        @forelse($student->contracts as $contract)
            <p>Type: {{ $contract->contract_type }} | Date: {{ $contract->contract_date }}</p>
        @empty
            <p>No contracts for this semester.</p>
        @endforelse

        <h3 class="text-lg font-semibold mt-4 mb-2">Referrals</h3>
        @forelse($student->referrals as $referral)
            <p>Reason: {{ $referral->reason }} | Date: {{ $referral->referral_date }}</p>
        @empty
            <p>No referrals for this semester.</p>
        @endforelse

        <h3 class="text-lg font-semibold mt-4 mb-2">Counselings</h3>
        @forelse($student->counselings as $counseling)
            <p>Date: {{ $counseling->counseling_date }} | Remarks: {{ $counseling->remarks ?? 'None' }}</p>
        @empty
            <p>No counseling records for this semester.</p>
        @endforelse
    </div>
</x-app-layout>
