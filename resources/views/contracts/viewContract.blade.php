<div x-show="openViewContractModal_{{ $contract->id }}"
     x-transition
     class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center"
     style="display: none;"
     x-data="{ zoomedImage: null }">

    <div class="bg-white rounded-xl shadow-lg max-w-5xl w-full p-6 relative overflow-y-auto max-h-[90vh] border border-gray-300">

        <!-- Close Button -->
        <button @click="openViewContractModal_{{ $contract->id }} = false"
                class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-2xl font-bold transition">
            &times;
        </button>

        <!-- Title -->
        <h3 class="text-2xl font-bold mb-6 text-center text-red-700 border-b pb-2">Contract Details</h3>

        <!-- Student Info Section -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-800">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col bg-gray-100 dark:bg-gray-800 p-3 rounded shadow-sm">
                        <span class="text-sm text-gray-500 dark:text-gray-300 font-medium"> Student Name</span>
                        <span class="text-lg font-bold text-red-700"> {{ $contract->student->first_name }} {{ $contract->student->last_name }}</span>
                    </div>
                    <x-student-info label="Status" :value="$contract->status" />
                    <x-student-info label="Contract Date" :value="\Carbon\Carbon::parse($contract->contract_date)->format('F j, Y')" />
                    <x-student-info label="Total Days" :value="$contract->total_days ?? 'N/A'" />
                </div>

                <div class="flex flex-col gap-3">
                     @php
                            $profile = $contract->student->profiles->where('semester_id', $contract->semester_id)->first();
                            if(!$profile) {
                                $profile = $contract->student->profiles->sortByDesc('semester_id')->first();
                            }
                        @endphp
                    <div class="flex flex-col bg-gray-100 dark:bg-gray-800 p-3 rounded shadow-sm">
                        <span class="text-sm text-gray-500 dark:text-gray-300 font-medium"> Student Name</span>
                        <span class="text-base font-bold text-red-700"> {{ $profile->course }} {{ $profile->year_level }} {{ $profile->section }}</span>
                    </div>
                    <x-student-info label="End Date" :value="$contract->end_date ?? 'N/A'" />
                    <x-student-info label="Contract Type" :value="$contract->contract_type ?? 'N/A'" />
                </div>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <div class="grid w-full text-sm text-gray-800">
                <div class="flex flex-col bg-gray-100 dark:bg-gray-800 p-3 rounded shadow-sm">
                    <span class="text-lg font-bold text-red-700 "> Remarks</span>
                    <span class="text-base text-gray-800 dark:text-gray-300 font-medium"> {{ $contract->remarks }} </span>
                </div>
            </div>
        </div>
        <!-- Images Gallery -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
            <p class="font-semibold text-gray-700 mb-4 text-lg">Contract Images:</p>

            @if($contract->images && $contract->images->count() > 0)
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
    </div>

    <!-- Image Zoom Overlay -->
    <div x-show="zoomedImage" 
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 p-6"
         x-transition>
        <div class="relative max-w-3xl w-full">
            <button @click="zoomedImage = null" 
                    class="absolute top-2 right-2 text-white text-3xl font-bold z-50">&times;</button>
            <img :src="zoomedImage" class="w-full max-h-[80vh] object-contain rounded-lg shadow-lg border-4 border-white" />
        </div>
    </div>
</div>
