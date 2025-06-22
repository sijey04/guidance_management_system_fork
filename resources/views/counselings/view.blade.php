<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">View Counseling Record</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-4">
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-bold mb-4">Student: {{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</h3>
            <p><strong>Student ID:</strong> {{ $counseling->student->student_id }}</p>
            <p><strong>Counseling Date:</strong> {{ $counseling->counseling_date }}</p>
            <p><strong>Image:</strong></p>
            @if($counseling->image_path)
                <img src="{{ asset('storage/' . $counseling->image_path) }}" alt="Counseling Image" class="w-64 mt-2">
            @else
                <p>No image attached.</p>
            @endif
            <a href="{{ route('counselings.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">Back</a>
        </div>
    </div>
</x-app-layout>
