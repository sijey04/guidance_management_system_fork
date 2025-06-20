<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            {{ $student->first_name }} {{ $student->last_name }} - {{ $semester->school_year }} {{ $semester->semester }} Records
        </h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        <h3 class="font-semibold text-lg">Contracts</h3>
        @forelse($contracts as $contract)
            <p>Contract Date: {{ $contract->contract_date }}</p>
            <p>Status: {{ $contract->status }}</p>
            <hr class="my-2">
        @empty
            <p>No Contracts for this semester.</p>
        @endforelse

        {{-- <h3 class="font-semibold text-lg mt-4">Counseling Records</h3>
        @forelse($counselings as $counseling)
            <p>Date: {{ $counseling->session_date }}</p>
            <p>Problem: {{ $counseling->statement_of_problem }}</p>
            <hr class="my-2">
        @empty
            <p>No Counseling Records for this semester.</p>
        @endforelse

        <h3 class="font-semibold text-lg mt-4">Referrals</h3>
        @forelse($referrals as $referral)
            <p>Referred By: {{ $referral->referred_by }}</p>
            <p>Reason: {{ $referral->reason }}</p>
            <hr class="my-2">
        @empty
            <p>No Referral Records for this semester.</p>
        @endforelse --}}
    </div>
</x-app-layout>
