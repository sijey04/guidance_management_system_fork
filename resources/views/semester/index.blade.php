<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">Academic Setup</h2>
    </x-slot>
    
    <style>
        /* Fix sidebar overlap issues */
        @media (min-width: 768px) {
            .main-content {
                margin-left: 16rem !important; /* 16rem = 256px sidebar width */
                width: calc(100% - 16rem) !important;
            }
        }
        
        /* Enhanced table styling */
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        
        /* Improve form controls */
        input, select {
            transition: all 0.2s ease;
        }
        
        /* Fix dropdown positioning */
        .relative .absolute {
            z-index: 50;
        }
        
        /* Card hover effect */
        .hover-card {
            transition: all 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        /* Status badge styles */
        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-weight: 600;
        }
        .active-badge {
            background-color: #dcfce7;
            color: #166534;
        }
        .inactive-badge {
            background-color: #f3f4f6;
            color: #4b5563;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ openSemesterModal: false, openSchoolYearModal: false }">
            <div class="bg-white rounded-lg shadow-lg p-6 space-y-6">

                <!-- Header Section -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-gray-200 pb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-red-600 mb-2">Academic Setup</h1>
                        @if($activeSchoolYear && $activeSemester)
                            <p class="text-gray-700 flex items-center flex-wrap gap-1">
                                <span class="px-3 py-1 bg-gray-100 rounded-full text-gray-800 font-medium"><strong>Active Academic Year:</strong> {{ $activeSchoolYear->school_year }}</span>
                                <span class="px-3 py-1 bg-gray-100 rounded-full text-gray-800 font-medium"><strong>Semester:</strong> {{ $activeSemester->semester }}</span>
                                <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs font-bold">Active</span>
                            </p>
                        @else
                            <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded">
                                <p class="text-red-500 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    No active School Year or Semester set.
                                </p>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-2">
                        <button @click="openSchoolYearModal = true"
                                class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition duration-150 ease-in-out flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add School Year
                        </button>
                        <button @click="openSemesterModal = true"
                                class="bg-[#a82323] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition duration-150 ease-in-out flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add Semester
                        </button>
                    </div>
                </div>

                <!-- Modals -->
                @include('semester.createSchoolYear')
                @include('semester.create')

                <!-- Validate Students Section -->
                @if($activeSemester)
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 pt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-800">Student Validation</h3>
                                <div class="mt-2 text-sm text-blue-700">
                                    <p>Validate students from previous semester to carry them over to the current active semester.</p>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('semester.validate', $activeSemester->id) }}"
                                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Validate Students
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- School Years Table -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">School Years & Semesters</h3>
                    <p class="text-sm text-gray-500 mb-4">Below is a list of all registered school years and their respective semesters. Active ones are highlighted.</p>

                    <div class="overflow-x-auto border rounded-lg shadow">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead class="text-white">
                                <tr style="background:#a82323;">
                                    <th class="p-3">School Year</th>
                                    <th class="p-3">Semesters</th>
                                    <th class="p-3">Status</th>
                                    <th class="p-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($schoolYears as $sy)
                                    <tr class="bg-white hover:bg-gray-50 transition">
                                        <td class="p-3 font-medium">{{ $sy->school_year }}</td>
                                        <td class="p-3">
                                            <div class="flex flex-wrap gap-2">
                                                @foreach($sy->semesters as $sem)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $sem->is_current ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                        {{ $sem->semester }}
                                                        @if($sem->is_current)
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                            </svg>
                                                        @endif
                                                    </span>
                                                @endforeach
                                                @if($sy->semesters->isEmpty())
                                                    <span class="text-gray-400 italic">No semesters added</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="p-3">
                                            <span class="status-badge {{ $sy->is_active ? 'active-badge' : 'inactive-badge' }}">
                                                {{ $sy->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="p-3">
                                            @if(!$sy->is_active)
                                                <form action="{{ route('school-years.activate', $sy->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-sm text-blue-600 hover:text-blue-800 mr-2">
                                                        Set as Active
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-4 text-center text-gray-500 italic">
                                            No school years have been created yet. Click "Add School Year" to get started.
                                        </td>
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
