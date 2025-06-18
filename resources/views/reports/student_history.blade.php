<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-200">
            History: {{ $student->first_name }} {{ $student->last_name }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow p-6 rounded-md">
            <h3 class="text-lg font-semibold mb-4">Enrollment & Profile History</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-gray-200 rounded">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2">School Year</th>
                            <th class="px-4 py-2">Semester</th>
                            <th class="px-4 py-2">Course & Year</th>
                            <th class="px-4 py-2">Section</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($student->profiles as $profile)
                            <tr>
                                <td class="px-4 py-2">{{ $profile->semester->school_year ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $profile->semester->semester ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $profile->course_year ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $profile->section ?? 'N/A' }}</td>
                               <td>
            <a href="{{ route('reports.viewProfile', ['studentId' => $student->id, 'semesterId' => $profile->semester->id]) }}" 
               class="text-blue-600 hover:underline">View Profile</a>
        </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center py-3 text-gray-500">No profile history found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
