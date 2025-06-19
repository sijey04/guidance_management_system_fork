<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Contract') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md">
            <h3 class="text-lg font-semibold mb-4">Contract Details</h3>
            <p><strong>Student:</strong> {{ $contract->student->first_name }} {{ $contract->student->last_name }}</p>
            <p><strong>Status:</strong> {{ $contract->status }}</p>
            <p><strong>Contract Date:</strong> {{ $contract->contract_date }}</p>
            <p><strong>Total Days:</strong> {{ $contract->total_days ?? 'N/A' }}</p>
            <p><strong>Completed Days:</strong> {{ $contract->completed_days ?? 'N/A' }}</p>
            
            @if($contract->contract_image)
                <p class="mt-4"><strong>Contract Image:</strong></p>
                <img src="{{ asset('storage/' . $contract->contract_image) }}" alt="Contract Image" class="mt-2 rounded w-1/2">
            @else
                <p>No image available.</p>
            @endif

            <div class="mt-4">
                <a href="{{ route('contracts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>
