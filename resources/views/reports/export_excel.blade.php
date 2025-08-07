<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Calibri', 'Arial', sans-serif;
            font-size: 11px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px 8px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
            font-size: 10px;
        }
        h3 {
            font-size: 14px;
            font-weight: bold;
            margin: 20px 0 10px 0;
            color: #a82323;
        }
        
        /* Column width specifications for different tables */
        .student-profiles th:nth-child(1), .student-profiles td:nth-child(1) { width: 100px; } /* Student ID */
        .student-profiles th:nth-child(2), .student-profiles td:nth-child(2) { width: 200px; } /* Name */
        .student-profiles th:nth-child(3), .student-profiles td:nth-child(3) { width: 80px; }  /* Course */
        .student-profiles th:nth-child(4), .student-profiles td:nth-child(4) { width: 80px; }  /* Year & Section */
        .student-profiles th:nth-child(5), .student-profiles td:nth-child(5) { width: 70px; }  /* Contracts */
        .student-profiles th:nth-child(6), .student-profiles td:nth-child(6) { width: 70px; }  /* Referrals */
        .student-profiles th:nth-child(7), .student-profiles td:nth-child(7) { width: 70px; }  /* Counseling */

        .contracts th:nth-child(1), .contracts td:nth-child(1) { width: 100px; } /* Student ID */
        .contracts th:nth-child(2), .contracts td:nth-child(2) { width: 200px; } /* Student */
        .contracts th:nth-child(3), .contracts td:nth-child(3) { width: 120px; } /* Type */
        .contracts th:nth-child(4), .contracts td:nth-child(4) { width: 80px; }  /* Status */
        .contracts th:nth-child(5), .contracts td:nth-child(5) { width: 150px; } /* Remarks */
        .contracts th:nth-child(6), .contracts td:nth-child(6) { width: 80px; }  /* Total Days */
        .contracts th:nth-child(7), .contracts td:nth-child(7) { width: 100px; } /* Start Date */
        .contracts th:nth-child(8), .contracts td:nth-child(8) { width: 100px; } /* End Date */

        .referrals th:nth-child(1), .referrals td:nth-child(1) { width: 100px; } /* Student ID */
        .referrals th:nth-child(2), .referrals td:nth-child(2) { width: 200px; } /* Student */
        .referrals th:nth-child(3), .referrals td:nth-child(3) { width: 150px; } /* Reason */
        .referrals th:nth-child(4), .referrals td:nth-child(4) { width: 200px; } /* Remarks */
        .referrals th:nth-child(5), .referrals td:nth-child(5) { width: 100px; } /* Date */

        .counseling th:nth-child(1), .counseling td:nth-child(1) { width: 100px; } /* Student ID */
        .counseling th:nth-child(2), .counseling td:nth-child(2) { width: 200px; } /* Student */
        .counseling th:nth-child(3), .counseling td:nth-child(3) { width: 100px; } /* Date */
        .counseling th:nth-child(4), .counseling td:nth-child(4) { width: 100px; } /* Status */
        .counseling th:nth-child(5), .counseling td:nth-child(5) { width: 250px; } /* Remarks */

        .transitions th:nth-child(1), .transitions td:nth-child(1) { width: 100px; } /* School Year */
        .transitions th:nth-child(2), .transitions td:nth-child(2) { width: 80px; }  /* Semester */
        .transitions th:nth-child(3), .transitions td:nth-child(3) { width: 200px; } /* Name */
        .transitions th:nth-child(4), .transitions td:nth-child(4) { width: 150px; } /* Type */
        .transitions th:nth-child(5), .transitions td:nth-child(5) { width: 100px; } /* Date */
    </style>
</head>
<body>

@if($tab === 'all' || $tab === 'student_profiles')
    <h3>Student Profiles</h3>
    <table class="student-profiles">
        <thead>
            <tr>
                <th></th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Year & Section</th>
                <th>Contracts</th>
                <th>Referrals</th>
                <th>Counseling</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $profile)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $profile->student->student_id }}</td>
                    <td>{{ $profile->student->last_name }}, {{ $profile->student->first_name }} {{ $profile->student->middle_name }}. {{ $profile->student->suffix}}</td>
                    <td>{{ $profile->course }}</td>
                    <td>{{ $profile->year_level }} {{ $profile->section }}</td>
                    <td style="text-align: center;">{{ $contractCounts[$profile->student_id] ?? 0 }}</td>
                    <td style="text-align: center;">{{ $referralCounts[$profile->student_id] ?? 0 }}</td>
                    <td style="text-align: center;">{{ $counselingCounts[$profile->student_id] ?? 0 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tab === 'all' || $tab === 'contracts')
    <h3>Contracts</h3>
    <table class="contracts">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student</th>
                <th>Type</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Total Days</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $contract->student->student_id }}</td>
                    <td>{{ $contract->student->last_name }}, {{ $contract->student->first_name }} {{ $contract->student->middle_name }}. {{ $contract->student->suffix }}</td>
                    <td>{{ $contract->contract_type }}</td>
                    <td>{{ $contract->status }}</td>
                    <td>{{ $contract->remarks ?: 'No remarks' }}</td>
                    <td style="text-align: center;">{{ $contract->total_days }}</td>
                    <td>{{ $contract->start_date }}</td>
                    <td>{{ $contract->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tab === 'all' || $tab === 'referrals')
    <h3>Referrals</h3>
    <table class="referrals">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student</th>
                <th>Reason</th>
                <th>Remarks</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($referrals as $referral)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $referral->student->student_id }}</td>
                    <td>{{ $referral->student->last_name }}, {{ $referral->student->first_name }} {{ $referral->student->middle_name }}. {{ $referral->student->suffix }}</td>
                    <td>{{ $referral->reason }}</td>
                    <td>{{ $referral->remarks ?: 'No remarks' }}</td>
                    <td>{{ $referral->referral_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tab === 'all' || $tab === 'counseling')
    <h3>Counseling</h3>
    <table class="counseling">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student</th>
                <th>Date</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($counselings as $counseling)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $counseling->student->student_id }}</td>
                    <td>{{ $counseling->student->last_name }}, {{ $counseling->student->first_name }} {{ $counseling->student->middle_name }}. {{ $counseling->student->suffix }}</td>
                    <td>{{ $counseling->counseling_date }}</td>
                    <td>{{ $counseling->status }}</td>
                    <td>{{ $counseling->remarks ?: 'No remarks' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($tab === 'all' || $tab === 'transitions')
    <h3>Student Transitions</h3>
    <table class="transitions">
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transition->semester->schoolYear->school_year ?? 'N/A' }}</td>
                    <td>{{ $transition->semester->semester ?? 'N/A' }}</td>
                    <td>{{ $transition->last_name }}, {{ $transition->first_name }} {{ $transition->middle_name }}. {{ $transition->suffix }}</td>
                    <td>{{ $transition->transition_type }}</td>
                    <td>{{ \Carbon\Carbon::parse($transition->transition_date)->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

</body>
</html>
