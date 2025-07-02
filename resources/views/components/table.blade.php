<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 text-sm text-left text-gray-700">
        <thead class="bg-red-700 text-white">
            <tr>
                {{ $header ?? '' }}
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
