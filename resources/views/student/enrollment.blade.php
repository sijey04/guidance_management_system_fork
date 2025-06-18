<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="main-content">
                <div class="p-6 space-y-4">
                    <div>
                        @include('layouts.view-tab')
                    </div>
                    <div class="bg-[#f8eaea] p-5 rounded border border-[#a82323]">
                        <h2 class="text-xl font-semibold" style="color:#a82323;">Enrollment History</h2>
                        <p class="text-sm text-gray-500">
                            Below is the enrollment history for 
                            <span class="font-semibold">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</span>. 
                            You can enroll or unenroll the student in a semester. 
                        </p>
                    </div>
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="px-5 py-3">Academic Year</th>
                                    <th class="px-5 py-3">Semester</th>
                                    <th class="px-5 py-3 text-center">Enrollment Status</th>
                                    <th class="px-5 py-3 text-center">Action</th>
                                    <th class="px-5 py-3 text-center">Current</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($semesters as $semester)
                                    @php
                                        $enrollment = $student->enrollments->where('semester_id', $semester->id)->first();
                                    @endphp
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        <td class="px-5 py-4">{{ $semester->school_year }}</td>
                                        <td class="px-5 py-4">{{ $semester->semester }}</td>
                                        <td class="px-5 py-4 text-center">
                                            @if($enrollment && $enrollment->is_enrolled)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Enrolled</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Not Enrolled</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-4 text-center">
                                            @if($enrollment && $enrollment->is_enrolled)
                                                <form action="{{ route('students.unenroll', [$student->id, $semester->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="sign-in-btn" style="background:#fff; color:#a82323; border:1.5px solid #a82323; border-radius:6px; padding:7px 14px; font-weight:600;">Unenroll</button>
                                                </form>
                                            @else
                                                <form action="{{ route('students.enroll', [$student->id, $semester->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 14px; font-weight:600;">Enroll</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td class="px-5 py-4 text-center">
                                            @if($activeSemester && $semester->id === $activeSemester->id)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Active</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-gray-400">No enrollment history found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-4 text-sm text-yellow-700 rounded">
                        <p><strong>Note:</strong> Click "Enroll" to register the student for a semester, or "Unenroll" to remove. The active semester is indicated by a blue badge.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
