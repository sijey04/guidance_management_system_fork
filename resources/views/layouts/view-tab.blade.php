<ul class="flex flex-wrap border-b border-gray-200 dark:border-gray-700 text-sm md:text-base font-medium text-gray-600 dark:text-gray-300">
    @php
        $tabs = [
            ['label' => 'Profile', 'route' => 'students.profile'],
            ['label' => 'Enrollment History', 'route' => 'students.enrollment'],
            ['label' => 'Contracts', 'route' => 'students.contract'],
            ['label' => 'Counseling', 'route' => 'students.counseling'],
            ['label' => 'Referrals', 'route' => 'students.referral'],
        ];
    @endphp

    @foreach ($tabs as $tab)
        <li class="me-2">
            <a href="{{ route($tab['route'], $student->id) }}"
               class="inline-block px-4 py-2 md:px-5 md:py-3 rounded-t-lg transition-all duration-150
                   {{ request()->routeIs($tab['route']) 
                       ? 'bg-gray-100 text-blue-600 dark:bg-gray-800 dark:text-blue-500' 
                       : 'hover:bg-gray-50 hover:text-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">
                {{ $tab['label'] }}
            </a>
        </li>
    @endforeach
</ul>
