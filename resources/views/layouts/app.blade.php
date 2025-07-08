<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts and Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/css/sidebar.css', 'resources/js/app.js'])
    
    <!-- Additional CSS -->
    <style>
        [x-cloak] { display: none !important; }
        .fixed { position: fixed !important; }
        div[x-show*="Modal"] { z-index: 9999 !important; }
        div[x-show*="Modal"] .bg-black\/50 { z-index: 9998 !important; }
        div[x-show*="Modal"] .bg-white { z-index: 10000 !important; position: relative !important; }
        
        /* Fix for sidebar overlap */
        @media (min-width: 768px) {
            .main-content {
                margin-left: 16rem; /* 64px = width of sidebar */
            }
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100 h-screen" x-data="{ sidebarOpen: false }">
    <!-- Overlay for mobile - closes sidebar when clicked -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 md:hidden z-20"></div>

    <div class="flex flex-col md:flex-row h-screen overflow-hidden">
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'" class="md:w-64 md:flex-shrink-0 fixed md:static z-30 inset-y-0 left-0 w-64 bg-white border-r border-gray-200 shadow-lg transition-transform duration-300 ease-in-out">
            @include('layouts.navigation')
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col min-h-screen overflow-x-hidden overflow-y-auto md:pl-0 transition-all duration-300 main-content">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <div class="text-sm text-gray-600">
                        @yield('breadcrumbs')
                    </div>
                </div>

                @if($globalActiveSchoolYear && $globalActiveSemester)
                    <div class="text-sm text-gray-500">
                        <strong class="text-base font-extrabold text-[#a82323]">Active SY:</strong > <span class="text-base font-extrabold ">{{ $globalActiveSchoolYear->school_year }}</span> |
                        <strong  class="text-base font-extrabold text-[#a82323]">Semester:</strong> <span class="text-base font-extrabold ">{{ $globalActiveSemester->semester }}</span> 
                    </div>
                @endif

                <!-- User Dropdown -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:text-gray-800 focus:outline-none transition">
                                <div>{{ Auth::user()->name }}</div>
                                <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 px-4 md:px-6 py-6 space-y-6">
                @if(!$globalActiveSchoolYear || !$globalActiveSemester)
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 rounded shadow">
                        ⚠️ <strong>First-time Setup:</strong> Please create an active
                        <a href="{{ route('semester.index') }}" class="underline text-red-600">School Year and Semester</a>
                        in Academic Setup before accessing other features.
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
