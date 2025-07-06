<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">Academic Setup</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ openSemesterModal: false, openSchoolYearModal: false }">
        <div class="bg-white rounded-lg shadow p-6 space-y-6">

            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-red-600 mb-2">Academic Setup</h1>
                    @if($activeSchoolYear && $activeSemester)
                        <p class="text-gray-700">
                            <strong>Active Academic Year:</strong> {{ $activeSchoolYear->school_year }} |
                            <strong>Semester:</strong> {{ $activeSemester->semester }}
                            <span class="ml-2 bg-green-200 text-green-800 px-2 py-1 rounded text-xs">Active</span>
                        </p>
                    @else
                        <p class="text-red-500">No active School Year or Semester set.</p>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-2">
                    <button @click="openSchoolYearModal = true"
                            class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                        Add New School Year
                    </button>
                    <button @click="openSemesterModal = true"
                            class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                        Add New Semester
                    </button>
                </div>
            </div>

            <!-- Modals -->
            @include('semester.createSchoolYear')
            @include('semester.create')

            <!-- Validate Students -->
            @if($activeSemester)
                <div>
                    <a href="{{ route('semester.validate', $activeSemester->id) }}"
                       class="inline-block mt-4 bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                        Validate Students from Previous Semester
                    </a>
                    <p class="text-sm text-gray-500 mt-1">
                        Click this button to promote or validate students from the previous semester into the current one.
                    </p>
                </div>
            @endif

            <!-- School Years Table -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-3">School Years & Their Semesters</h3>
                <p class="text-sm text-gray-500 mb-4">Below is a list of all registered school years and their respective semesters. Active ones are highlighted.</p>

                <div class="overflow-x-auto border rounded-lg shadow">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead style="background:#a82323;" class="text-white">
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
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="p-3">{{ $sy->school_year }}</td>
                                    <td class="p-3">{{ \Carbon\Carbon::parse($sy->start_date)->format('Y-m-d') }}</td>
                                    <td class="p-3">{{ \Carbon\Carbon::parse($sy->end_date)->format('Y-m-d') }}</td>
                                    <td class="p-3 space-y-1">
                                        @forelse($sy->semesters as $sem)
                                            <div class="flex items-center gap-2">
                                                <span>{{ $sem->semester }}</span>
                                                @if($sem->is_current)
                                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Active</span>
                                                @endif
                                            </div>
                                        @empty
                                            <span class="text-gray-400 text-xs">No Semesters</span>
                                        @endforelse
                                    </td>
                                    <td class="p-3">
                                        @if($sy->is_active)
                                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Active</span>
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
    </div>
</x-app-layout>
