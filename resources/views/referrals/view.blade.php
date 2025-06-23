<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">View Referral Details</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow mt-4">
        <h3 class="text-lg font-semibold mb-4">Referral Information</h3>

        <div class="space-y-2">
            <p><strong>Student ID:</strong> {{ $referral->student->student_id }}</p>
            <p><strong>Name:</strong> {{ $referral->student->first_name }} {{ $referral->student->last_name }}</p>
            <p><strong>Reason:</strong> {{ $referral->reason }}</p>
            <p><strong>Remarks:</strong> {{ $referral->remarks ?? 'N/A' }}</p>
            <p><strong>Date of Referral:</strong> {{ $referral->referral_date }}</p>

            @php
                $profile = $referral->student->profiles
                            ->where('semester_id', \App\Models\Semester::where('is_current', true)->first()?->id)
                            ->first();
            @endphp

            <p><strong>Course:</strong> {{ $profile?->course ?? 'N/A' }}</p>
            <p><strong>Year Level:</strong> {{ $profile?->year_level ?? 'N/A' }}</p>
            <p><strong>Section:</strong> {{ $profile?->section ?? 'N/A' }}</p>

            @if($referral->image_path)
                <p><strong>Attachment:</strong></p>
                <img src="{{ asset('storage/'.$referral->image_path) }}" alt="Attachment" class="w-48 border rounded">
            @endif
        </div>

        <a href="{{ route('referrals.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded">Back to List</a>
    </div>
</x-app-layout>
