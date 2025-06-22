<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Referral List</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-4" x-data="{ openModal: false }">
        <!-- Add Referral Button -->
        <button @click="openModal = true" class="bg-green-600 text-white px-4 py-2 rounded mb-4">Add Referral</button>

        <!-- Manage Reasons Button -->
        <a href="{{ route('referral-reasons.index') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded mb-4 ml-4 inline-block">
            Manage Referral Reasons
        </a>

        <!-- Modal included here -->
        @include('referrals.create', ['students' => $students, 'reasons' => $reasons])
    </div>

    <div class="max-w-7xl mx-auto p-4">
        <table class="w-full mt-4 border-collapse border">
            <thead class="bg-gray-200">
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year Level & Section</th>
                    <th>Reason</th>
                    <th>Date</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($referrals as $referral)
                    @php
                        $profile = $referral->student->profiles
                                    ->where('semester_id', \App\Models\Semester::where('is_current', true)->first()?->id)
                                    ->first();
                    @endphp
                    <tr class="border-t">
                        <td>{{ $referral->student->student_id }}</td>
                        <td>{{ $referral->student->first_name }} {{ $referral->student->last_name }}</td>
                        <td>{{ $profile?->course ?? 'N/A' }}</td>
                        <td>{{ $profile?->year_level ?? 'N/A' }}{{ $profile?->section ?? 'N/A' }}</td>
                        <td>{{ $referral->reason }}</td>
                        <td>{{ $referral->referral_date }}</td>
                        <td class="relative text-center">
                        <!-- 3 Dot Button with Alpine.js -->
                        <div x-data="{ open: false }" class="inline-block text-left">
                            <button @click="open = !open" class="text-gray-600 hover:text-gray-800">
                                ⋮
                            </button>

                            <!-- Dropdown -->
                            <div x-show="open" @click.away="open = false" x-transition 
                                 class="absolute right-0 mt-2 w-32 bg-white border rounded shadow z-50">
                                <a href="{{ route('referrals.show', $referral->id) }}" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View</a>
                                <a href="{{ route('referrals.edit', $referral->id) }}" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                                <form action="{{ route('referrals.destroy', $referral->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $referrals->links() }}</div>
    </div>
</x-app-layout>
