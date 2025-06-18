<x-app-layout>
    <x-slot name="header">
        View Profile - {{ $student->first_name }} {{ $student->last_name }}
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Profile for {{ $semester->school_year }} - {{ $semester->semester }}</h2>

        <p><strong>Course & Year:</strong> {{ $profile->course_year ?? 'N/A' }}</p>
        <p><strong>Section:</strong> {{ $profile->section ?? 'N/A' }}</p>
        <p><strong>Enrolled:</strong> {{ $profile->is_enrolled ? 'Yes' : 'No' }}</p>

        <hr class="my-4">

        <p><strong>Home Address:</strong> {{ $student->home_address ?? 'N/A' }}</p>
        <p><strong>Father's Occupation:</strong> {{ $student->father_occupation ?? 'N/A' }}</p>
        <p><strong>Mother's Occupation:</strong> {{ $student->mother_occupation ?? 'N/A' }}</p>
        <p><strong>No. of Sisters:</strong> {{ $student->number_of_sisters ?? 'N/A' }}</p>
        <p><strong>No. of Brothers:</strong> {{ $student->number_of_brothers ?? 'N/A' }}</p>
        <p><strong>Ordinal Position:</strong> {{ $student->ordinal_position ?? 'N/A' }}</p>

        <a href="{{ url()->previous() }}" class="mt-4 inline-block text-blue-600 hover:underline">Back</a>
    </div>
</x-app-layout>
