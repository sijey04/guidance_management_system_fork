<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Counseling Records') }}
        </h2>
    </x-slot>

    <div class="" style="padding-top:0;">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="main-content" style="margin-top: 16px; margin-bottom: 24px; padding-top: 18px;">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-2" style="color:#a82323;">All Counseling Records</h1>
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white mt-4">
                        <table class="w-full border text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="px-4 py-2">Student Name</th>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Problem Statement</th>
                                    <th class="px-4 py-2">Evaluation</th>
                                    <th class="px-4 py-2">Action Taken</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($counselings as $counseling)
                                    <tr class="hover:bg-[#f8eaea] transition">
                                        <td class="px-4 py-2">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</td>
                                        <td class="px-4 py-2">{{ $counseling->session_date->format('M d, Y') }}</td>
                                        <td class="px-4 py-2">{{ $counseling->statement_of_problem }}</td>
                                        <td class="px-4 py-2">{{ $counseling->evaluation }}</td>
                                        <td class="px-4 py-2">{{ $counseling->recommendation_action_taken }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
