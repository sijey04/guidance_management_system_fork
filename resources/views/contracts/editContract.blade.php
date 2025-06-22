

    <div x-show="openEditContractModal_{{ $contract->id }}"
         x-transition
         class="fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center"
         style="display: none;">

        <div class="bg-white rounded-xl shadow-lg max-w-2xl w-full p-6 relative overflow-y-auto max-h-[90vh]">
            <button @click="openEditContractModal_{{ $contract->id }} = false"
                    class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;
            </button>

            <h2 class="text-2xl font-bold mb-6 text-center" style="color:#a82323;">Edit Contract</h2>

            <form action="{{ route('contracts.update', $contract->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Contract Type -->
                <div>
                    <label class="block text-sm font-medium">Contract Type</label>
                    <select name="contract_type" required class="w-full border-gray-300 rounded">
                        @foreach ($contractTypes as $type)
                            <option value="{{ $type->type }}" {{ $contract->contract_type == $type->type ? 'selected' : '' }}>
                                {{ $type->type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Contract Date -->
                <div>
                    <label class="block text-sm font-medium">Contract Date</label>
                    <input type="date" name="contract_date" value="{{ $contract->contract_date }}" required
                           class="w-full border-gray-300 rounded" />
                </div>

                <!-- Total Days & Completed Days -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Total Days</label>
                        <input type="number" name="total_days" value="{{ $contract->total_days }}" required
                               class="w-full border-gray-300 rounded" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Completed Days</label>
                        <input type="number" name="completed_days" value="{{ $contract->completed_days }}" required
                               class="w-full border-gray-300 rounded" />
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium">Status</label>
                    <select name="status" class="w-full border-gray-300 rounded">
                        <option value="In Progress" {{ $contract->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ $contract->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" @click="openEditContractModal_{{ $contract->id }} = false"
                            class="px-4 py-2 border text-red-500 border-red-500 rounded hover:bg-red-50">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

