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


        <!-- Zoom Modal -->
        <div x-show="zoomedImage"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 p-6"
             x-transition>
            <div class="relative max-w-3xl w-full">
                <button @click="zoomedImage = null"
                        class="absolute top-2 right-2 text-white text-3xl font-bold z-50">&times;</button>
                <img :src="zoomedImage"
                     class="w-full max-h-[80vh] object-contain rounded-lg shadow-lg border-4 border-white" />
            </div>
        </div>
    </div>
</x-app-layout>
