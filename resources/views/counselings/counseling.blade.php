<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">All Counseling Records</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-4" x-data="{ openModal: false }">
        <!-- Create Counseling Button -->
        <button @click="openModal = true" class="bg-green-600 text-white px-4 py-2 rounded mb-4">
            Create Counseling
        </button>

        <!-- Include Modal (pass Alpine's scope) -->
        @include('counselings.create', ['students' => $students])

        <!-- Counseling Table -->
        <table class="w-full mt-4 border-collapse border text-center text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-2 py-1">Student ID</th>
                    <th class="border px-2 py-1">Name</th>
                    <th class="border px-2 py-1">Course</th>
                    <th class="border px-2 py-1">Year</th>
                    <th class="border px-2 py-1">Section</th>
                    <th class="border px-2 py-1">Counseling Date</th>
                    <th class="border px-2 py-1"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($counselings as $counseling)
                    @php
                        $profile = $counseling->student->profiles
                            ->where('semester_id', \App\Models\Semester::where('is_current', true)->first()?->id)
                            ->first();
                    @endphp
                    <tr>
                        <td class="border px-2 py-1">{{ $counseling->student->student_id }}</td>
                        <td class="border px-2 py-1">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                        <td class="border px-2 py-1">{{ $profile?->course ?? 'N/A' }}</td>
                        <td class="border px-2 py-1">{{ $profile?->year_level ?? 'N/A' }}</td>
                        <td class="border px-2 py-1">{{ $profile?->section ?? 'N/A' }}</td>
                        <td class="border px-2 py-1">{{ $counseling->counseling_date }}</td>
                        <!-- Inside your <tbody> foreach loop -->
                        <td class="border px-2 py-1 relative">
                            <div x-data="{ openDropdown: false }" class="relative">
                                <button @click="openDropdown = !openDropdown" class="px-2 py-1 text-gray-600 hover:text-gray-800">
                                    &#x22EE; <!-- Vertical 3 dots -->
                                </button>
                                <div x-show="openDropdown" @click.away="openDropdown = false"
                                    class="absolute right-0 bg-white border shadow rounded mt-2 z-10 w-32">
                                    <!-- View Button -->
                                    <a href="{{ route('counselings.show', $counseling->id) }}" 
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View</a>

                                    <!-- Edit Button - triggers Edit Modal -->
                                    <button @click="$dispatch('open-edit-modal', { counseling: @json($counseling) })"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Edit
                                    </button>

                                    <!-- Delete Form -->
                                    <form method="POST" action="{{ route('counselings.destroy', $counseling->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this record?')"
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

        <div class="mt-4">{{ $counselings->links() }}</div>
    </div>
</x-app-layout>
