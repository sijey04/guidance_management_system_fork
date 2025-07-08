<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8" x-data="{ zoomedImage: null }">
        
         @php
            $backRoute = match ($source) {
                'report' => route('report'),
                'referral' => route('referrals.index'),
                'student' => route('students.referral', $referral->student->id),
                default => route('referrals.index'),
            };
        @endphp

        <a href="{{ $backRoute }}"
            class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm px-4 py-2 rounded mb-6">
            ← Back to 
            @switch($source)
                @case('report') Reports @break
                @case('student') Student Profile @break
                @default Referral
            @endswitch
        </a>

        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-red-700 mb-6">Referral Details</h2>

            @if(empty($readonly))
            <!-- Delete Button -->
            <form action="{{ route('referrals.destroy', $referral->id) }}"
                method="POST"
                onsubmit="return confirm('Are you sure you want to delete this referral record?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
            </form>
            @endif
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 text-sm rounded px-4 py-2 mb-4">
                {{ session('success') }}
            </div>
        @endif
        <!-- Student Info Section -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-800">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col bg-gray-100 dark:bg-gray-800 p-3 rounded shadow-sm">
                        <span class="text-sm text-gray-500 dark:text-gray-300 font-medium">Student Name</span>
                        <span class="text-lg font-bold text-red-700">{{ $referral->student->first_name }} {{ $referral->student->last_name }}</span>
                    </div>
                    <x-student-info label="Reason" :value="$referral->reason" />
                </div>

                <div class="flex flex-col gap-3">
                    @php
                        $profile = $referral->student->profiles->where('semester_id', $referral->semester_id)->first()
                                ?? $referral->student->profiles->sortByDesc('semester_id')->first();
                    @endphp
                    <div class="flex flex-col bg-gray-100 dark:bg-gray-800 p-3 rounded shadow-sm">
                        <span class="text-sm text-gray-500 dark:text-gray-300 font-medium">Course & Section</span>
                        <span class="text-base font-bold text-red-700">
                            {{ $profile?->course ?? 'N/A' }} {{ $profile?->year_level ?? 'N/A' }} {{ $profile?->section ?? 'N/A' }}
                        </span>
                    </div>
                    <x-student-info label="Referral Date" :value="\Carbon\Carbon::parse($referral->referral_date)->format('F j, Y')" />
                </div>
            </div>
        </div>

        <!-- Remarks Section -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <label class="text-lg font-bold text-red-700 mb-2 block">Remarks</label>
            @if(empty($readonly))
                <form method="POST" action="{{ route('referrals.updateRemarks', $referral->id) }}">
                    @csrf
                    @method('PATCH')
                    <textarea name="remarks"
                              rows="4"
                              class="w-full border rounded p-2 text-sm text-gray-800 focus:ring focus:border-blue-400"
                              placeholder="Enter remarks here...">{{ old('remarks', $referral->remarks) }}</textarea>

                    <div class="mt-3 flex justify-end">
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">
                            Save Remarks
                        </button>
                    </div>
                </form>
            @else
                <div class="border p-3 rounded bg-white text-sm text-gray-700">
                    {{ $referral->remarks ?: 'No remarks provided.' }}
                </div>
            @endif
        </div>

       <!-- Referral Images -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <p class="font-semibold text-gray-700 mb-4 text-lg">Referral Images:</p>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Existing images -->
                @foreach ($referral->images as $image)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                            @click="zoomedImage = '{{ asset('storage/' . $image->image_path) }}'"
                            class="w-full h-36 object-cover rounded border border-gray-300 shadow cursor-zoom-in group-hover:scale-105 transition-transform duration-200">

                        @if(empty($readonly))
                            <form action="{{ route('referrals.deleteImage', [$referral->id, $image->id]) }}" method="POST"
                                class="absolute top-1 right-1 bg-white rounded-full shadow p-1 group-hover:opacity-100 opacity-0 transition-opacity">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-lg font-bold leading-none">
                                    &times;
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach

                <!-- Upload image square -->
                @if(empty($readonly))
                    <form action="{{ route('referrals.uploadImages', ['id' => $referral->id, 'type' => 'referral']) }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="flex items-center justify-center border-2 border-dashed border-gray-400 rounded cursor-pointer hover:bg-gray-100 transition"
                        style="height: 9rem;"
                        onclick="this.querySelector('input[type=file]').click(); event.stopPropagation();">
                        @csrf
                        <input type="file" name="images[]" multiple accept="image/*" class="hidden" onchange="this.form.submit()">
                        <span class="text-4xl text-gray-400 font-bold">+</span>
                    </form>
                @endif
            </div>
        </div>


        <!-- Improved Zoom Modal -->
        <div x-show="zoomedImage"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[9999] overflow-y-auto"
             style="z-index: 9999;">
            
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black/80 backdrop-blur-sm" 
                 style="z-index: 9998;" 
                 @click="zoomedImage = null"></div>
            
            <!-- Modal Container -->
            <div class="flex min-h-full items-center justify-center p-4 relative"
                 style="z-index: 10000;">
                <div x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="relative max-w-4xl w-full bg-white rounded-2xl shadow-2xl overflow-hidden"
                     style="z-index: 10001;">
                    
                    <!-- Header -->
                    <div class="border-b border-gray-100 p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Image Preview</h3>
                            <button @click="zoomedImage = null" 
                                    class="rounded-full p-1 text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Image Content -->
                    <div class="p-6 flex items-center justify-center bg-gray-50">
                        <img :src="zoomedImage"
                             class="max-w-full max-h-[70vh] object-contain rounded-lg shadow-lg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
