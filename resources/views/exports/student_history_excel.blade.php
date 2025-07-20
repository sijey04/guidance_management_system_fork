<table>
    <thead>
        <tr>
            <th colspan="6">Student History Report</th>
        </tr>
        <tr>
            <td colspan="6"><strong>Name:</strong> {{ $student->last_name ?? 'N/A' }}, {{ $student->first_name ?? 'N/A' }}{{ $student->middle_name  }}. {{ $student->suffix }}</td>
        </tr>
        <tr>
            <td colspan="6"><strong>Student ID:</strong> {{ $student->student_id }}</td>
        </tr>
        <tr>
            <td colspan="6"><strong>School Year:</strong> {{ $schoolYear?->school_year }}</td>
        </tr>
        <tr>
            <td colspan="6"><strong>Semester:</strong> {{ $semesterName }}</td>
        </tr>
    </thead>
</table>

<br><br>

@if (($selectedTab === 'contracts' || $selectedTab === 'all') && $contracts->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th colspan="5">Contracts</th>
            </tr>
            <tr>
                <th>Type</th>
                <th>Status</th>
                <th>Contract Date</th>
                <th>Start Date</th>
                <th>Total Days</th>
                <th>End Date</th>
                <th>Remarks</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
                <tr>
                    <td>{{ $contract->contract_type }}</td>
                    <td>{{ $contract->status }}</td>
                    <td>{{ $contract->contract_date }}</td>
                    <td>{{ $contract->start_date }}</td>
                    <td>{{ $contract->total_days }}</td>
                    <td>{{ $contract->end_date}}</td>
                    <td>{{ $contract->remarks }}</td>
                    <td>{{ $contract->semester->semester ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
@endif

@if (($selectedTab === 'referrals' || $selectedTab === 'all') && $referrals->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th colspan="4">Referrals</th>
            </tr>
            <tr>
                <th>Reason</th>
                <th>Date</th>
                <th>Remarks</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($referrals as $referral)
                <tr>
                    <td>{{ $referral->reason }}</td>
                    <td>{{ $referral->referral_date}}</td>
                    <td>{{ $referral->remarks }}</td>
                    <td>{{ $referral->semester->semester ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
@endif

@if (($selectedTab === 'counselings' || $selectedTab === 'all') && $counselings->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th colspan="4">Counseling Records</th>
            </tr>
            <tr>
                <th>Status</th>
                <th>Date</th>
                <th>Remarks</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($counselings as $counseling)
                <tr>
                    <td>{{ $counseling->status }}</td>
                    <td>{{ $counseling->referral_date }}</td>
                    <td>{{ $counseling->remarks }}</td>
                    <td>{{ $counseling->semester->semester ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
