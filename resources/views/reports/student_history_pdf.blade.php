<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student History Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #333;
            margin: 25px;
        }

        h2 {
            font-size: 18px;
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .section-title {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px 15px;
            font-weight: bold;
            font-size: 13px;
            border-radius: 4px;
            margin: 40px 0 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f4f6f8;
            font-weight: bold;
            color: #2c3e50;
        }

        tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        .info-table th {
            width: 35%;
            background-color: #f8f8f8;
        }

        .no-records {
            font-style: italic;
            color: #888;
            padding: 5px 0;
        }

    </style>
</head>
<body>

    <h2>Student History Report</h2>

    <table class="info-table">
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
        <div class="section-title">Contracts</div>
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
                            <td>{{ $contract->total_days }}</td>
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
        <div class="section-title">Referrals</div>
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
        <div class="section-title">Counseling Sessions</div>
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
