<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Report Export</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2, h3 { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Reports - {{ $schoolYear->school_year }} | {{ $semesterName }} Semester</h2>

    @if($tab === 'all' || $tab === 'student_profiles')
        <h3>Student Profiles</h3>
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year & Section</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $profile)
                    <tr>
                        <td>{{ $profile->student->student_id }}</td>
                        <td>{{ $profile->student->first_name }} {{ $profile->student->last_name }}</td>
                        <td>{{ $profile->course }}</td>
                        <td>{{ $profile->year_level }} {{ $profile->section }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($tab === 'all' || $tab === 'contracts')
        <h3>Contracts</h3>
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Start - End</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <td>{{ $contract->student->first_name }} {{ $contract->student->last_name }}</td>
                        <td>{{ $contract->contract_type }}</td>
                        <td>{{ $contract->status }}</td>
                        <td>{{ $contract->start_date }} - {{ $contract->end_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($tab === 'all' || $tab === 'referrals')
        <h3>Referrals</h3>
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Reason</th>
                    <th>Remarks</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($referrals as $referral)
                    <tr>
                        <td>{{ $referral->student->first_name }} {{ $referral->student->last_name }}</td>
                        <td>{{ $referral->reason }}</td>
                        <td>{{ $referral->remarks }}</td>
                        <td>{{ $referral->referral_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($tab === 'all' || $tab === 'counseling')
        <h3>Counseling</h3>
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($counselings as $counseling)
                    <tr>
                        <td>{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                        <td>{{ $counseling->counseling_date }}</td>
                        <td>{{ $counseling->status }}</td>
                        <td>{{ $counseling->remarks }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($tab === 'all' || $tab === 'transitions')
        <h3>Student Transitions</h3>
        <table>
            <thead>
                <tr>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transitions as $transition)
                    <tr>
                        <td>{{ $transition->semester->schoolYear->school_year ?? 'N/A' }}</td>
                        <td>{{ $transition->semester->semester ?? 'N/A' }}</td>
                        <td>{{ $transition->last_name }}, {{ $transition->first_name }}</td>
                        <td>{{ $transition->transition_type }}</td>
                        <td>{{ \Carbon\Carbon::parse($transition->transition_date)->format('F j, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
