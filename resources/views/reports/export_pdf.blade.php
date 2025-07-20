<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GMS Export Report</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #a82323;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            height: 60px;
        }

        .school-details {
            text-align: center;
            flex-grow: 1;
        }

        .school-details h2 {
            margin: 0;
            font-size: 18px;
            color: #006400;
        }

        .school-details p {
            margin: 2px 0;
            font-size: 11px;
        }

        .report-title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 5px 0 15px;
        }

        .filter-details {
            font-size: 11px;
            color: #555;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #d1d5db;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background-color: #f3f4f6;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        h3 {
            margin-top: 30px;
            margin-bottom: 8px;
            color: #a82323;
            font-size: 14px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
        }

        .summary {
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('/logo.png') }}" alt="Logo Left">
        <div class="school-details">
            <h2>COLLEGE OF COMPUTING STUDIES</h2>
            <p>Western Mindanao State University</p>
            <p><strong>{{ $schoolYear->school_year }}</strong> | <strong>{{ $semesterName }} Semester</strong></p>
        </div>
        <img src="{{ public_path('/ccs_logo.jpg') }}" alt="Logo Right">
    </div>

    <div class="report-title">
        GUIDANCE OFFICE RECORDS REPORT
    </div>

    <div class="filter-details">
        @php
            $filters = [];

            if(request('filter_course')) $filters[] = 'Course: ' . request('filter_course');
            if(request('filter_year_level')) $filters[] = 'Year Level: ' . request('filter_year_level');
            if(request('filter_section')) $filters[] = 'Section: ' . request('filter_section');
            if(request('filter_contract_type')) $filters[] = 'Contract Type: ' . request('filter_contract_type');
            if(request('filter_transition')) $filters[] = 'Transition: ' . request('filter_transition');

            $filterSummary = count($filters) ? implode(' | ', $filters) : 'No specific filters applied';
        @endphp
        <strong>Filter Applied:</strong> {{ $filterSummary }}
    </div>

    <!-- Student Profiles -->
    @if($tab === 'all' || $tab === 'student_profiles')
        <h3>Student Profiles</h3>
        <table>
            <thead>
                <tr>
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
                        <td>{{ $profile->student->student_id }}</td>
                       @php
                            $transition = $transitions->first(function ($t) use ($profile) {
                                return $t->student_id === $profile->student_id && $t->semester_id === $profile->semester_id;
                            });
                        @endphp

                        <td class="flex gap-5 items-center">
                            {{ $profile->student->last_name }}, {{ $profile->student->first_name }} {{ $profile->student->middle_name }} {{ $profile->student->suffix }}

                            @if ($transition)
                                <span style="display:inline-block; background-color:#ede9fe; color:#5b21b6; font-size:10px; font-weight:600; padding:2px 6px; border-radius:12px; margin-left:5px;">
                                    {{ $transition->transition_type }}
                                </span>
                            @endif
                        </td>
                        <td>{{ $profile->course }}</td>
                        <td>{{ $profile->year_level }} {{ $profile->section }}</td>
                        <td>{{ $contractCounts[$profile->student_id] ?? 0 }}</td>
                        <td>{{ $referralCounts[$profile->student_id] ?? 0 }}</td>
                        <td>{{ $counselingCounts[$profile->student_id] ?? 0 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="summary">Total Students: {{ $students->count() }}</p>
    @endif

    <!-- Contracts -->
    @if($tab === 'all' || $tab === 'contracts')
        <h3>Contract Records</h3>
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Start</th>
                    <th>Days</th>
                    <th>End</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <td>{{ $contract->student->first_name }} {{ $contract->student->last_name }}</td>
                        <td>{{ $contract->contract_type }}</td>
                        <td>{{ $contract->status }}</td>
                        <td>{{ $contract->start_date }}</td>
                         <td>{{ $contract->total_days }}</td>
                        <td>{{ $contract->end_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="summary">Total Contracts: {{ $contracts->count() }}</p>
    @endif

    <!-- Referrals -->
    @if($tab === 'all' || $tab === 'referrals')
        <h3>Referral Records</h3>
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
        <p class="summary">Total Referrals: {{ $referrals->count() }}</p>
    @endif

    <!-- Counseling -->
    @if($tab === 'all' || $tab === 'counseling')
        <h3>Counseling Records</h3>
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
        <p class="summary">Total Counseling Sessions: {{ $counselings->count() }}</p>
    @endif

    <!-- Transitions -->
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
        <p class="summary">Total Transitions: {{ $transitions->count() }}</p>
    @endif

</body>
</html>
