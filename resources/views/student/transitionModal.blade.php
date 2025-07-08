<!-- Improved Student Transition Modal -->
<div x-show="openTransitionModal" 
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
         @click="openTransitionModal = false"></div>
    
    <!-- Modal Container -->
    <div class="flex min-h-full items-center justify-center p-4 relative"
         style="z-index: 10000;">
        <div x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @click.away="openTransitionModal = false"
             class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl"
             style="z-index: 10001;">
            
            <!-- Header -->
            <div class="border-b border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Student Movement Record</h3>
                    <button @click="openTransitionModal = false" 
                            class="rounded-full p-1 text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-1">Record student movement or transition details</p>
            </div>
            
            <!-- Form Content -->
            <div class="p-6 max-h-[60vh] overflow-y-auto">
                <form method="POST" action="{{ route('student.transition.store') }}" class="space-y-4">
                    @csrf
                    
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    
                    <!-- Movement Type -->
                    <div class="space-y-2">
                        <label for="transition_type" class="block text-sm font-medium text-gray-700">
                            Movement Type
                        </label>
                        <select name="transition_type" id="transition_type" required 
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                            <option value="">Select movement type...</option>
                            <option value="Shiftee">Shift-Out</option>
                            <option value="Transferee">Transfer-Out</option>
                            <option value="Returnee">Returnee</option>
                            <option value="Dropped">Dropped</option>
                        </select>
                    </div>
                    
                    <!-- From Course/Program -->
                    <div class="space-y-2">
                        <label for="from_program" class="block text-sm font-medium text-gray-700">
                            From Course/Program
                        </label>
                        <input type="text" name="from_program" id="from_program" 
                               value="{{ $profile?->course }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                    </div>
                    
                    <!-- To Course/Program -->
                    <div class="space-y-2">
                        <label for="to_program" class="block text-sm font-medium text-gray-700">
                            To Course/Program
                            <span class="text-gray-400 text-xs">(optional)</span>
                        </label>
                        <input type="text" name="to_program" id="to_program"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                    </div>
                    
                    <!-- Reason -->
                    <div class="space-y-2">
                        <label for="reason_leaving" class="block text-sm font-medium text-gray-700">
                            Reason
                        </label>
                        <textarea name="reason_leaving" id="reason_leaving" rows="3"
                                  class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors"
                                  placeholder="Enter reason for the movement..."></textarea>
                    </div>
                    
                    <!-- Counselor Remarks -->
                    <div class="space-y-2">
                        <label for="remark" class="block text-sm font-medium text-gray-700">
                            Counselor Remarks
                        </label>
                        <textarea name="remark" id="remark" rows="3"
                                  class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors"
                                  placeholder="Enter counselor remarks..."></textarea>
                    </div>
                    
                    <!-- Date of Movement -->
                    <div class="space-y-2">
                        <label for="transition_date" class="block text-sm font-medium text-gray-700">
                            Date of Movement
                        </label>
                        <input type="date" name="transition_date" id="transition_date" required
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-end space-x-3 pt-4">
                        <button type="button" @click="openTransitionModal = false" 
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            Save Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
