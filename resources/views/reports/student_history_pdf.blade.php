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
            color: #a82323;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .section-title {
            background-color: #a82323;
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
        .summary {
            font-weight: bold;
            margin-top: 8px;
            font-size: 10px;
            color: #a82323;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <div class="header" style="width:100%;border-bottom:2px solid #a82323;padding-bottom:15px;margin-bottom:20px;position:relative;min-height:80px;">
        <div class="header-content" style="display:table;width:100%;table-layout:fixed;">
            <div class="logo-left" style="display:table-cell;width:80px;vertical-align:middle;text-align:left;">
                <img src="{{ public_path('/logo.png') }}" alt="Logo Left" style="height:65px;width:auto;max-width:65px;">
            </div>
            <div class="school-details" style="display:table-cell;vertical-align:middle;text-align:center;padding:0 20px;">
                <h2 style="margin:0 0 5px 0;font-size:16px;color:#006400;font-weight:bold;letter-spacing:0.5px;">COLLEGE OF COMPUTING STUDIES</h2>
                <p style="margin:3px 0;font-size:11px;color:#333;">Western Mindanao State University</p>
                <p class="semester-info" style="font-size:12px;font-weight:bold;color:#a82323;margin-top:5px;">{{ $schoolYear->school_year }} | {{ $semesterName }} Semester</p>
            </div>
            <div class="logo-right" style="display:table-cell;width:80px;vertical-align:middle;text-align:right;">
                <img src="{{ public_path('/ccs_logo.jpg') }}" alt="Logo Right" style="height:65px;width:auto;max-width:65px;">
            </div>
        </div>
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
            if(request('filter_transition_type')) $filters[] = 'Transition: ' . request('filter_transition_type');

            $filterSummary = count($filters) ? implode(' | ', $filters) : 'No specific filters applied';
        @endphp
    </div>
    <h2>Student Records</h2>

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
         <p class="summary">
           Contract Status :  {{ request('filter_contract_status') ? ucfirst(request('filter_contract_status')) : 'All' }} <br>
            Contract Type : {{ request('filter_contract_type') ? ucfirst(request('filter_contract_type')) : 'Contracts' }} <br>
        </p>
            <p class="summary">Total Contracts: {{ $contracts->count() }}</p>
        @if($contracts->isNotEmpty())
            <table>
                <thead>
                    <tr>
                         <th></th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>Days</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $contract)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($contract->contract_date)->format('M d, Y') }}</td>
                            <td>{{ $contract->contract_type }}</td>
                            <td>{{ $contract->status }}</td>
                            <td>{{ $contract->start_date }}</td>
                            <td>{{ $contract->total_days }}</td>
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
        @else
            <p class="no-records">No contract records available.</p>
        @endif
    @endif

    {{-- Referrals --}}
    @if($tab === 'all' || $tab === 'referrals')
        <div class="section-title">Referrals</div>
        <p class="summary">
    Referal Reason : {{ request('filter_reason') ? ucfirst(request('filter_reason')) : 'All' }}
</p>
 <p class="summary">Total Referrals: {{ $referrals->count() }}</p>
        @if($referrals->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Date</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($referrals as $referral)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($referral->created_at)->format('M d, Y') }}</td>
                            <td>{{ $referral->reason }}</td>
                            <td>{{ $referral->remarks }}</td>
                        </tr>
                         <tr>
                        <td colspan="8" class="text-wrap" style="padding-left: 30px;">
                            <strong>Remarks:</strong> {{ $referral->remarks ?: 'No remarks' }}
                        </td>
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
        <p class="summary">
            Status :{{ request('filter_counseling_status') ? ucfirst(request('filter_counseling_status')) : 'All' }} 
        </p>

        <p class="summary">Total Counseling Sessions: {{ $counselings->count() }}</p>
        @if($counselings->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($counselings as $counseling)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($counseling->created_at)->format('M d, Y') }}</td>
                            <td>{{ $counseling->status }}</td>
                            <td>{{ $counseling->remarks }}</td>
                        </tr>
                         <tr>
                        <td colspan="8" class="text-wrap" style="padding-left: 30px;">
                            <strong>Remarks:</strong> {{ $counseling->remarks ?: 'No remarks' }}
                        </td>
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
