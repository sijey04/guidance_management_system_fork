
<div x-show="openSemesterModal"
     x-transition
     class="fixed inset-0 bg-gray-500 bg-opacity-50 z-50 flex items-center justify-center"
     style="display: none;">
     
    <div class="bg-white rounded-xl shadow-lg w-96 p-6 relative overflow-y-auto max-h-[90vh]">

     
        <button @click="openSemesterModal = false" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-xl p-5">
            &times;
        </button>

        <h2 class="text-lg font-semibold mb-4 text-center">New Semester</h2>

         <form action="{{ route('semester.store') }}" method="POST" >
            @csrf
            <div class="flex flex-col ">
                <div class=" flex flex-col p-3">
                    <label>School Year:</label>
                    <x-text-input type="text" name="school_year" required/>
                </div>
                <div class="flex flex-col p-3" >
                    <label>Semester:</label>
                    <select name="semester" class="border-gray-300 rounded p-2 text-sm">
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="Summer">Summer</option>
                    </select>
                </div>

                <div class="flex items-center gap-3 p-5">
                    <label>Set as Current:</label>
                    <input type="checkbox" name="is_current" value="1" >
                </div>
            </div>

            <!-- Action Buttons -->
                <div class="flex justify-end space-x-2 pt-2 mt-3 gap-3">
                    <x-secondary-button type="button" @click="openStudentModal = false" >Cancel</x-secondary-button>
                    <x-primary-button type="submit">Save</x-primary-button>
                </div>
        </form>
    </div>
</div>




