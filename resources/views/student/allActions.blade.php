
<div x-show="open" @click.away="open = false" 
    class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
    <div class="py-1">
        <!-- Enroll All -->
        <form method="POST" action="{{ route('students.enrollAll') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Enroll All
            </button>
        </form>

        <!-- Unenroll All -->
        <form method="POST" action="{{ route('students.unenrollAll') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Unenroll All
            </button>
        </form>

        {{-- delete all --}}
        <form action="{{ route('students.deleteAll') }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete all students?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete All</button>
        </form>
    </div>
</div>