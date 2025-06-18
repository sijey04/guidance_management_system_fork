<!-- View Counseling Modal -->
<div 
    x-show="openViewModal" 
    style="display: none;" 
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-md relative max-h-screen overflow-y-auto">

        <!-- Close Button -->
        <button @click="openViewModal = false" 
            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">&times;</button>

        <h2 class="text-xl font-bold mb-4">Counseling Record Details</h2>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <strong>Session Date:</strong>
                <p x-text="selectedCounseling.session_date"></p>
            </div>
            <div>
                <strong>Referred By:</strong>
                <p x-text="selectedCounseling.referred_by"></p>
            </div>
            <div>
                <strong>Statement of Problem:</strong>
                <p x-text="selectedCounseling.statement_of_problem"></p>
            </div>
            <div>
                <strong>Tests Administered:</strong>
                <p x-text="selectedCounseling.tests_administered"></p>
            </div>
            <div>
                <strong>Evaluation:</strong>
                <p x-text="selectedCounseling.evaluation"></p>
            </div>
            <div>
                <strong>Recommendation/Action Taken:</strong>
                <p x-text="selectedCounseling.recommendation_action_taken"></p>
            </div>
            <div>
                <strong>Follow Up:</strong>
                <p x-text="selectedCounseling.follow_up"></p>
            </div>
            <div>
                <strong>Guidance Counselor:</strong>
                <p x-text="selectedCounseling.guidance_counselor"></p>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button @click="openViewModal = false" >
                Close
            </x-primary-button>
        </div>

    </div>
</div>
