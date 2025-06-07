<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 ">
                  <div class="flex flex-col ">
                    <div class="text-2xl font-medium pb-2"> Welcome, {{ Auth::user()->name }} ! </div>
                    <p>{{ date('l, F jS, Y') }}</p>
                  </div>

                    <form action="" method="GET">
                        <div class="relative">
                            <input type="search" name="query" placeholder="Search..." class="w-full p-2 border rounded">
                            <button type="submit" class="absolute top-0 right-0 p-2">
                                <i class="fas fa-search"></i>  <!-- Font Awesome search icon -->
                            </button>
                        </div>
                    </form>
                </div>
            </div>

             {{-- Overview Cards --}}
            <div class=" flex p-3 justify-evenly py-3">
                <x-overview-card title="Card 1" content="This is the content for card 1." link="/card1" />
                <x-overview-card title="Card 2" content="This is the content for card 2." />
                <x-overview-card title="Card 1" content="This is the content for card 1." link="/card1" />
                <x-overview-card title="Card 2" content="This is the content for card 2." />
            </div>
        </div>

       


    </div>
</x-app-layout>
