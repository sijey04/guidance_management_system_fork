<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Academic Setup') }}
        </h2>
       </x-slot>

    <div class="" style="padding-top:0;">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="main-content" style="margin-top: 16px; margin-bottom: 24px; padding-top: 18px;">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-2" style="color:#a82323;">Academic Setup</h1>
                    <div class="bg-[#f8eaea] rounded-md p-4 mb-4">
                        <h3 class="text-lg font-semibold mb-2" style="color:#a82323;">Current Academic Year & Semester</h3>
                        @forelse($semesters as $sem)
                            @if($sem->is_current)
                                <p>
                                    <span class="font-semibold">Academic Year:</span> {{ $sem->school_year }} |
                                    <span class="font-semibold">Semester:</span> {{ $sem->semester }}
                                    <span class="ml-2 bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">Active</span>
                                </p>
                            @endif
                        @empty
                            <p class="text-red-500">No active semester set.</p>
                        @endforelse
                    </div>
                    <p class="text-sm text-gray-500 mt-1 py-2 px-2">Manage and configure the academic years and semesters. You can set which semester is currently active for the system.</p>
                    <div x-data="{ openSemesterModal: {{ $errors->any() ? 'true' : 'false' }} }" class="mb-3 flex justify-between items-center">
                        <h3 class="text-md font-semibold mb-4">List of Academic Years & Semesters</h3>
                        <button @click="openSemesterModal = true" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:10px 18px; font-weight:600;">Add New Semester</button>
                        @include('semester.create')
                    </div>
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white">
                        <table class="w-full border text-sm text-left text-gray-700">
                            <thead style="background:#a82323; color:#fff;">
                                <tr>
                                    <th class="p-3">School Year</th>
                                    <th class="p-3">Semester</th>
                                    <th class="p-3">Status</th>
                                    <th class="p-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($semesters as $sem)
                                    <tr class="border-b hover:bg-[#f8eaea] transition">
                                        <td class="p-3">{{ $sem->school_year }}</td>
                                        <td class="p-3">{{ $sem->semester }}</td>
                                        <td class="p-3">
                                            @if($sem->is_current)
                                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">Active</span>
                                            @else
                                                <span class="text-gray-400 text-xs">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="p-3"> <!-- Actions here if needed --> </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-gray-400 p-3">No semester records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
