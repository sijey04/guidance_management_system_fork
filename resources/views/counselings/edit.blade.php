<div x-data="{ showEditModal: false, editForm: {} }"
     @open-edit-modal.window="showEditModal = true; editForm = $event.detail.counseling">

    <div x-show="showEditModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
        <div @click.away="showEditModal = false" class="bg-white p-6 rounded-lg w-full max-w-lg relative">
            <button @click="showEditModal = false" class="absolute top-2 right-2 text-gray-600 text-xl">&times;</button>
            <h2 class="text-xl font-semibold mb-4 text-center">Edit Counseling Record</h2>

            <form :action="'/counselings/' + editForm.id" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Session Date -->
                <div class="mt-4">
                    <label class="block text-sm mb-1">Session Date</label>
                    <input type="date" name="counseling_date" :value="editForm.counseling_date" required
                           class="w-full border p-2 rounded">
                </div>

                <!-- Image Upload -->
                <div class="mt-4">
                    <label class="block text-sm mb-1">Attach Image (Optional)</label>
                    <input type="file" name="image_path" accept="image/*" class="w-full border p-2 rounded">
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                    <button type="button" @click="showEditModal = false" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
