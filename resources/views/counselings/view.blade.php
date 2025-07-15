<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8" x-data="{ zoomedImage: null }">

        @php
            $backRoute = match ($source) {
                'report' => route('report'),
                'counseling' => route('counselings.index'),
                'student' => route('students.counseling', $counseling->student->id),
                default => route('counselings.index'),
            };
        @endphp

        <a href="{{ $backRoute }}"
            class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm px-4 py-2 rounded mb-6">
            ← Back to 
            @switch($source)
                @case('report') Reports @break
                @case('student') Student Profile @break
                @default Contracts
            @endswitch
        </a>

        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-red-700 mb-6">Counseling Record Details</h2>
            <!-- Delete Button -->
            <form action="{{ route('counseling.destroy', $counseling->id) }}"
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
            <form method="POST" action="{{ route('counseling.updateStatus', $counseling->id) }}" class="mb-6">
                @csrf
                @method('PATCH')
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
        @else
            <div class="border p-4 rounded-lg bg-gray-50 mb-6">
                <span class="font-semibold text-sm text-gray-700">Current Status:</span>
                <span class="ml-2 px-3 py-1 rounded-full text-xs font-semibold
                    {{ $counseling->status === 'Completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $counseling->status }}
                </span>
            </div>
        @endif

        {{-- Student Info --}}
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-800">
                <div class="flex flex-col gap-3">
                    <div class="bg-gray-100 p-3 rounded shadow-sm">
                        <span class="text-sm text-gray-500 font-medium">Student Name</span><br>
                        <span class="text-lg font-bold text-red-700">
                           {{ $counseling->student->last_name }}, {{ $counseling->student->first_name }} {{ $counseling->student->middle_name }}. {{ $counseling->student->suffix }}
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

        {{-- Remarks --}}
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <label class="text-lg font-bold text-red-700 mb-2 block">Remarks</label>
            @if(empty($readonly))
                <form method="POST" action="{{ route('counseling.updateRemarks', $counseling->id) }}">
                    @csrf
                    @method('PATCH')

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
            @else
                <div class="border p-3 rounded bg-white text-sm text-gray-700">
                    {{ $counseling->remarks ?: 'No remarks provided.' }}
                </div>
            @endif
        </div>

        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <p class="font-semibold text-gray-700 mb-4 text-lg">Counseling Form Pictures</p>
            @php $formImages = $counseling->images->where('type', 'form'); @endphp
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Existing images -->
                @foreach($formImages as $image)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                            @click="zoomedImage = '{{ asset('storage/' . $image->image_path) }}'"
                            class="w-full h-36 object-cover rounded border cursor-zoom-in">
                        
                        @if(empty($readonly))
                        <form action="{{ route('counseling.deleteImage', [$counseling->id, $image->id]) }}" method="POST"
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


                <!-- Add Images Button -->
                @if(empty($readonly))
                <div x-data="{
                    openCamera() {
                        $refs.formInput.setAttribute('capture', 'environment');
                        $refs.formInput.click();
                    },
                    openGallery() {
                        $refs.formInput.removeAttribute('capture');
                        $refs.formInput.click();
                    }
                }">
                    <form action="{{ route('counseling.uploadImages', ['id' => $counseling->id, 'type' => 'form']) }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="images[]" multiple accept="image/*" class="hidden" x-ref="formInput" onchange="this.form.submit()">

                        <div class="flex gap-4">
                            <button type="button" @click="openCamera"
                                    class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 hover:border-red-500 hover:bg-gray-50 transition">
                                <div class="text-3xl text-gray-400"></div>
                                <span class="text-xs mt-1 text-gray-600">Take Photo</span>
                            </button>

                            <button type="button" @click="openGallery"
                                    class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 hover:border-red-500 hover:bg-gray-50 transition">
                                <div class="text-3xl text-gray-400"></div>
                                <span class="text-xs mt-1 text-gray-600">Choose Gallery</span>
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>


        {{-- ID Card Images --}}
<div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
    <p class="font-semibold text-gray-700 mb-4 text-lg">Student ID Card Images</p>
    @php $idImages = $counseling->images->where('type', 'id_card'); @endphp
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($idImages as $image) 
            <div class="relative group">
                <img src="{{ asset('storage/' . $image->image_path) }}"
                    @click="zoomedImage = '{{ asset('storage/' . $image->image_path) }}'"
                    class="w-full h-36 object-cover rounded border cursor-zoom-in">

                @if(empty($readonly))
                <form action="{{ route('counseling.deleteImage', [$counseling->id, $image->id]) }}" method="POST"
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

        @if(empty($readonly))
        <div x-data="{
    openCamera() {
        $refs.idInput.setAttribute('capture', 'environment');
        $refs.idInput.click();
    },
    openGallery() {
        $refs.idInput.removeAttribute('capture');
        $refs.idInput.click();
    }
}">
    <form action="{{ route('counseling.uploadImages', ['id' => $counseling->id, 'type' => 'id_card']) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple accept="image/*" class="hidden" x-ref="idInput" onchange="this.form.submit()">

        <div class="flex gap-4">
            <button type="button" @click="openCamera"
                    class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 hover:border-red-500 hover:bg-gray-50 transition">
                <div class="text-3xl text-gray-400"></div>
                <span class="text-xs mt-1 text-gray-600">Take Photo</span>
            </button>

            <button type="button" @click="openGallery"
                    class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg w-32 h-32 hover:border-red-500 hover:bg-gray-50 transition">
                <div class="text-3xl text-gray-400"></div>
                <span class="text-xs mt-1 text-gray-600">Choose Gallery</span>
            </button>
        </div>
    </form>
</div>

        @endif
    </div>
</div>


        {{-- Zoom Image Modal --}}
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
</x-app-layout>
