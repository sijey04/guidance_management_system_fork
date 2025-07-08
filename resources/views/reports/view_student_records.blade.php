<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            {{ __('Student History') }}: {{ $student->first_name }} {{ $student->last_name }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-4 lg:px-8 py-6">
        <div class="space-y-6">
            <!-- Back Button -->
             <a href="{{ route('report') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-sm font-semibold text-[#a82323] rounded hover:bg-gray-100 transition">
                &larr; Back to Reports
            </a>

            {{-- <a href="{{ route('reports.student.export', [
                'student_id' => $student->id,
                'school_year_id' => request('school_year_id'),
                'semester_name' => request('semester_name'),
            ]) }}"
            class="inline-flex items-center px-4 py-2 bg-[#a82323] text-white text-sm font-semibold rounded hover:bg-[#8f1f1f] transition">
                Export to PDF
            </a> --}}

            <!-- Instructions -->
            <div class="bg-[#fef3f2] border border-[#fca5a5] text-[#a82323] rounded p-4 text-sm">
                <p class="font-medium mb-1">Viewing Student Record</p>
                <p>Below is the complete student history for the selected school year and semester.</p>
            </div>

            <!-- Student Info Card -->
            <div class="bg-white border rounded-lg shadow p-6 space-y-6 hover:shadow-lg transition">
                <!-- Header -->
                <h1 class="text-2xl font-extrabold text-[#a82323]">
                    {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} {{ $student->suffix }}
                </h1>

                <!-- Section: Basic Info -->
                <section>
                    <h3 class="text-xl font-semibold text-[#a82323] border-b pb-2 mb-2">Basic Information</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <x-student-info label="Student ID" :value="$student->student_id" />
                        <x-student-info label="Birthday" :value="$student->birthday?->format('F j, Y')" />
                        <x-student-info label="Gender" :value="$student->gender ?? 'N/A'" />
                        <x-student-info label="Course, Year & Section" :value="($profile?->course ?? 'N/A') . ' - ' . ($profile?->year_level ?? '') . ($profile?->section ?? '')" />
                       <x-student-info label="School Year" :value="$schoolYearName" />

                        <x-student-info label="Semester" :value="$semesterName ?? 'N/A'" />
                    </div>
                </section>

                <!-- Section: Contracts -->
                <section>
                    <h3 class="text-xl font-semibold text-[#a82323] border-b pb-2 mb-2">Contract Records</h3>
                    <p class="text-sm text-gray-500 mb-3">Formal agreements and behavioral contracts entered by the student.</p>

                    <div class="overflow-auto">
                        <table class="min-w-full text-sm border rounded">
                            <thead class="bg-gray-100 text-left">
                                <tr>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Type</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Start</th>
                                    <th class="px-4 py-2">End</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contracts as $contract)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($contract->contract_date)->format('F j, Y') }}</td>
                                        <td class="px-4 py-2">{{ $contract->contract_type }}</td>
                                        <td class="px-4 py-2">{{ $contract->status }}</td>
                                        <td class="px-4 py-2">{{ $contract->start_date }}</td>
                                        <td class="px-4 py-2">{{ $contract->end_date }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('contracts.view', ['contract' => $contract->id, 'source' => 'contracts']) }}"
                                               class="text-[#a82323] hover:underline">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center py-3 text-gray-500">No contracts found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Section: Referrals -->
                <section>
                    <h3 class="text-xl font-semibold text-[#a82323] border-b pb-2 mb-2">Referral Records</h3>
                    <p class="text-sm text-gray-500 mb-3">Cases or concerns referred by faculty or staff for counseling or guidance intervention.</p>

                    <div class="overflow-auto">
                        <table class="min-w-full text-sm border rounded">
                            <thead class="bg-gray-100 text-left">
                                <tr>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Reason</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($referrals as $referral)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-2">{{ $referral->referral_date }}</td>
                                        <td class="px-4 py-2">{{ $referral->reason }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('referrals.view', ['id' => $referral->id, 'source' => 'report']) }}"
                                               class="text-[#a82323] hover:underline">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="3" class="text-center py-3 text-gray-500">No referrals found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Section: Counseling -->
                <section>
                    <h3 class="text-xl font-semibold text-[#a82323] border-b pb-2 mb-2">Counseling Records</h3>
                    <p class="text-sm text-gray-500 mb-3">Sessions and outcomes for counseling services received by the student.</p>

                    <div class="overflow-auto">
                        <table class="min-w-full text-sm border rounded">
                            <thead class="bg-gray-100 text-left">
                                <tr>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($counselings as $counseling)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-2">{{ $counseling->counseling_date }}</td>
                                        <td class="px-4 py-2">{{ $counseling->status }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('counseling.view', ['id' => $counseling->id, 'source' => 'report']) }}"
                                               class="text-[#a82323] hover:underline">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="3" class="text-center py-3 text-gray-500">No counseling records found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
