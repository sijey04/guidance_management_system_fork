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

        <div class="bg-white shadow rounded-lg overflow-hidden">
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

                                <div x-data="{ openViewCounselingModal_{{ $counseling->id }}: {{ $isOpen }} }">

                                    <button @click="openViewCounselingModal_{{ $counseling->id }} = true"
                                            class="text-blue-600 hover:underline">
                                        View
                                    </button>
                                    @include('counselings.view', ['counseling' => $counseling])
                                </div>
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
