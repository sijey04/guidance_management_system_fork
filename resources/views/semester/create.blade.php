<!-- Improved Semester Creation Modal -->
<div x-show="openSemesterModal" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[9999] overflow-y-auto"
     style="z-index: 9999;">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" 
         style="z-index: 9998;" 
         @click="openSemesterModal = false"></div>
    
    <!-- Modal Container -->
    <div class="flex min-h-full items-center justify-center p-4 relative"
         style="z-index: 10000;">
        <div x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl"
             style="z-index: 10001;">
            
            <!-- Header -->
            <div class="border-b border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Create New Semester</h3>
                    <button @click="openSemesterModal = false" 
                            class="rounded-full p-1 text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-1">Add a new semester to the current academic year</p>
            </div>
            
            <!-- Form -->
            <form action="{{ route('semesters.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                
                <!-- Semester Selection -->
                <div class="space-y-2">
                    <label for="semester" class="block text-sm font-medium text-gray-700">
                        Semester Period
                    </label>
                    <select name="semester" id="semester" required 
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                        <option value="">Choose semester...</option>
                        <option value="1st">1st Semester</option>
                        <option value="2nd">2nd Semester</option>
                        <option value="Summer">Summer Term</option>
                    </select>
                </div>
                
                <!-- Current Semester Toggle -->
                <div class="flex items-start space-x-3 pt-2">
                    <div class="flex items-center h-5">
                        <input type="checkbox" name="is_current" value="1" id="is_current"
                               class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500 focus:ring-2">
                    </div>
                    <div class="text-sm">
                        <label for="is_current" class="font-medium text-gray-700">Set as active semester</label>
                        <p class="text-gray-500">This will become the current active semester for operations</p>
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="flex items-center justify-end space-x-3 pt-4">
                    <button type="button" @click="openSemesterModal = false" 
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                        Create Semester
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
