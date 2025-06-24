<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="flex justify-between p-6 items-center">
                    <div class="flex flex-col">
                        <div class="text-2xl font-semibold text-gray-800">Welcome, {{ Auth::user()->name }}!</div>
                        <p class="text-gray-600">{{ date('l, F jS, Y') }}</p>
                    </div>
                    <form action="" method="GET" class="w-1/3">
                        <div class="relative">
                            <input type="search" name="query" placeholder="Search..." class="w-full p-2 pl-4 pr-10 border rounded focus:ring-2 focus:ring-red-600">
                            <button type="submit" class="absolute top-0 right-0 p-2 text-gray-500 hover:text-red-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Students -->
                <div class="bg-white shadow rounded-lg p-6 flex items-center space-x-4">
                    <div class="bg-red-100 p-4 rounded-full text-red-600">
                        <i class="fas fa-user-graduate fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Students</p>
                        <h3 class="text-xl font-semibold">{{ $totalStudents ?? '0' }}</h3>
                    </div>
                </div>

                <!-- Total Contracts -->
                <div class="bg-white shadow rounded-lg p-6 flex items-center space-x-4">
                    <div class="bg-green-100 p-4 rounded-full text-green-600">
                        <i class="fas fa-file-contract fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Contracts</p>
                        <h3 class="text-xl font-semibold">{{ $totalContracts ?? '0' }}</h3>
                    </div>
                </div>

                <!-- Total Referrals -->
                <div class="bg-white shadow rounded-lg p-6 flex items-center space-x-4">
                    <div class="bg-blue-100 p-4 rounded-full text-blue-600">
                        <i class="fas fa-handshake fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Referrals</p>
                        <h3 class="text-xl font-semibold">{{ $totalReferrals ?? '0' }}</h3>
                    </div>
                </div>

                <!-- Total Counselings -->
                <div class="bg-white shadow rounded-lg p-6 flex items-center space-x-4">
                    <div class="bg-yellow-100 p-4 rounded-full text-yellow-600">
                        <i class="fas fa-comments fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Counselings</p>
                        <h3 class="text-xl font-semibold">{{ $totalCounselings ?? '0' }}</h3>
                    </div>
                </div>
            </div>

            <!-- Optional: Recent Activity or Graph here -->
{{-- Recent Activities --}}
<div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- Recent Contracts -->
    <div class="bg-white rounded-lg shadow p-4">
        <h3 class="font-semibold text-lg text-gray-700 mb-4 border-b pb-2">Recent Contracts</h3>
        <ul class="space-y-2 text-sm">
            @forelse($recentContracts as $contract)
                <li class="flex justify-between">
                    <span>{{ $contract->student->first_name }} {{ $contract->student->last_name }}</span>
                    <span class="text-gray-500">{{ \Carbon\Carbon::parse($contract->contract_date)->format('M d, Y') }}</span>
                </li>
            @empty
                <li class="text-gray-400 italic">No recent contracts.</li>
            @endforelse
        </ul>
    </div>

    <!-- Recent Referrals -->
    <div class="bg-white rounded-lg shadow p-4">
        <h3 class="font-semibold text-lg text-gray-700 mb-4 border-b pb-2">Recent Referrals</h3>
        <ul class="space-y-2 text-sm">
            @forelse($recentReferrals as $referral)
                <li class="flex justify-between">
                    <span>{{ $referral->student->first_name }} {{ $referral->student->last_name }}</span>
                    <span class="text-gray-500">{{ \Carbon\Carbon::parse($referral->referral_date)->format('M d, Y') }}</span>
                </li>
            @empty
                <li class="text-gray-400 italic">No recent referrals.</li>
            @endforelse
        </ul>
    </div>

    <!-- Recent Counselings -->
    <div class="bg-white rounded-lg shadow p-4">
        <h3 class="font-semibold text-lg text-gray-700 mb-4 border-b pb-2">Recent Counselings</h3>
        <ul class="space-y-2 text-sm">
            @forelse($recentCounselings as $counseling)
                <li class="flex justify-between">
                    <span>{{ $counseling->student->first_name }} {{ $counseling->student->last_name }}</span>
                    <span class="text-gray-500">{{ \Carbon\Carbon::parse($counseling->counseling_date)->format('M d, Y') }}</span>
                </li>
            @empty
                <li class="text-gray-400 italic">No recent counselings.</li>
            @endforelse
        </ul>
    </div>

</div>

        </div>
    </div>
</x-app-layout>
