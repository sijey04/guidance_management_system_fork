@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center py-3 px-5 border rounded bg-green-900 dark:border-green-900 text-sm font-medium leading-5 text-white focus:outline-none focus:border-green-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center py-3 px-5 shadow rounded bg-white-900 light:border-white-900  text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' flex items-center']) }}>
    {{ $slot }}
</a>
