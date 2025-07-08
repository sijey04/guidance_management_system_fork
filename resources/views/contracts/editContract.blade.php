
<!-- Improved Contract Edit Modal -->
<div x-show="openEditContractModal_{{ $contract->id }}"
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
         @click="openEditContractModal_{{ $contract->id }} = false"></div>
    
    <!-- Modal Container -->
    <div class="flex min-h-full items-center justify-center p-4 relative"
         style="z-index: 10000;">
        <div x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @click.away="openEditContractModal_{{ $contract->id }} = false"
             class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl"
             style="z-index: 10001;">
            
            <!-- Header -->
            <div class="border-b border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Edit Contract</h3>
                    <button @click="openEditContractModal_{{ $contract->id }} = false" 
                            class="rounded-full p-1 text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-1">Update contract information and details</p>
            </div>
            
            <!-- Form Content -->
            <div class="p-6 max-h-[60vh] overflow-y-auto">
                <form action="{{ route('contracts.update', $contract->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    
                    <!-- Contract Type -->
                    <div class="space-y-2">
                        <label for="contract_type" class="block text-sm font-medium text-gray-700">
                            Contract Type
                        </label>
                        <select name="contract_type" id="contract_type" required 
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                            @foreach ($contractTypes as $type)
                                <option value="{{ $type->type }}" {{ $contract->contract_type == $type->type ? 'selected' : '' }}>
                                    {{ $type->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Contract Date -->
                    <div class="space-y-2">
                        <label for="contract_date" class="block text-sm font-medium text-gray-700">
                            Contract Date
                        </label>
                        <input type="date" name="contract_date" id="contract_date" value="{{ $contract->contract_date }}" required
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                    </div>

                    <!-- Total Days & Completed Days -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="total_days" class="block text-sm font-medium text-gray-700">
                                Total Days
                            </label>
                            <input type="number" name="total_days" id="total_days" value="{{ $contract->total_days }}" required
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                        </div>
                        <div class="space-y-2">
                            <label for="completed_days" class="block text-sm font-medium text-gray-700">
                                Completed Days
                            </label>
                            <input type="number" name="completed_days" id="completed_days" value="{{ $contract->completed_days }}" required
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label for="status" class="block text-sm font-medium text-gray-700">
                            Status
                        </label>
                        <select name="status" id="status" 
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-colors">
                            <option value="In Progress" {{ $contract->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ $contract->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end space-x-3 pt-4">
                        <button type="button" @click="openEditContractModal_{{ $contract->id }} = false" 
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            Update Contract
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

