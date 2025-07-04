<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">All Counseling Records</h2>
    </x-slot>

    
    <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="flex justify-end mb-4" x-data="{ openModal: false }">
            <button @click="openModal = true"
                    class="bg-red-700 text-white px-4 py-2 rounded font-semibold hover:bg-red-800">
                Create Counseling
            </button>

            @include('counselings.create', ['students' => $students])
        </div>

        <div class="bg-white shadow rounded-lg overflow">
            <table class="min-w-full text-sm text-gray-800 border">
                <thead class="bg-red-700 text-white">
                    <tr>
                        <th class="px-4 py-3">Student ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Course</th>
                        <th class="px-4 py-3">Year</th>
                        <th class="px-4 py-3">Section</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Counseling Date</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($counselings as $counseling)
                        @php
                            $profile = $counseling->student->profiles->where('semester_id', $counseling->semester_id)->first();
                            if (!$profile) {
                                $profile = $counseling->student->profiles->sortByDesc('semester_id')->first();
                            }
                            $isOpen = request('view_id') == $counseling->id ? 'true' : 'false';
                        @endphp
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $counseling->student->student_id }}</td>
                            <td class="px-4 py-3">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                            <td class="px-4 py-3">{{ $profile?->course ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ $profile?->year_level ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ $profile?->section ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full font-semibold
                                    {{ $counseling->status === 'Completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $counseling->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($counseling->counseling_date)->format('M d, Y') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">
                               @php
                                    $isOpen = request('view_id') == $counseling->id ? 'true' : 'false';
                                @endphp

                                <td class="px-4 py-3 text-sm text-gray-700 relative" x-data="{ open: false }">
                                <!-- 3-dot icon button -->
                                <button @click="open = !open"
                                        class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v.01M12 12v.01M12 18v.01" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div x-show="open" @click.away="open = false"
                                    class="absolute right-0 mt-2 w-36 bg-white border border-gray-200 rounded-md shadow-lg z-10 text-left">
                                    <a href="{{ route('counseling.view', ['id' => $counseling->id, 'source' => 'counseling']) }}"
                                        class="text-blue-600 hover:underline">
                                        View
                                        </a>


                                    <form action="{{ route('counseling.destroy', $counseling->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this counseling record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

           @if(method_exists($counselings, 'links'))
    <div class="p-4">
        {{ $counselings->links() }}
    </div>
@endif

        </div>
    </div>
</x-app-layout>
