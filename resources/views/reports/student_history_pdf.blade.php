<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student History Export</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1, h2, h3 { margin-bottom: 5px; }
    </style>
</head>
<body>
    <h1>Student History</h1>
    <h2>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffix }}</h2>
    <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
    <p><strong>School Year:</strong> {{ $schoolYear->school_year }}</p>
    <p><strong>Semester:</strong> {{ $semesterName }}</p>

    <h3>Profile</h3>
    <p><strong>Course/Year/Section:</strong> {{ $profile?->course }} - {{ $profile?->year_level }}{{ $profile?->section }}</p>
    <p><strong>Birthday:</strong> {{ $student->birthday?->format('F j, Y') }}</p>
    <p><strong>Gender:</strong> {{ $student->gender }}</p>

    <h3>Contracts</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Status</th>
                <th>Start</th>
                <th>End</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contracts as $contract)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($contract->contract_date)->format('F j, Y') }}</td>
                    <td>{{ $contract->contract_type }}</td>
                    <td>{{ $contract->status }}</td>
                    <td>{{ $contract->start_date }}</td>
                    <td>{{ $contract->end_date }}</td>
                </tr>
            @empty
                <tr><td colspan="5">No contracts found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <h3>Referrals</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Reason</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($referrals as $referral)
                <tr>
                    <td>{{ $referral->referral_date }}</td>
                    <td>{{ $referral->reason }}</td>
                </tr>
            @empty
                <tr><td colspan="2">No referrals found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <h3>Counseling</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($counselings as $counseling)
                <tr>
                    <td>{{ $counseling->counseling_date }}</td>
                    <td>{{ $counseling->status }}</td>
                </tr>
            @empty
                <tr><td colspan="2">No counseling records found.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
