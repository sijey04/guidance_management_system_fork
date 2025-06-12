<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 rounded">
                    <div class="my-2">
                         @include('layouts.view-tab')
                    </div>

                    <h2>Enrollment History for {{ $student->first_name }} {{ $student->last_name }}</h2>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Academic Year</th>
            <th>Semester</th>
            <th>Enrolled?</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($semesters as $semester)
            @php
                $enrollment = $student->enrollments->where('semester_id', $semester->id)->first();
            @endphp
            <tr>
                <td>{{ $semester->school_year }}</td>
                <td>{{ $semester->semester_name }}</td>
                <td>
                    @if($enrollment && $enrollment->is_enrolled)
                        ✅ Yes
                    @else
                        ❌ No
                    @endif
                </td>
                <td>
                    @if($enrollment && $enrollment->is_enrolled)
                        <form action="{{ route('students.unenroll', [$student->id, $semester->id]) }}" method="POST">
                            @csrf
                            <button type="submit">Unenroll</button>
                        </form>
                    @else
                        <form action="{{ route('students.enroll', [$student->id, $semester->id]) }}" method="POST">
                            @csrf
                            <button type="submit">Enroll</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>




