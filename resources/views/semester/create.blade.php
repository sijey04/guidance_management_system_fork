<div x-show="openSemesterModal"
     x-transition
     class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center"
     style="display: none;">
    <div class="bg-white rounded-xl shadow-lg w-96 p-6 relative overflow-y-auto max-h-[90vh]">
        <button @click="openSemesterModal = false" 
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
        <h2 class="text-2xl font-bold mb-6 text-center" style="color:#a82323;">New Semester</h2>
        <form action="{{ route('semester.store') }}" method="POST" >
            @csrf
            <div class="flex flex-col ">
                <div class="flex flex-col p-3">
                    <label style="color:#a82323;">School Year:</label>
                    <input type="text" name="school_year" required class="border-gray-300 rounded-lg px-3 py-2 text-gray-900" />
                </div>
                <div class="flex flex-col p-3" >
                    <label style="color:#a82323;">Semester:</label>
                    <select name="semester" class="border-gray-300 rounded-lg px-3 py-2 text-sm">
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="Summer">Summer</option>
                    </select>
                </div>
                <div class="flex items-center gap-3 p-5">
                    <label style="color:#a82323;">Set as Current:</label>
                    <input type="checkbox" name="is_current" value="1" >
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="flex justify-end space-x-2 pt-2 mt-3 gap-3">
                <button type="button" @click="openSemesterModal = false" class="sign-in-btn" style="background:#fff; color:#a82323; border:1.5px solid #a82323; border-radius:6px; padding:7px 16px; font-weight:600;">Cancel</button>
                <button type="submit" class="sign-in-btn" style="background:#a82323; color:#fff; border-radius:6px; padding:7px 16px; font-weight:600;">Save</button>
            </div>
        </form>
    </div>
</div>




