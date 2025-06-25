<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            Reports & History
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 space-y-6">

            

            <!-- Filter & Search Bar -->
            <!-- School Year & Semester Filter -->
<form method="GET" action="{{ route('reports.report') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 bg-gray-50 p-4 rounded-lg shadow">
    <div>
        <label for="school_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Filter by School Year:</label>
        <select name="school_year" id="school_year" class="w-full mt-1 border-gray-300 rounded">
            
            @foreach($schoolYears as $sy)
                <option value="{{ $sy->school_year }}" {{ request('school_year') == $sy->school_year ? 'selected' : '' }}>
                    {{ $sy->school_year }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="semester" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Filter by Semester:</label>
        <select name="semester" id="semester" class="w-full mt-1 border-gray-300 rounded">
          
            <option value="1st" {{ request('semester') == '1st' ? 'selected' : '' }}>1st Semester</option>
            <option value="2nd" {{ request('semester') == '2nd' ? 'selected' : '' }}>2nd Semester</option>
            <option value="Summer" {{ request('semester') == 'Summer' ? 'selected' : '' }}>Summer</option>
        </select>
    </div>

    <div class="flex items-end">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow w-full">
            Apply Filters
        </button>
    </div>
</form>


            <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-blue-500 text-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Students</h3>
                        <p class="text-2xl">{{ $totalStudents }}</p>
                    </div>
                    <div class="bg-green-500 text-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Contracts</h3>
                        <p class="text-2xl">{{ $totalContracts }}</p>
                    </div>
                    <div class="bg-yellow-500 text-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Referrals</h3>
                        <p class="text-2xl">{{ $totalReferrals }}</p>
                    </div>
                    <div class="bg-red-500 text-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Total Counselings</h3>
                        <p class="text-2xl">{{ $totalCounselings }}</p>
                    </div>
                </div>
            <!-- Table Display -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300 uppercase font-semibold">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Course </th>
                            <th class="px-4 py-3 text-left">Section</th>
                            <th class="px-4 py-3 text-left">Contracts Count</th>
                            <th class="px-4 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-200 divide-y divide-gray-200 dark:divide-gray-600">
                        @forelse($students as $student)
    @php
        $profile = $student->profiles->where('semester_id', $selectedSemesterId)->first();
        $contractCount = $student->contracts->where('semester_id', $selectedSemesterId)->count();
    @endphp
    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 transition">
        <td class="px-4 py-3">{{ $student->student_id }}</td>
        <td class="px-4 py-3">{{ $student->first_name }} {{ $student->last_name }}</td>
        <td class="px-4 py-3">{{ $profile?->course ?? 'N/A' }} </td>
        <td class="px-4 py-3"> {{ $profile?->year_level ?? 'N/A' }}{{ $profile?->section ?? 'N/A' }}</td>
        <td class="px-4 py-3">{{ $contractCount }}</td>
        <td class="px-4 py-3">
            <a href="{{ route('reports.view-records', $student->id) }}?school_year={{ request('school_year') }}&semester={{ request('semester') }}"
               class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                View
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center py-4 text-gray-500 dark:text-gray-400">No matching student records found.</td>
    </tr>
@endforelse

                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
</x-app-layout>
