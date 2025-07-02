<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Student History: {{ $student->first_name }} {{ $student->last_name }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-6 space-y-8">
        <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline text-sm">← Back to Report</a>

        <div class="bg-white shadow p-6 rounded">
            <h3 class="text-lg font-bold mb-2">Contracts</h3>
            <table class="min-w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Start - End</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contracts as $contract)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $contract->contract_type }}</td>
                            <td class="px-4 py-2">{{ $contract->status }}</td>
                            <td class="px-4 py-2">{{ $contract->start_date }} - {{ $contract->end_date }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center py-3">No contracts found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white shadow p-6 rounded">
            <h3 class="text-lg font-bold mb-2">Referrals</h3>
            <table class="min-w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Reason</th>
                        <th class="px-4 py-2">Remarks</th>
                        <th class="px-4 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($referrals as $referral)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $referral->reason }}</td>
                            <td class="px-4 py-2">{{ $referral->remarks }}</td>
                            <td class="px-4 py-2">{{ $referral->referral_date }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center py-3">No referrals found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white shadow p-6 rounded">
            <h3 class="text-lg font-bold mb-2">Counseling</h3>
            <table class="min-w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($counselings as $counseling)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $counseling->counseling_date }}</td>
                            <td class="px-4 py-2">{{ $counseling->status }}</td>
                            <td class="px-4 py-2">{{ $counseling->remarks }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center py-3">No counseling records found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
