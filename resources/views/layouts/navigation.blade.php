<nav x-data="{ open: false }" class=" p-2 h-screen bg-white dark:bg-gray-800 border-r border-gray-100 dark:border-gray-700">
    <div class="flex flex-col ">
        <div class="flex items-center p-4">
            <!-- Logo -->
            <div class="shrink-0 flex items-center ">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>
        </div>

        <div class="flex-grow p-3">
            <!-- Navigation Links -->
            <div class="flex flex-col space-y-2">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fas fa-tachometer-alt mr-2"></i> {{ __('Dashboard') }}
                </x-nav-link>

                {{-- <x-nav-link :href="route('student')" :active="request()->routeIs('student')">
                    {{ __('Students') }}
                </x-nav-link> --}}

                <x-nav-link 
                    :href="route('student.index')" 
                    :active="request()->routeIs('student.*') || request()->routeIs('students.*')">
                    {{ __('Student') }}
                </x-nav-link>


                <x-nav-link :href="route('contracts.index')" :active="request()->routeIs('contracts.index')">
                    {{ __('Contracts') }}
                </x-nav-link>


                <x-nav-link :href="route('referral')" :active="request()->routeIs('referral')">
                    {{ __('Referral') }}
                </x-nav-link>

                <x-nav-link :href="route('counseling')" :active="request()->routeIs('counseling')">
                    {{ __('Counseling') }}
                </x-nav-link>

                <x-nav-link :href="route('report')" :active="request()->routeIs('report')">
                    {{ __('Report') }}
                </x-nav-link>

                <x-nav-link :href="route('semester.index')" :active="request()->routeIs('semester.*')">
                    {{ __('Setup') }}
                </x-nav-link>
            </div>
        </div>

    </div>
</nav>