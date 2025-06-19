{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student History Report') }}
        </h2>
    </x-slot>

    <div class="py-6 space-y-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Basic Info -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-2">Student Information</h3>
            <p><strong>Name:</strong> {{ $student->first_name }} {{ $student->last_name }}</p>
            <p><strong>ID:</strong> {{ $student->student_id }}</p>
        </div>

        <!-- Tabs for History -->
        <div x-data="{ tab: 'enrollment' }">
            <div class="flex space-x-4">
                <button @click="tab = 'enrollment'" class="px-4 py-2 bg-gray-200 rounded">Enrollment History</button>
                <button @click="tab = 'profile'" class="px-4 py-2 bg-gray-200 rounded">Profile Records</button>
                <button @click="tab = 'contract'" class="px-4 py-2 bg-gray-200 rounded">Contracts</button>
                <button @click="tab = 'referral'" class="px-4 py-2 bg-gray-200 rounded">Referrals</button>
            </div>

            <!-- Enrollment History Tab -->
            <div x-show="tab === 'enrollment'" class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Enrollment History</h3>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2">School Year</th>
                            <th class="p-2">Semester</th>
                            <th class="p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student->enrollments as $enroll)
                            <tr>
                                <td class="p-2">{{ $enroll->semester->school_year }}</td>
                                <td class="p-2">{{ $enroll->semester->semester }}</td>
                                <td class="p-2">
                                    {{ $enroll->is_enrolled ? 'Enrolled' : 'Not Enrolled' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Profile History Tab -->
            <div x-show="tab === 'profile'" class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Profile Records History</h3>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2">School Year</th>
                            <th class="p-2">Semester</th>
                            <th class="p-2">Course & Year</th>
                            <th class="p-2">Section</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student->profiles as $profile)
                            <tr>
                                <td class="p-2">{{ $profile->semester->school_year }}</td>
                                <td class="p-2">{{ $profile->semester->semester }}</td>
                                <td class="p-2">{{ $profile->course_year }}</td>
                                <td class="p-2">{{ $profile->section }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Contracts Tab -->
            <div x-show="tab === 'contract'" class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Contracts</h3>
                <ul class="list-disc list-inside">
                    @foreach($student->contracts as $contract)
                        <li>{{ $contract->semester->school_year }} {{ $contract->semester->semester }} - {{ $contract->title }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Referrals Tab -->
            <div x-show="tab === 'referral'" class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Referrals</h3>
                <ul class="list-disc list-inside">
                    @foreach($student->referrals as $referral)
                        <li>{{ $referral->semester->school_year }} {{ $referral->semester->semester }} - {{ $referral->reason }}</li>
                    @endforeach
                {{-- </ul> --}}
            </div>
        </div>
    </div>
</x-app-layout> --}}
