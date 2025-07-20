<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student History Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 20px;
        }

        h1, h2, h3 {
            color: #a82323;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .section-header {
            background-color: #a82323;
            color: white;
            padding: 6px 10px;
            margin-top: 30px;
            font-size: 16px;
        }

        .no-records {
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>

    <h2>Student History Report</h2>

    <table>
        <tr>
            <th>Student ID</th>
            <td>{{ $student->student_id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_name }}</td>
        </tr>
        <tr>
            <th>School Year</th>
            <td>{{ $schoolYear->school_year ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Semester</th>
            <td>{{ $semesterName }}</td>
        </tr>
        @if($profile)
        <tr>
            <th>Course / Year / Section</th>
            <td>{{ $profile->course }} / {{ $profile->year_level }} / {{ $profile->section }}</td>
        </tr>
        @endif
    </table>

    {{-- Contracts --}}
    @if($tab === 'all' || $tab === 'contracts')
        <div class="section-header">Contracts</div>
        @if($contracts->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>Days</th>
                        <th>End Date</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $contract)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($contract->contract_date)->format('M d, Y') }}</td>
                            <td>{{ $contract->contract_type }}</td>
                            <td>{{ $contract->status }}</td>
                            <td>{{ $contract->start_date }}</td>
                            <td>{{ $contract->total_days}}</td>
                            <td>{{ $contract->end_date }}</td>
                            <td>{{ $contract->remarks }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-records">No contract records available.</p>
        @endif
    @endif

    {{-- Referrals --}}
    @if($tab === 'all' || $tab === 'referrals')
        <div class="section-header">Referrals</div>
        @if($referrals->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Reason</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($referrals as $referral)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($referral->created_at)->format('M d, Y') }}</td>
                            <td>{{ $referral->reason }}</td>
                            <td>{{ $referral->remarks }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-records">No referral records available.</p>
        @endif
    @endif

    {{-- Counseling --}}
    @if($tab === 'all' || $tab === 'counseling')
        <div class="section-header">Counseling Sessions</div>
        @if($counselings->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($counselings as $counseling)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($counseling->created_at)->format('M d, Y') }}</td>
                            <td>{{ $counseling->status }}</td>
                            <td>{{ $counseling->remarks }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-records">No counseling records available.</p>
        @endif
    @endif

</body>
</html>
