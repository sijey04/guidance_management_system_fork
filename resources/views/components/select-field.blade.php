@props([
    'name',
    'label' => '',
    'options' => [],
    'required' => false,
    'old' => '',
])

<div>
    <label for="{{ $name }}" class="text-sm text-gray-600">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        @if($required) required @endif
        {{ $attributes->merge(['class' => 'w-full mt-1 border-gray-300 rounded']) }}
    >
        <option value="">Select {{ $label }}</option>
        @foreach($options as $option)
            <option value="{{ $option }}" {{ old($name, $old) == $option ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>
