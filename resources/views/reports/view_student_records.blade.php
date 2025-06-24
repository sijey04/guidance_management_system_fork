<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Student Record for S.Y {{ $semesterRecord->school_year }} - {{ $semesterRecord->semester }}</h2>
    </x-slot>

    <div class="p-6 max-w-5xl mx-auto bg-white shadow rounded-lg border border-gray-300 mt-4">
        
        <!-- Profile Section -->
        <h3 class="text-lg font-bold text-red-700 mb-4 border-b pb-2">Profile Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-700">
            @forelse($student->profiles as $profile)
                <div class="flex flex-col bg-gray-50 p-4 rounded border shadow-sm">
                    <span class="font-semibold text-gray-600">Course:</span>
                    <span class="text-gray-800">{{ $profile->course }}</span>
                </div>
                <div class="flex flex-col bg-gray-50 p-4 rounded border shadow-sm">
                    <span class="font-semibold text-gray-600">Year Level:</span>
                    <span class="text-gray-800">{{ $profile->year_level }}</span>
                </div>
                <div class="flex flex-col bg-gray-50 p-4 rounded border shadow-sm">
                    <span class="font-semibold text-gray-600">Section:</span>
                    <span class="text-gray-800">{{ $profile->section }}</span>
                </div>
            @empty
                <p class="text-gray-500 italic col-span-3">No profile data for this semester.</p>
            @endforelse
        </div>

        <!-- Contracts Section -->
        <h3 class="text-lg font-bold text-red-700 mt-6 mb-4 border-b pb-2">Contracts</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
            @forelse($student->contracts as $contract)
                <div class="flex flex-col bg-gray-50 p-4 rounded border shadow-sm">
                    <span class="font-semibold text-gray-600">Type:</span>
                    <span class="text-gray-800">{{ $contract->contract_type }}</span>
                    <span class="font-semibold text-gray-600 mt-2">Date:</span>
                    <span class="text-gray-800">{{ \Carbon\Carbon::parse($contract->contract_date)->format('F j, Y') }}</span>
                </div>
            @empty
                <p class="text-gray-500 italic col-span-2">No contracts for this semester.</p>
            @endforelse
        </div>

        <!-- Referrals Section -->
        <h3 class="text-lg font-bold text-red-700 mt-6 mb-4 border-b pb-2">Referrals</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
            @forelse($student->referrals as $referral)
                <div class="flex flex-col bg-gray-50 p-4 rounded border shadow-sm">
                    <span class="font-semibold text-gray-600">Reason:</span>
                    <span class="text-gray-800">{{ $referral->reason }}</span>
                    <span class="font-semibold text-gray-600 mt-2">Date:</span>
                    <span class="text-gray-800">{{ \Carbon\Carbon::parse($referral->referral_date)->format('F j, Y') }}</span>
                </div>
            @empty
                <p class="text-gray-500 italic col-span-2">No referrals for this semester.</p>
            @endforelse
        </div>

        <!-- Counseling Section -->
        <h3 class="text-lg font-bold text-red-700 mt-6 mb-4 border-b pb-2">Counseling Records</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
            @forelse($student->counselings as $counseling)
                <div class="flex flex-col bg-gray-50 p-4 rounded border shadow-sm">
                    <span class="font-semibold text-gray-600">Counseling Date:</span>
                    <span class="text-gray-800">{{ \Carbon\Carbon::parse($counseling->counseling_date)->format('F j, Y') }}</span>
                    <span class="font-semibold text-gray-600 mt-2">Remarks:</span>
                    <span class="text-gray-800">{{ $counseling->remarks ?? 'None' }}</span>
                </div>
            @empty
                <p class="text-gray-500 italic col-span-2">No counseling records for this semester.</p>
            @endforelse
        </div>

        <!-- Back Button -->
        <div class="mt-6 text-center">
            <a href="{{ url()->previous() }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">Back</a>
        </div>
    </div>
</x-app-layout>
