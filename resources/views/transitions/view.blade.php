<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8" x-data="{ zoomedImage: null }">

       @php
            $backRoute = match ($source) {
                'report' => route('report'),
                'student' => route('students.history', ['id' => $transition->student_id ?? null]),
                default => route('transitions.index'),
            };
        @endphp

        <a href="{{ $backRoute }}"
            class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm px-4 py-2 rounded mb-6">
            ← Back to 
            @switch($source)
                @case('report') Reports @break
                @case('student') Student Profile @break
                @default Transitions
            @endswitch
        </a>


        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-red-700 mb-6">Student Movement Details</h2>

            <div class="flex gap-2">

                <form action="{{ route('transitions.destroy', $transition) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this record?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 font-medium hover:underline">Delete</button>
                </form>
            </div>
        </div>

        <!-- Student Info Section -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-800">
                <x-student-info label="Student Name" :value="$transition->last_name . ', ' . $transition->first_name . ' ' . $transition->middle_name" />
                <x-student-info label="Movement Type" :value="$transition->transition_type" />
                <x-student-info label="Movement Date" :value="\Carbon\Carbon::parse($transition->transition_date)->format('F d, Y')" />
            </div>
        </div>

        <!-- Remarks -->
        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
            <label class="text-lg font-bold text-red-700 mb-2 block">Counselor Notes</label>

            @if($source === 'report')
                <div class="border p-3 rounded bg-white text-sm text-gray-700">
                    {{ $transition->remark ?: 'No remarks provided.' }}
                </div>
            @else
                <form method="POST" action="{{ route('transitions.updateRemarks', $transition->id) }}">
                    @csrf
                    @method('PATCH')
                    <textarea name="remark"
                            rows="4"
                            class="w-full border rounded p-2 text-sm text-gray-800 focus:ring focus:border-blue-400"
                            placeholder="Enter remarks here...">{{ old('remark', $transition->remark) }}</textarea>

                    <div class="mt-3 flex justify-end">
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">
                            Save Remarks
                        </button>
                    </div>
                </form>
            @endif
        </div>


        <!-- Images -->
<div class="bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
    <p class="font-semibold text-gray-700 mb-4 text-lg">Attached Images:</p>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($transition->images as $image)
            <div class="relative group">
                <img src="{{ asset('storage/' . $image->image_path) }}"
                     @click="zoomedImage = '{{ asset('storage/' . $image->image_path) }}'"
                     class="w-full h-36 object-cover rounded border border-gray-300 shadow cursor-zoom-in group-hover:scale-105 transition-transform duration-200">

                @if($source !== 'report')
                    <form action="{{ route('transitions.deleteImage', [$transition->id, $image->id]) }}"
                          method="POST"
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

        @if($source !== 'report')
        <div x-data="{
            openCamera() {
                $refs.transitionInput.setAttribute('capture', 'environment');
                $refs.transitionInput.click();
            },
            openGallery() {
                $refs.transitionInput.removeAttribute('capture');
                $refs.transitionInput.click();
            }
        }">
            <form action="{{ route('transitions.uploadImages', $transition->id) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="file" name="images[]" multiple accept="image/*" class="hidden" x-ref="transitionInput" onchange="this.form.submit()">

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

        <!-- Include Modal -->
        @include('transitions.edit', ['transition' => $transition])
    </div>
</x-app-layout>
