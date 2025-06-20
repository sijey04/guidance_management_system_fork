<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            Records for {{ $student->first_name }} {{ $student->last_name }} - {{ $semester->school_year }} {{ $semester->semester }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Contracts -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Contracts</h3>
            @forelse($contracts as $contract)
                <p>Date: {{ $contract->contract_date }} | Status: {{ $contract->status }}</p>
            @empty
                <p class="text-gray-500">No contracts for this semester.</p>
            @endforelse
        </div>

        {{-- <!-- Counseling Records -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Counseling Records</h3>
            @forelse($counselings as $counseling)
                <p>Date: {{ $counseling->session_date }} | Problem: {{ $counseling->statement_of_problem }}</p>
            @empty
                <p class="text-gray-500">No counseling records for this semester.</p>
            @endforelse
        </div>

        <!-- Referrals -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Referral Forms</h3>
            @forelse($referrals as $referral)
                <p>Referred by: {{ $referral->referred_by }} | Reason: {{ $referral->reason }}</p>
            @empty
                <p class="text-gray-500">No referral forms for this semester.</p>
            @endforelse
        </div> --}}

    </div>
</x-app-layout>
