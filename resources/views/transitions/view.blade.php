<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Student Movement Details</h2>
    </x-slot>

    <div class="py-6 px-4 max-w-4xl mx-auto" x-data="{ openEditModal: false }">
        <div class="bg-white p-6 rounded shadow text-sm">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-red-700">
                    {{ $transition->last_name }}, {{ $transition->first_name }} {{ $transition->middle_name }}
                </h3>

                <div class="flex gap-2">
                    <button @click="openEditModal = true"
                        class="text-blue-600 font-medium hover:underline">Edit</button>

                    <form action="{{ route('transitions.destroy', $transition) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this record?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 font-medium hover:underline">Delete</button>
                    </form>
                </div>
            </div>

            <!-- Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <strong>Movement Type:</strong>
                    <div>{{ $transition->transition_type }}</div>
                </div>

                <div>
                    <strong>Movement Date:</strong>
                    <div>{{ \Carbon\Carbon::parse($transition->transition_date)->format('F d, Y') }}</div>
                </div>

                <div>
                    <strong>From Course/College/School:</strong>
                    <div>{{ $transition->from_program }}</div>
                </div>

                <div>
                    <strong>To Course/College/School:</strong>
                    <div>{{ $transition->to_program }}</div>
                </div>

                {{-- <div class="md:col-span-2">
                    <strong>Reason for Leaving:</strong>
                    <p class="mt-1 text-gray-700">{{ $transition->reason_leaving }}</p>
                </div>

                <div class="md:col-span-2">
                    <strong>Reason for Entering:</strong>
                    <p class="mt-1 text-gray-700">{{ $transition->reason_returning }}</p>
                </div>

                <div class="md:col-span-2">
                    <strong>Leave/Drop Reason (if any):</strong>
                    <p class="mt-1 text-gray-700">{{ $transition->leave_reason }}</p>
                </div> --}}

                <div class="md:col-span-2">
                    <strong>Counselor Notes:</strong>
                    <p class="mt-1 text-gray-700">{{ $transition->remark }}</p>
                </div>
            </div>

            <!-- Modal Include -->
            @include('transitions.edit', ['transition' => $transition])

            <div class="mt-6">
                <a href="{{ route('transitions.index') }}" class="text-sm text-blue-600 hover:underline">
                    ← Back to Movement Records
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
