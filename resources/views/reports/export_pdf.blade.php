<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GMS Export Report</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 10px;
            color: #333;
            margin: 20px;
            line-height: 1.2;
        }

        .header {
            width: 100%;
            border-bottom: 2px solid #a82323;
            padding-bottom: 15px;
            margin-bottom: 20px;
            position: relative;
            min-height: 80px;
        }

        .header-content {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .logo-left {
            display: table-cell;
            width: 80px;
            vertical-align: middle;
            text-align: left;
        }

        .school-details {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            padding: 0 20px;
        }

        .logo-right {
            display: table-cell;
            width: 80px;
            vertical-align: middle;
            text-align: right;
        }

        .header img {
            height: 65px;
            width: auto;
            max-width: 65px;
        }

        .school-details h2 {
            margin: 0 0 5px 0;
            font-size: 16px;
            color: #006400;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .school-details p {
            margin: 3px 0;
            font-size: 11px;
            color: #333;
        }

        .school-details .semester-info {
            font-size: 12px;
            font-weight: bold;
            color: #a82323;
            margin-top: 5px;
        }

        .report-title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 15px 0;
            color: #333;
            letter-spacing: 1px;
        }

        .filter-details {
            font-size: 10px;
            color: #555;
            margin-bottom: 15px;
            padding: 8px;
            background-color: #f9f9f9;
            border-left: 3px solid #a82323;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 9px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 4px 6px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
            font-size: 9px;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        /* Column width specifications for different tables */
        .student-profiles th:nth-child(1), .student-profiles td:nth-child(1) { width: 5%; } /* Numbering*/
        .student-profiles th:nth-child(2), .student-profiles td:nth-child(2) { width: 10%; } /* Student ID */
        .student-profiles th:nth-child(3), .student-profiles td:nth-child(3) { width: 35%; } /* Name */
        .student-profiles th:nth-child(4), .student-profiles td:nth-child(4) { width: 15%; } /* Course */
        .student-profiles th:nth-child(5), .student-profiles td:nth-child(5) { width: 15%; } /* Year & Section */
        .student-profiles th:nth-child(6), .student-profiles td:nth-child(6) { width: 10%; } /* Contracts */
        .student-profiles th:nth-child(7), .student-profiles td:nth-child(7) { width: 10%; } /* Referrals */
        .student-profiles th:nth-child(8), .student-profiles td:nth-child(8) { width: 8%; }  /* Counseling */

         .contracts th:nth-child(1), .contracts td:nth-child(1) { width: 5%; } /* Numbering*/
         .contracts th:nth-child(2), .contracts td:nth-child(2) { width: 15%; } /* Student ID */
        .contracts th:nth-child(3), .contracts td:nth-child(3) { width: 35%; } /* Student */
        .contracts th:nth-child(4), .contracts td:nth-child(4) { width: 20%; } /* Type */
        .contracts th:nth-child(5), .contracts td:nth-child(5) { width: 15%; } /* Status */
        .contracts th:nth-child(6), .contracts td:nth-child(6) { width: 15%; } /* Start */
        .contracts th:nth-child(7), .contracts td:nth-child(7) { width: 8%; }  /* Days */
        .contracts th:nth-child(8), .contracts td:nth-child(8) { width: 15%; } /* End */
        .contracts th:nth-child(9), .contracts td:nth-child(9) { width: 100%; } /* remarks */

        .referrals th:nth-child(1), .referrals td:nth-child(1) { width: 5%; } /* numbering */
        .referrals th:nth-child(2), .referrals td:nth-child(2) { width: 25%; } /* student id */
        .referrals th:nth-child(3), .referrals td:nth-child(3) { width: 85%; } /* Student */
        .referrals th:nth-child(4), .referrals td:nth-child(4) { width: 40%; } /* Reason */
        .referrals th:nth-child(6), .referrals td:nth-child(5) { width: 20%; } /* Date */
        .referrals th:nth-child(5), .referrals td:nth-child(6) { width: 100%; } /* Remarks */

        .counseling th:nth-child(1), .counseling td:nth-child(1) { width: 5%; } /* Numbering */
        .counseling th:nth-child(2), .counseling td:nth-child(2) { width: 30%; } /* Student ID */
        .counseling th:nth-child(3), .counseling td:nth-child(3) { width: 85%; } /* Student */
        .counseling th:nth-child(4), .counseling td:nth-child(5) { width: 45%; } /* Date */
        .counseling th:nth-child(5), .counseling td:nth-child(6) { width: 25%; } /* Status */
        .counseling th:nth-child(6), .counseling td:nth-child(7) { width: 100%; } /* Remarks */

        .transitions th:nth-child(1), .transitions td:nth-child(1) { width: 5%; } /* Numbering */
        .transitions th:nth-child(1), .transitions td:nth-child(2) { width: 30%; } /* Student ID */
        .transitions th:nth-child(2), .transitions td:nth-child(3) { width: 85%; } /* NAme */
        .transitions th:nth-child(3), .transitions td:nth-child(4) { width: 45%; } /* type */
        .transitions th:nth-child(4), .transitions td:nth-child(5) { width: 25%; } /* date */
        .transitions th:nth-child(5), .transitions td:nth-child(6) { width: 100%; } /* Remarks */

        h3 {
            margin-top: 25px;
            margin-bottom: 8px;
            color: #a82323;
            font-size: 12px;
            border-bottom: 2px solid #a82323;
            padding-bottom: 3px;
            font-weight: bold;
        }

        .summary {
            font-weight: bold;
            margin-top: 8px;
            font-size: 10px;
            color: #a82323;
        }

        /* Text wrapping for long content */
        .text-wrap {
            word-wrap: break-word;
            word-break: break-word;
            hyphens: auto;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <div class="logo-left">
                <img src="{{ public_path('/logo.png') }}" alt="Logo Left">
            </div>
            <div class="school-details">
                <h2>COLLEGE OF COMPUTING STUDIES</h2>
                <p>Western Mindanao State University</p>
                <p class="semester-info">{{ $schoolYear->school_year }} | {{ $semesterName }} Semester</p>
            </div>
            <div class="logo-right">
                <img src="{{ public_path('/ccs_logo.jpg') }}" alt="Logo Right">
            </div>
        </div>
    </div>

    <div class="report-title">
        GUIDANCE OFFICE RECORDS REPORT
    </div>

    <div class="">
        @php
            $filters = [];

            if(request('filter_course')) $filters[] = 'Course: ' . request('filter_course');
            if(request('filter_year_level')) $filters[] = 'Year Level: ' . request('filter_year_level');
            if(request('filter_section')) $filters[] = 'Section: ' . request('filter_section');
            if(request('filter_contract_type')) $filters[] = 'Contract Type: ' . request('filter_contract_type');
            if(request('filter_transition')) $filters[] = 'Transition: ' . request('filter_transition');
            if(request('filter_contract_status')) $filters[] = 'Contract Status: ' . request('filter_contract_status');
            if(request('filter_counseling_status')) $filters[] = 'Counseling Status: ' . request('filter_counseling_status');
            if(request('filter_reason')) $filters[] = 'Referral Reason: ' . request('filter_reason');

            $filterSummary = count($filters) ? implode(' | ', $filters) : 'No specific filters applied';
        @endphp
    </div>

    <!-- Student Profiles -->
    @if($tab === 'all' || $tab === 'student_profiles')
    
        <h3> Student Profiles</h3><br>
    <p class="summary flex gap-3">
            Current School Year : {{ $schoolYear->school_year }}<br>
            Semester : {{ $semesterName }}<br>
            Course :  {{ request('filter_course') ? ucfirst(request('filter_course')) : 'All' }} <br>
            Year :  {{ request('filter_year_level') ? ucfirst(request('filter_year_level')) : 'All' }} <br>
            Section : {{ request('filter_section') ? ucfirst(request('filter_section')) : 'All' }}<br>
        </p>
        <p class="summary">Total Students: {{ $students->count() }}</p>
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
                         <td >{{ $loop->iteration }}</td>
                        <td>{{ $profile->student->student_id }}</td>
                       @php
                            $transition = $transitions->first(function ($t) use ($profile) {
                                return $t->student_id === $profile->student_id && $t->semester_id === $profile->semester_id;
                            });
                        @endphp

                        <td class="text-wrap">
                            {{ $profile->student->last_name }}, {{ $profile->student->first_name }} {{ $profile->student->middle_name }} {{ $profile->student->suffix }}

                            @if ($transition)
                                <span style="display:inline-block; background-color:#ede9fe; color:#5b21b6; font-size:8px; font-weight:600; padding:1px 4px; border-radius:8px; margin-left:3px;">
                                    {{ $transition->transition_type }}
                                </span>
                            @endif
                        </td>
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

    <!-- Contracts -->
    @if($tab === 'all' || $tab === 'contracts')
       <h3>Contract Records</h3>
        <p class="summary">
           Contract Status :  {{ request('filter_contract_status') ? ucfirst(request('filter_contract_status')) : 'All' }} <br>
            Contract Type{{ request('filter_contract_type') ? ucfirst(request('filter_contract_type')) : 'Contracts' }} <br>
        </p>

        <p class="summary">Total Contracts: {{ $contracts->count() }}</p>


        <table class="contracts">
            <thead>
                <tr>
                    <th></th>
                    <th>Student ID</th>
                    <th>Name</th>
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contract->student->student_id }}</td>
                        <td class="text-wrap">{{ $contract->student->last_name }}, {{ $contract->student->first_name }} {{ $contract->student->middle_name }}. {{ $contract->student->suffix }}</td>
                        <td>{{ $contract->contract_type }}</td>
                        <td>{{ $contract->status }}</td>
                        <td>{{ $contract->start_date }}</td>
                        <td style="text-align: center;">{{ $contract->total_days }}</td>
                        <td>{{ $contract->end_date }}</td>
                    </tr>
                    <tr>
                        <td colspan="8" class="text-wrap" style="padding-left: 30px;">
                            <strong>Remarks:</strong> {{ $contract->remarks ?: 'No remarks' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Referrals -->
    @if($tab === 'all' || $tab === 'referrals')
        <h3>Referral Records</h3>
<p class="summary">
    Referal Reason : {{ request('filter_reason') ? ucfirst(request('filter_reason')) : 'All' }}
</p>


        <p class="summary">Total Referrals: {{ $referrals->count() }}</p>
        <table class="referrals">
            <thead>
                <tr>
                    <th></th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Reason</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($referrals as $referral)
                    <tr>
                         <td >{{ $loop->iteration }}</td>
                          <td >{{ $referral->student->student_id }}</td>
                        <td class="text-wrap">{{ $referral->student->last_name }}, {{ $referral->student->first_name }} {{ $referral->student->middle_name }}. {{ $referral->student->suffix }}</td>
                        <td>{{ $referral->reason }}</td>
                        <td>{{ $referral->referral_date }}</td>
                    </tr>
                    <tr>
                        <td colspan="8" class="text-wrap" style="padding-left: 30px;">
                            <strong>Remarks:</strong> {{ $referral->remarks ?: 'No remarks' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Counseling -->
    @if($tab === 'all' || $tab === 'counseling')
        <h3>Counseling Records</h3>
        <p class="summary">
            Status :{{ request('filter_counseling_status') ? ucfirst(request('filter_counseling_status')) : 'All' }} 
        </p>

        <table class="counseling">
            <thead>
                <tr>
                    <th></th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($counselings as $counseling)
                    <tr>
                         <td >{{ $loop->iteration }}</td>
                          <td >{{ $counseling->student->student_id }}</td>
                        <td class="text-wrap">{{ $counseling->student->last_name }}, {{ $counseling->student->first_name }} {{ $counseling->student->middle_name }}. {{ $counseling->student->suffix }}</td>
                        <td>{{ $counseling->counseling_date }}</td>
                        <td>{{ $counseling->status }}</td>
                    </tr>
                     <tr>
                        <td colspan="8" class="text-wrap" style="padding-left: 30px;">
                            <strong>Remarks:</strong> {{ $counseling->remarks ?: 'No remarks' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="summary">Total Counseling Sessions: {{ $counselings->count() }}</p>
    @endif

    <!-- Transitions -->
    @if($tab === 'all' || $tab === 'transitions')
        <h3>Student Transitions</h3>
        <p class="summary">
            Type :{{ request('filter_transition') ? ucfirst(request('filter_transition')) : 'All' }} 
        </p>
        <table class="transitions">
            <thead>
                <tr>
                    <th></th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transitions as $transition)
                    <tr>
                         <td >{{ $loop->iteration }}</td>
                         <td >{{ $transition->student->student_id}}</td>
                        <td class="text-wrap">{{ $transition->last_name }}, {{ $transition->first_name }} {{ $transition->middle_name }}. {{ $transition->suffix }}</td>
                        <td>{{ $transition->transition_type }}</td>
                        <td>{{ \Carbon\Carbon::parse($transition->transition_date)->format('F j, Y') }}</td>
                    </tr>
                     <tr>
                        <td colspan="8" class="text-wrap" style="padding-left: 30px;">
                            <strong>Remarks:</strong> {{ $transition->remarks ?: 'No remarks' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="summary">Total Transitions: {{ $transitions->count() }}</p>
    @endif

</body>
</html>
