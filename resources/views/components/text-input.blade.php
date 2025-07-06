@props([
    'id' => $attributes->get('name'),
    'type' => 'text',
    'name',
    'label' => '',
    'value' => '',
    'placeholder' => '',
    'required' => false,
])

<div>
    @if($label)
        <label for="{{ $id }}" class="text-sm text-gray-600">
            {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
        </label>
    @endif

    <input
        id="{{ $id }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'mt-1 w-full border-gray-300 rounded text-sm px-3 py-2']) }}
    />
</div>
