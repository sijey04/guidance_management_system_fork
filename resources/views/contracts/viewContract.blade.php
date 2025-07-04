<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8" x-data="{ zoomedImage: null }">

        <a href="{{ $source === 'report' ? route('report') : route('contracts.index') }}"
            class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm px-4 py-2 rounded mb-6">
                ← Back to {{ $source === 'report' ? 'Reports' : 'Contracts' }}
            </a>


        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-red-700 mb-6">Contract Details</h2>
            <!-- Delete Button -->
            <form action="{{ route('contracts.destroy', $contract->id) }}"
                method="POST"
                onsubmit="return confirm('Are you sure you want to delete this counseling record?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline ml-2">
                    Delete
                </button>
            </form>
        </div>
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 text-sm rounded px-4 py-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Status --}}
        @if(empty($readonly))
            <form method="POST" action="{{ route('contract.updateStatus', $contract->id) }}" class="mb-6">
                @csrf
                @method('PATCH')
                <div class="flex items-center justify-between border p-4 rounded-lg bg-gray-50">
                    <div>
                        <span class="font-semibold text-sm text-gray-700">Current Status:</span>
                        <span class="ml-2 px-3 py-1 rounded-full text-xs font-semibold
                            {{ $contract->status === 'Completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $contract->status }}
                        </span>
                    </div>
                    <div class="flex gap-2">
                        @if($contract->status !== 'In Progress')
                            <button type="submit" name="status" value="In Progress"
                                    class="bg-yellow-600 text-white text-sm px-3 py-2 rounded hover:bg-yellow-700">
                                Mark as In Progress
                            </button>
                        @endif
                        @if($contract->status !== 'Completed')
                            <button type="submit" name="status" value="Completed"
                                    class="bg-green-600 text-white text-sm px-3 py-2 rounded hover:bg-green-700">
                                Mark as Completed
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        @else
            <div class="border p-4 rounded-lg bg-gray-50 mb-6">
                <span class="font-semibold text-sm text-gray-700">Current Status:</span>
                <span class="ml-2 px-3 py-1 rounded-full text-xs font-semibold
                    {{ $contract->status === 'Completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $contract->status }}
                </span>
            </div>
        @endif

        <!-- Student Info Section -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-800">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col bg-gray-100 p-3 rounded shadow-sm">
                        <span class="text-sm text-gray-500 font-medium">Student Name</span>
                        <span class="text-lg font-bold text-red-700">
                            {{ $contract->student->first_name }} {{ $contract->student->last_name }}
                        </span>
                    </div>
                    <x-student-info label="Status" :value="$contract->status" />
                    <x-student-info label="Contract Date" :value="\Carbon\Carbon::parse($contract->contract_date)->format('F j, Y')" />
                    <x-student-info label="Total Days" :value="$contract->total_days ?? 'N/A'" />
                </div>

                <div class="flex flex-col gap-3">
                    @php
                        $profile = $contract->student->profiles->where('semester_id', $contract->semester_id)->first()
                            ?? $contract->student->profiles->sortByDesc('semester_id')->first();
                    @endphp
                    <div class="flex flex-col bg-gray-100 p-3 rounded shadow-sm">
                        <span class="text-sm text-gray-500 font-medium">Course & Section</span>
                        <span class="text-base font-bold text-red-700">
                            {{ $profile?->course }} {{ $profile?->year_level }} {{ $profile?->section }}
                        </span>
                    </div>
                    <x-student-info label="End Date" :value="$contract->end_date ?? 'N/A'" />
                    <x-student-info label="Contract Type" :value="$contract->contract_type ?? 'N/A'" />
                </div>
            </div>
        </div>

        {{-- Remarks --}}
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <label class="text-lg font-bold text-red-700 mb-2 block">Remarks</label>
            @if(empty($readonly))
                <form method="POST" action="{{ route('contract.updateRemarks', $contract->id) }}">
                    @csrf
                    @method('PATCH')

                    <textarea name="remarks"
                              rows="4"
                              class="w-full border rounded p-2 text-sm text-gray-800 focus:ring focus:border-blue-400"
                              placeholder="Enter remarks here...">{{ old('remarks', $contract->remarks) }}</textarea>

                    <div class="mt-3 flex justify-end">
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">
                            Save Remarks
                        </button>
                    </div>
                </form>
            @else
                <div class="border p-3 rounded bg-white text-sm text-gray-700">
                    {{ $contract->remarks ?: 'No remarks provided.' }}
                </div>
            @endif
        </div>


        <!-- Contract Images -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
            <p class="font-semibold text-gray-700 mb-4 text-lg">Contract Images:</p>

            @if($contract->images && $contract->images->count())
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($contract->images as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                 @click="zoomedImage = '{{ asset('storage/' . $image->image_path) }}'"
                                 class="w-full h-36 object-cover rounded-lg border border-gray-300 shadow cursor-zoom-in group-hover:scale-105 transition-transform duration-200">
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic text-center mt-4">No images available.</p>
            @endif
        </div>

        <!-- Zoom Modal -->
        <div x-show="zoomedImage"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 p-6"
             x-transition>
            <div class="relative max-w-3xl w-full">
                <button @click="zoomedImage = null"
                        class="absolute top-2 right-2 text-white text-3xl font-bold z-50">
                    &times;
                </button>
                <img :src="zoomedImage"
                     class="w-full max-h-[80vh] object-contain rounded-lg shadow-lg border-4 border-white" />
            </div>
        </div>
    </div>
</x-app-layout>
