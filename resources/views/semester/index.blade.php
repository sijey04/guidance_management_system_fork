<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Academic Setup</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10" x-data="{ openSemesterModal: false, openSchoolYearModal: false }">
        <div class="p-6 bg-white rounded shadow">

            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold mb-4 text-red-600">Academic Setup</h1>
                    {{-- Display Active School Year & Semester --}}
                    @if($activeSchoolYear && $activeSemester)
                        <p class="mb-4">
                            <strong>Academic Year:</strong> {{ $activeSchoolYear->school_year }} |
                            <strong>Semester:</strong> {{ $activeSemester->semester }}
                            <span class="ml-2 bg-green-200 text-green-800 px-2 py-1 rounded text-xs">Active</span>
                        </p>
                    @else
                        <p class="text-red-500 mb-4">No active School Year or Semester set.</p>
                    @endif
                </div>

                {{-- Buttons to Create School Year & Semester --}}
                <div class="flex justify-between mb-4">
                    <div>
                        <button @click="openSchoolYearModal = true" 
                            class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">Add New School Year</button>
                        <button @click="openSemesterModal = true" 
                            class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">Add New Semester</button>
                    </div>

                        {{-- Include Modals --}}
                    @include('semester.createSchoolYear')
                    @include('semester.create')
                </div>

            </div>

          

            @if($activeSemester && !$hasStudents)
                <a href="{{ route('semester.validate', $activeSemester->id) }}"
                class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">
                    Validate Students from Previous Semester
                </a>
            @endif


            {{-- Table: School Years and Their Semesters --}}
            <h3 class="text-lg font-semibold mt-10 mb-2">School Years & Their Semesters</h3>
            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white  ">
 
            <table class="w-full border text-sm text-left text-gray-700">
                <thead style="background:#a82323; color:#fff;">
                    <tr>
                        <th class="p-3">School Year</th>
                        <th class="p-3">Start Date</th>
                        <th class="p-3">End Date</th>
                        <th class="p-3">Semesters</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schoolYears as $sy)
                        <tr class="border-b">
                            <td class="p-3">{{ $sy->school_year }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($sy->start_date)->format('Y-m-d') }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($sy->end_date)->format('Y-m-d') }}</td>
                            <td class="p-3">
                                @forelse($sy->semesters as $sem)
                                    <div>
                                        {{ $sem->semester }}
                                        @if($sem->is_current)
                                            <span class="ml-1 bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Active</span>
                                        @endif
                                    </div>
                                @empty
                                    <span class="text-gray-400 text-xs">No Semesters</span>
                                @endforelse
                            </td>
                            <td class="p-3">
                                @if($sy->is_active)
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Active</span>
                                @else
                                    <span class="text-gray-400 text-xs">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center text-gray-500">No School Years found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
    </div>
</x-app-layout>
