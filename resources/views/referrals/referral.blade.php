<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">Referral List</h2>
    </x-slot>

  <div class="">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="main-content">
                <div class="p-6 space-y-6">

            <!-- Page Title & Instruction -->
            <div>
                <h1 class="text-xl font-bold text-red-700">Referral Records</h1>
                <p class="text-sm text-gray-600">
                    This page displays all referral records. You can filter by reason or search by student details. Use the 3-dot menu to view or delete records.
                </p>
            </div>

            <!-- Actions -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="flex flex-wrap gap-3">
                    <div x-data="{ openModal: false }">
                        <button @click="openModal = true"
                                class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 transition text-sm font-semibold">
                            Add Referral
                        </button>
                        <a href="{{ route('referral-reasons.index') }}"
                           class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 transition text-sm font-semibold">
                            Manage Reasons
                        </a>
                        @include('referrals.create', ['students' => $students, 'reasons' => $reasons])
                    </div>
                </div>

                <!-- Filter/Search -->
                <form method="GET" action="{{ route('referrals.index') }}" id="filterForm"
                      class="flex flex-wrap gap-4 items-end w-full md:w-auto">
                    <div>
                        <label class="block text-xs text-gray-600 mb-1">Filter by Reason:</label>
                        <select name="reason" onchange="this.form.submit()"
                                class="border-gray-300 rounded px-3 py-2 text-sm w-48">
                            <option value="">All Reasons</option>
                            @foreach($reasons as $reason)
                                <option value="{{ $reason->reason }}" {{ request('reason') == $reason->reason ? 'selected' : '' }}>
                                    {{ $reason->reason }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label class="block text-xs text-gray-600 mb-1">Search Student:</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Search by ID or Name"
                               class="border-gray-300 rounded px-3 py-2 text-sm w-full md:w-64"
                               oninput="this.form.requestSubmit()" />
                    </div>
                </form>
            </div>

            <!-- Referrals Table -->
             <div class="overflow-x-auto border border-gray-200 rounded-lg mt-4">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead style="background:#a82323;" class="text-white text-left">
                        <tr>
                            <th class="px-4 py-2">A.Y</th>
                            <th class="px-4 py-2">Semester</th>
                            <th class="px-4 py-2">Student ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Course</th>
                            <th class="px-4 py-2">Year & Section</th>
                            <th class="px-4 py-2">Reason</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($referrals as $referral)
                            @php
                                $profile = $referral->student->profiles->where('semester_id', $referral->semester_id)->first()
                                        ?? $referral->student->profiles->sortByDesc('semester_id')->first();
                            @endphp
                            <tr class="hover:bg-[#f8eaea] transition">
                                <td class="px-4 py-2">{{ $referral->semester?->schoolYear?->school_year ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $referral->semester?->semester ?? 'N/A' }} Sem</td>
                                <td class="px-4 py-2">{{ $referral->student->student_id }}</td>
                                <td class="px-4 py-2">{{ $referral->student->first_name }} {{ $referral->student->last_name }}</td>
                                <td class="px-4 py-2">{{ $profile?->course ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $profile?->year_level ?? 'N/A' }} {{ $profile?->section ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $referral->reason }}</td>
                                <td class="px-4 py-2">
                                    {{ $referral->referral_date ? \Carbon\Carbon::parse($referral->referral_date)->format('F j, Y') : 'N/A' }}
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <div x-data="{ open: false }" class="relative">
                                        <button @click="open = !open"
                                            class="text-gray-600 hover:text-gray-900 focus:outline-none">
                                            ⋮
                                        </button>
                                        <div x-show="open" @click.away="open = false" x-transition
                                             class="absolute right-0 mt-2 w-32 bg-white shadow border rounded z-10">
                                            <a href="{{ route('referrals.view', ['id' => $referral->id, 'source' => 'referral']) }}"
                                              >
                                                <button type="submit"
                                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                    View
                                                </button>
                                            </a>
                                            <form action="{{ route('referrals.destroy', $referral->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this referral?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4 px-4 py-2 flex justify-center">
                    {{ $referrals->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
     </div>
    </div>
</x-app-layout>
