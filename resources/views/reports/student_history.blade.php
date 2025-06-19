<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">Student History</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6">

            {{-- Back to Reports --}}
            <a href="{{ route('reports.report') }}" class="text-blue-600 hover:underline mb-4 inline-block">
                &larr; Back to Reports
            </a>

            {{-- Student Info --}}
            <div class="mb-6">
                <h3 class="text-lg font-semibold">Student: {{ $student->first_name }} {{ $student->last_name }}</h3>
                <p><strong>ID:</strong> {{ $student->student_id }}</p>
            </div>

            {{-- Enrollment & Profile History --}}
            <h4 class="font-semibold text-gray-700 mb-3">Enrollment & Profile Records</h4>
            <table class="w-full table-auto mb-6">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">School Year</th>
                        <th class="px-4 py-2">Semester</th>
                        <th class="px-4 py-2">Course & Year</th>
                        <th class="px-4 py-2">Section</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student->profiles as $profile)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $profile->semester->school_year ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $profile->semester->semester ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $profile->course_year ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $profile->section ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Contract Records --}}
            <h4 class="font-semibold text-gray-700 mb-3">Contract Records</h4>
            <table class="w-full table-auto mb-6">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">School Year</th>
                        <th class="px-4 py-2">Semester</th>
                        <th class="px-4 py-2">Contract Type</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student->contracts as $contract)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $contract->semester->school_year ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $contract->semester->semester ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $contract->contract_type ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $contract->status ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Referral Records
            <h4 class="font-semibold text-gray-700 mb-3">Referral Records</h4>
            <table class="w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">School Year</th>
                        <th class="px-4 py-2">Semester</th>
                        <th class="px-4 py-2">Referral Type</th>
                        <th class="px-4 py-2">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($student->referrals as $referral)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $referral->semester->school_year ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $referral->semester->semester ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $referral->referral_type ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $referral->remarks ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">No referral records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table> --}}

        </div>
    </div>
</x-app-layout>
