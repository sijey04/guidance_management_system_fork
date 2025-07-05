@props(['label', 'value', 'description' => ''])

<div class="flex flex-col bg-gray-100 p-4 rounded shadow-sm transition hover:shadow-md text-gray-700 text-sm md:text-base">
    <span class="text-gray-500 text-xs md:text-sm font-semibold mb-1">{{ $label }}</span>
    <span class="font-bold text-gray-800 text-sm md:text-base">{{ $value }}</span>
    @if($description)
        <span class="text-xs text-gray-400 mt-1 italic">{{ $description }}</span>
    @endif
</div>
