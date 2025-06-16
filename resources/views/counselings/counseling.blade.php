<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Counseling Records') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">Student Name</th>
                                <th class="border px-4 py-2">Date</th>
                                <th class="border px-4 py-2">Problem Statement</th>
                                <th class="border px-4 py-2">Evaluation</th>
                                <th class="border px-4 py-2">Action Taken</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counselings as $counseling)
                                <tr>
                                    <td class="border px-4 py-2">
                                        {{ $counseling->student->first_name }} {{ $counseling->student->last_name }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ $counseling->session_date->format('M d, Y') }}
                                    </td>
                                    <td class="border px-4 py-2">{{ $counseling->statement_of_problem }}</td>
                                    <td class="border px-4 py-2">{{ $counseling->evaluation }}</td>
                                    <td class="border px-4 py-2">{{ $counseling->recommendation_action_taken }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
