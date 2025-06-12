<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Academic Setup') }}
        </h2>
    </x-slot>
  
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              
                <div class="bg-white border border-black p-2">
                    <h1> Current A.Y</h1>
                    @foreach($semesters as $sem)
                        @if($sem->is_current)
                          Academic Year :{{ $sem->school_year }} 
                        {{ $sem->semester }} Semester
                        @endif
                    @endforeach
                </div>

              
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     

                    <div class="flex items-center justify-between">
                       <h2>Academic Year & Semester Setup</h2>
                        <a href="{{ route('semester.create') }}">Add New Semester</a>
                    </div>
                 
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tr>
                            <th>School Year</th>
                            <th>Semester</th>
                            <th>Current</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($semesters as $sem)
                            <tr>
                                <td>{{ $sem->school_year }}</td>
                                <td>{{ $sem->semester }}</td>
                                <td>{{ $sem->is_current ? '✅' : '❌' }}</td>
                                <td>
                                    <a href="{{ route('semester.edit', $sem->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                    {{-- {{ $semesters->links() }} Add pagination --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>