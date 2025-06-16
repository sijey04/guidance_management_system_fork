<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Academic Setup') }}
        </h2>
       </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-gray-600 dark:bg-gray-500 rounded-md p-4 mb-4">
                    <h3 class="text-lg font-semibold text-white mb-2">Current Academic Year & Semester</h3>
                    @forelse($semesters as $sem)
                        @if($sem->is_current)
                            <p class="text-white">
                                <span class="font-semibold">Academic Year:</span> {{ $sem->school_year }} |
                                <span class="font-semibold">Semester:</span> {{ $sem->semester }}
                                <span class="ml-2 bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">Active</span>
                            </p>
                        @endif
                    @empty
                        <p class="text-red-500">No active semester set.</p>
                    @endforelse
                </div>
                <p class="text-sm text-gray-500 mt-1 py-2 px-5">Manage and configure the academic years and semesters. You can set which semester is currently active for the system.</p>
                    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <div x-data="{ openSemesterModal: {{ $errors->any() ? 'true' : 'false' }} }" class=" mb-3 flex justify-between items-center">
                        <h3 class="text-md font-semibold mb-4">List of Academic Years & Semesters</h3>
                            <x-secondary-button @click="openSemesterModal = true">
                                Add New Semester
                            </x-secondary-button>
                    @include('semester.create')
                </div>
                    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-white bg-gray-600 dark:bg-gray-500">
                                <tr>
                                    <th class="p-3">School Year</th>
                                    <th class="p-3">Semester</th>
                                    <th class="p-3">Status</th>
                                    <th class="p-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($semesters as $sem)
                                    <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="p-3">{{ $sem->school_year }}</td>
                                        <td class="p-3">{{ $sem->semester }}</td>
                                        <td class="p-3">
                                            @if($sem->is_current)
                                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">Active</span>
                                            @else
                                                <span class="text-gray-400 text-xs">Inactive</span>
                                            @endif
                                        </td>
                                        
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
