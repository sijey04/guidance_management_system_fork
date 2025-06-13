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


<div class="container">
    <h2>Contracts for {{ $student->first_name }} {{ $student->last_name }}</h2>

    {{-- <a href="{{ route('student.createContract', $student->id) }}" class="btn btn-primary">Add Contract</a> --}}
<div x-data="{ open: false }">

    <!-- Button to open the modal -->
          <x-secondary-button @click="open = true" >Add Contract</x-navigation-button>
  

    <!-- Include the modal from another Blade file -->
    @include('student.createContract')

</div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($student->contracts->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Contract Date</th>
                    <th>Content</th>
                    <th>Total Days</th>
                    <th>Completed Days</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->contracts as $contract)
                    <tr>
                        <td>{{ $contract->semester->school_year }} - {{ $contract->semester->semester }}</td>
                        <td>{{ $contract->contract_date }}</td>
                        <td>{{ Str::limit($contract->content, 50) }}</td>
                        <td>{{ $contract->total_days ?? 'N/A' }}</td>
                        <td>{{ $contract->completed_days ?? '0' }}</td>
                        <td>{{ $contract->status }}</td>
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
    @else
        <p>No contracts found for this student.</p>
    @endif
</div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>




