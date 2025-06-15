<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 rounded">
                    <div class="my-2">
                         @include('layouts.view-tab')
                    </div>
                    <div class="border rounded py-6 p-5">
                        <div class=" p-3 pb-10 py-5">
                            <div class="flex justify-between">
                                <h2 class="text-xl text-gray-500 dark:text-gray-600 font-bold">View Contracts for {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</h2>

                            <div x-data="{ open: false }">
                                <x-secondary-button @click="open = true" >Add Contract</x-navigation-button>
                                @include('student.createContract')
                            </div>
                            </div>


                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if($student->contracts->count() > 0)
                               <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
                                     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-white bg-gray-600 dark:bg-gray-500 ">
                                        <tr>
                                            <th scope="col" class="px-5 py-3">School Year</th>
                                            <th scope="col" class="px-5 py-3">Semester</th>
                                            <th scope="col" class="px-5 py-3">Contract Date</th>
                                            {{-- <th scope="col" class="px-5 py-3">Content</th> --}}
                                            <th scope="col" class="px-5 py-3">Total Days</th>
                                            {{-- <th scope="col" class="px-5 py-3">Completed Days</th> --}}
                                            <th scope="col" class="px-5 py-3">Status</th>
                                            <th scope="col" class="px-5 py-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student->contracts as $contract)
                                            <tr>
                                                <td class="px-6 py-4">{{ $contract->semester->school_year }} </td>
                                                <td class="px-6 py-4">{{ $contract->semester->semester }}</td>
                                                <td class="px-6 py-4">{{ $contract->contract_date }}</td>
                                                {{-- <td class="px-6 py-4">{{ Str::limit($contract->content, 50) }}</td> --}}
                                                <td class="px-6 py-4">{{ $contract->total_days ?? 'N/A' }}</td>
                                                {{-- <td class="px-6 py-4">{{ $contract->completed_days ?? '0' }}</td> --}}
                                                <td class="px-6 py-4">{{ $contract->status }}</td>
                                                {{-- <td>
                                                    <!-- Edit Button (if needed) -->
                                                    <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    
                                                    <!-- Delete Form -->
                                                    <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                               </div>
                            @else
                                <p>No contracts found for this student.</p>
                            @endif
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






