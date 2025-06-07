<div class="max-w-sm bg-white shadow-md rounded-lg p-4">
    <h2 class="text-xl font-bold mb-2">{{ $title }}</h2>
    <p class="text-gray-700 text-base">{{ $content }}</p>
    @isset($link)
        <a href="{{ $link }}" class="text-blue-500 hover:underline">{{ $linkText ?? 'Learn More' }}</a>
    @endisset
</div>