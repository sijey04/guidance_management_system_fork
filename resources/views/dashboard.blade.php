<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        /* Card animations and hover effects */
        .stat-card {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .stat-card-students {
            border-left-color: #ef4444;
        }
        .stat-card-contracts {
            border-left-color: #10b981;
        }
        .stat-card-referrals {
            border-left-color: #3b82f6;
        }
        .stat-card-counselings {
            border-left-color: #f59e0b;
        }
        
        /* Activity list styling */
        .activity-item {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            padding-left: 10px;
        }
        .activity-item:hover {
            background-color: #f9fafb;
            border-left-color: #a82323;
        }
        
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #a82323;
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
        
        /* Banner animation */
        .welcome-banner {
            background: linear-gradient(135deg, #ffffff 0%, #f3f4f6 100%);
            background-size: 200% 200%;
            animation: gradientBG 15s ease infinite;
        }
        @keyframes gradientBG {
            0% { background-position: 0% 50% }
            50% { background-position: 100% 50% }
            100% { background-position: 0% 50% }
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Banner -->
            <div class="welcome-banner overflow-hidden shadow-md rounded-xl mb-6 border border-gray-100">
                <div class="flex flex-col md:flex-row justify-between p-6 items-center gap-4">
                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-br from-red-600 to-red-700 text-white p-4 rounded-full shadow-lg">
                            <i class="fas fa-tachometer-alt fa-2x"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}!</div>
                            <p class="text-gray-600">{{ date('l, F jS, Y') }}</p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

            <!-- System Status Banner (if needed) -->
            @if($globalActiveSchoolYear && $globalActiveSemester)
                <div class="bg-gradient-to-r from-green-50 to-teal-50 border border-green-200 rounded-lg px-6 py-4 mb-6 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="bg-green-100 p-2 rounded-full">
                            <i class="fas fa-check-circle text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-green-800">System Active</h3>
                            <p class="text-sm text-green-600">
                                Current School Year: <span class="font-semibold">{{ $globalActiveSchoolYear->school_year }}</span> | 
                                Semester: <span class="font-semibold">{{ $globalActiveSemester->semester }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Students -->
                <a href="{{ route('student.index') }}" class="block">
                    <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4 stat-card stat-card-students hover:cursor-pointer">
                        <div class="bg-red-100 p-4 rounded-full text-red-600 shadow-sm">
                            <i class="fas fa-user-graduate fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Students</p>
                            <h3 class="text-2xl font-bold">{{ $totalStudents ?? '0' }}</h3>
                        </div>
                    </div>
                </a>

                <!-- Total Contracts -->
                <a href="{{ route('contracts.index') }}" class="block">
                    <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4 stat-card stat-card-contracts hover:cursor-pointer">
                        <div class="bg-green-100 p-4 rounded-full text-green-600 shadow-sm">
                            <i class="fas fa-file-contract fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Contracts</p>
                            <h3 class="text-2xl font-bold">{{ $totalContracts ?? '0' }}</h3>
                        </div>
                    </div>
                </a>

                <!-- Total Referrals -->
                <a href="{{ route('referrals.index') }}" class="block">
                    <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4 stat-card stat-card-referrals hover:cursor-pointer">
                        <div class="bg-blue-100 p-4 rounded-full text-blue-600 shadow-sm">
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Referrals</p>
                            <h3 class="text-2xl font-bold">{{ $totalReferrals ?? '0' }}</h3>
                        </div>
                    </div>
                </a>

                <!-- Total Counselings -->
                <a href="{{ route('counselings.index') }}" class="block">
                    <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4 stat-card stat-card-counselings hover:cursor-pointer">
                        <div class="bg-yellow-100 p-4 rounded-full text-yellow-600 shadow-sm">
                            <i class="fas fa-comments fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Counselings</p>
                            <h3 class="text-2xl font-bold">{{ $totalCounselings ?? '0' }}</h3>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Optional: Recent Activity or Graph here -->
<!-- Recent Activities Section -->
<div class="mt-8 space-y-8">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Recent Activities</h2>
        <a href="{{ route('report') }}" class="text-sm text-red-700 hover:text-red-800 font-medium flex items-center">
            View Reports
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    <div x-data="{ activeTab: 'contracts' }" class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Tabs -->
        <div class="border-b border-gray-200 px-4">
            <nav class="flex space-x-6 overflow-x-auto custom-scrollbar" aria-label="Tabs">
                <button @click="activeTab = 'contracts'" :class="{'text-red-700 border-b-2 border-red-700 font-semibold': activeTab === 'contracts', 'text-gray-500 hover:text-gray-700': activeTab !== 'contracts'}" class="py-4 px-1 text-sm whitespace-nowrap focus:outline-none">
                    <i class="fas fa-file-contract mr-2"></i>Contracts
                </button>
                <button @click="activeTab = 'referrals'" :class="{'text-red-700 border-b-2 border-red-700 font-semibold': activeTab === 'referrals', 'text-gray-500 hover:text-gray-700': activeTab !== 'referrals'}" class="py-4 px-1 text-sm whitespace-nowrap focus:outline-none">
                    <i class="fas fa-handshake mr-2"></i>Referrals
                </button>
                <button @click="activeTab = 'counselings'" :class="{'text-red-700 border-b-2 border-red-700 font-semibold': activeTab === 'counselings', 'text-gray-500 hover:text-gray-700': activeTab !== 'counselings'}" class="py-4 px-1 text-sm whitespace-nowrap focus:outline-none">
                    <i class="fas fa-comments mr-2"></i>Counselings
                </button>
            </nav>
        </div>

        <!-- Tab content -->
        <div class="p-6">
            <!-- Contracts Tab -->
            <div x-show="activeTab === 'contracts'">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-lg text-gray-700">Recent Contracts</h3>
                    <a href="{{ route('contracts.index') }}" class="text-xs text-red-600 hover:text-red-800 font-medium">View All</a>
                </div>
                <ul class="space-y-3 max-h-80 overflow-y-auto custom-scrollbar">
                    @forelse($recentContracts as $contract)
                        <li class="flex justify-between py-2 px-3 activity-item rounded">
                            <div class="flex items-center space-x-3">
                                <div class="bg-green-100 p-2 rounded-full text-green-600">
                                    <i class="fas fa-file-signature"></i>
                                </div>
                                <span class="font-medium">{{ $contract->student->first_name }} {{ $contract->student->last_name }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($contract->contract_date)->format('M d, Y') }}</span>
                            </div>
                        </li>
                    @empty
                        <li class="text-gray-400 italic flex justify-center items-center py-8">
                            <div class="text-center">
                                <i class="fas fa-folder-open text-gray-300 text-3xl mb-2"></i>
                                <p>No recent contracts</p>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>

            <!-- Referrals Tab -->
            <div x-show="activeTab === 'referrals'" x-cloak>
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-lg text-gray-700">Recent Referrals</h3>
                    <a href="{{ route('referrals.index') }}" class="text-xs text-red-600 hover:text-red-800 font-medium">View All</a>
                </div>
                <ul class="space-y-3 max-h-80 overflow-y-auto custom-scrollbar">
                    @forelse($recentReferrals as $referral)
                        <li class="flex justify-between py-2 px-3 activity-item rounded">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-100 p-2 rounded-full text-blue-600">
                                    <i class="fas fa-user-clock"></i>
                                </div>
                                <span class="font-medium">{{ $referral->student->first_name }} {{ $referral->student->last_name }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($referral->referral_date)->format('M d, Y') }}</span>
                            </div>
                        </li>
                    @empty
                        <li class="text-gray-400 italic flex justify-center items-center py-8">
                            <div class="text-center">
                                <i class="fas fa-folder-open text-gray-300 text-3xl mb-2"></i>
                                <p>No recent referrals</p>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>

            <!-- Counselings Tab -->
            <div x-show="activeTab === 'counselings'" x-cloak>
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-lg text-gray-700">Recent Counselings</h3>
                    <a href="{{ route('counselings.index') }}" class="text-xs text-red-600 hover:text-red-800 font-medium">View All</a>
                </div>
                <ul class="space-y-3 max-h-80 overflow-y-auto custom-scrollbar">
                    @forelse($recentCounselings as $counseling)
                        <li class="flex justify-between py-2 px-3 activity-item rounded">
                            <div class="flex items-center space-x-3">
                                <div class="bg-yellow-100 p-2 rounded-full text-yellow-600">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <span class="font-medium">{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($counseling->counseling_date)->format('M d, Y') }}</span>
                            </div>
                        </li>
                    @empty
                        <li class="text-gray-400 italic flex justify-center items-center py-8">
                            <div class="text-center">
                                <i class="fas fa-folder-open text-gray-300 text-3xl mb-2"></i>
                                <p>No recent counseling records</p>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <!-- Quick Access Links -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-red-50 to-white rounded-xl shadow-md p-5 hover-card border border-red-100 hover:border-red-300">
            <div class="flex items-center justify-between mb-3">
                <div class="bg-red-100 p-3 rounded-lg text-red-700">
                    <i class="fas fa-user-plus fa-lg"></i>
                </div>
                <span class="text-xs text-red-600 font-medium px-2 py-1 bg-red-50 rounded-full">Quick Access</span>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Add New Student</h3>
            <p class="text-sm text-gray-600 mb-3">Register a new student in the system</p>
            <a href="{{ route('student.create') }}" class="text-red-700 text-sm font-semibold hover:text-red-800 flex items-center">
                Add Student <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </a>
        </div>
        
        <div class="bg-gradient-to-br from-green-50 to-white rounded-xl shadow-md p-5 hover-card border border-green-100 hover:border-green-300">
            <div class="flex items-center justify-between mb-3">
                <div class="bg-green-100 p-3 rounded-lg text-green-700">
                    <i class="fas fa-file-signature fa-lg"></i>
                </div>
                <span class="text-xs text-green-600 font-medium px-2 py-1 bg-green-50 rounded-full">Quick Access</span>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Create Contract</h3>
            <p class="text-sm text-gray-600 mb-3">Generate a new student contract</p>
            <a href="{{ route('contracts.index') }}" class="text-green-700 text-sm font-semibold hover:text-green-800 flex items-center">
                New Contract <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </a>
        </div>
        
        <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl shadow-md p-5 hover-card border border-blue-100 hover:border-blue-300">
            <div class="flex items-center justify-between mb-3">
                <div class="bg-blue-100 p-3 rounded-lg text-blue-700">
                    <i class="fas fa-hand-pointer fa-lg"></i>
                </div>
                <span class="text-xs text-blue-600 font-medium px-2 py-1 bg-blue-50 rounded-full">Quick Access</span>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Make Referral</h3>
            <p class="text-sm text-gray-600 mb-3">Create a new student referral</p>
            <a href="{{ route('referrals.index') }}" class="text-blue-700 text-sm font-semibold hover:text-blue-800 flex items-center">
                New Referral <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </a>
        </div>
        
        <div class="bg-gradient-to-br from-yellow-50 to-white rounded-xl shadow-md p-5 hover-card border border-yellow-100 hover:border-yellow-300">
            <div class="flex items-center justify-between mb-3">
                <div class="bg-yellow-100 p-3 rounded-lg text-yellow-700">
                    <i class="fas fa-chart-line fa-lg"></i>
                </div>
                <span class="text-xs text-yellow-600 font-medium px-2 py-1 bg-yellow-50 rounded-full">Quick Access</span>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Generate Report</h3>
            <p class="text-sm text-gray-600 mb-3">View and export system reports</p>
            <a href="{{ route('report') }}" class="text-yellow-700 text-sm font-semibold hover:text-yellow-800 flex items-center">
                View Reports <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </a>
        </div>
    </div>
</div>

        </div>
    </div>

    <!-- Help & Resources Section -->
    <div class="fixed bottom-6 right-6">
        <div x-data="{ showHelp: false }" class="relative">
            <button @click="showHelp = !showHelp" 
                    class="bg-red-700 hover:bg-red-800 text-white rounded-full p-3 shadow-lg transition-all duration-300 focus:outline-none">
                <i class="fas fa-lightbulb fa-lg"></i>
            </button>

            <div x-show="showHelp" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 @click.away="showHelp = false" 
                 class="absolute bottom-full right-0 mb-2 w-72 bg-white rounded-lg shadow-xl p-4 text-sm"
                 style="z-index: 50;">
                <h4 class="font-bold text-red-700 border-b pb-2 mb-2">Quick Navigation Guide</h4>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <i class="fas fa-user-graduate text-red-700 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>View and manage <a href="{{ route('student.index') }}" class="text-red-700 hover:underline">students</a></span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-file-contract text-red-700 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Create or view student <a href="{{ route('contracts.index') }}" class="text-red-700 hover:underline">contracts</a></span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-handshake text-red-700 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Process student <a href="{{ route('referrals.index') }}" class="text-red-700 hover:underline">referrals</a></span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-comments text-red-700 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Manage <a href="{{ route('counselings.index') }}" class="text-red-700 hover:underline">counseling sessions</a></span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-cog text-red-700 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>Configure <a href="{{ route('semester.index') }}" class="text-red-700 hover:underline">academic settings</a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
