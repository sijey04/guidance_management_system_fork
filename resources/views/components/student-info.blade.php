@props(['label', 'value', 'description' => ''])

<div class="flex flex-col bg-gray-50 dark:bg-gray-700 p-3 rounded shadow-sm">
    <span class="text-sm text-gray-500 dark:text-gray-300 font-medium">{{ $label }}</span>
    <span class="text-base font-bold text-gray-800 dark:text-gray-100">{{ $value }}</span>
    @if($description)
        <span class="text-xs text-gray-400 mt-1">{{ $description }}</span>
    @endif
</div>
