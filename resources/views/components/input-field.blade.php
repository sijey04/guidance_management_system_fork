@props([
    'id',
    'name',
    'label' => '',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'placeholder' => '',
])

<div>
    <label for="{{ $id }}" class="text-sm text-gray-600">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        {{ $attributes->merge(['class' => 'mt-1 w-full border-gray-300 rounded']) }}
    />
</div>
