<div x-show="openViewCounselingModal_{{ $counseling->id }}"
     x-transition
     class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center"
     style="display: none;"
     x-data="{ zoomedImage: null }">

    <div class="bg-white rounded-xl shadow-lg max-w-5xl w-full p-6 relative overflow-y-auto max-h-[90vh] border border-gray-300">

        <!-- Close Button -->
        <button @click="openViewCounselingModal_{{ $counseling->id }} = false"
                class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-2xl font-bold transition">
            &times;
        </button>

        <h3 class="text-2xl font-bold mb-6 text-center text-red-700 border-b pb-2">Counseling Record Details</h3>
        @if(session('success') && request('view_id') == $counseling->id)
            <div class="bg-green-100 border border-green-300 text-green-800 text-sm rounded px-4 py-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Status Form -->
        <form method="POST" action="{{ route('counseling.updateStatus', $counseling->id) }}" class="mb-6">
            @csrf
            @method('PATCH')
            <input type="hidden" name="page" value="{{ request()->page }}">

            <div class="flex items-center justify-between border p-4 rounded-lg bg-gray-50">
                <div>
                    <span class="font-semibold text-sm text-gray-700">Current Status:</span>
                    <span class="ml-2 px-3 py-1 rounded-full text-xs font-semibold
                        {{ $counseling->status === 'Completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $counseling->status }}
                    </span>
                </div>
                <div class="flex gap-2">
                    @if($counseling->status !== 'In Progress')
                        <button type="submit" name="status" value="In Progress"
                            class="bg-yellow-600 text-white text-sm px-3 py-2 rounded hover:bg-yellow-700">
                            Mark as In Progress
                        </button>
                    @endif
                    @if($counseling->status !== 'Completed')
                        <button type="submit" name="status" value="Completed"
                            class="bg-green-600 text-white text-sm px-3 py-2 rounded hover:bg-green-700">
                            Mark as Completed
                        </button>
                    @endif
                </div>
            </div>
        </form>

        <!-- Student Info -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-800">
                <div class="flex flex-col gap-3">
                    <div class="bg-gray-100 p-3 rounded shadow-sm">
                        <span class="text-sm text-gray-500 font-medium">Student Name</span><br>
                        <span class="text-lg font-bold text-red-700">
                            {{ $counseling->student->first_name }} {{ $counseling->student->last_name }}
                        </span>
                    </div>
                    <x-student-info label="Counseling Date" :value="\Carbon\Carbon::parse($counseling->counseling_date)->format('F j, Y')" />
                </div>
                <div>
                    @php
                        $profile = $counseling->student->profiles->where('semester_id', $counseling->semester_id)->first()
                            ?? $counseling->student->profiles->sortByDesc('semester_id')->first();
                    @endphp
                    <div class="bg-gray-100 p-3 rounded shadow-sm">
                        <span class="text-sm text-gray-500 font-medium">Course & Section</span><br>
                        <span class="text-base font-bold text-red-700">
                            {{ $profile?->course ?? 'N/A' }} {{ $profile?->year_level ?? '' }} {{ $profile?->section ?? '' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Remarks Editable -->
<div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
    <form method="POST" action="{{ route('counseling.updateRemarks', $counseling->id) }}">
        @csrf
        @method('PATCH')
<input type="hidden" name="page" value="{{ request()->page }}">

        <label class="text-lg font-bold text-red-700 mb-2 block">Remarks</label>
        <textarea name="remarks"
                  rows="4"
                  class="w-full border rounded p-2 text-sm text-gray-800 focus:ring focus:border-blue-400"
                  placeholder="Enter remarks here...">{{ old('remarks', $counseling->remarks) }}</textarea>

        <div class="mt-3 flex justify-end">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">
                Save Remarks
            </button>
        </div>
    </form>
</div>


        <!-- Counseling Form Pictures -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <p class="font-semibold text-gray-700 mb-4 text-lg">Counseling Form Pictures:</p>
            @php $formImages = $counseling->images->where('type', 'form'); @endphp
            @if($formImages->count())
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($formImages as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                             @click="zoomedImage = '{{ asset('storage/' . $image->image_path) }}'"
                             class="w-full h-36 object-cover rounded border cursor-zoom-in">
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic">No counseling form images available.</p>
            @endif
        </div>

        <!-- ID Card Images -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
            <p class="font-semibold text-gray-700 mb-4 text-lg">Student ID Card Images:</p>
            @php $idImages = $counseling->images->where('type', 'id_card'); @endphp
            @if($idImages->count())
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($idImages as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                             @click="zoomedImage = '{{ asset('storage/' . $image->image_path) }}'"
                             class="w-full h-36 object-cover rounded border cursor-zoom-in">
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic">No ID card images available.</p>
            @endif
        </div>
    </div>

    <!-- Image Zoom Modal -->
    <div x-show="zoomedImage"
         class="fixed inset-0 z-50 bg-black bg-opacity-80 flex items-center justify-center p-6"
         x-transition>
        <div class="relative max-w-3xl w-full">
            <button @click="zoomedImage = null"
                    class="absolute top-2 right-2 text-white text-3xl font-bold z-50">
                &times;
            </button>
            <img :src="zoomedImage"
                 class="w-full max-h-[80vh] object-contain rounded-lg border-4 border-white shadow-lg">
        </div>
    </div>
</div>
