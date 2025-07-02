<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <div class="bg-white border rounded shadow p-4">
        <p class="text-sm text-gray-500">Unique Students</p>
        <h3 class="text-2xl font-bold text-gray-800">{{ $students->pluck('student_id')->unique()->count() }}</h3>
    </div>
    <div class="bg-white border rounded shadow p-4">
        <p class="text-sm text-gray-500">Courses</p>
        <h3 class="text-sm font-medium text-gray-800">
            @foreach($students->groupBy('course') as $course => $group)
                {{ $course }} - {{ $group->count() }}<br>
            @endforeach
        </h3>
    </div>
    <div class="bg-white border rounded shadow p-4">
        <p class="text-sm text-gray-500">Year Levels</p>
        <h3 class="text-sm font-medium text-gray-800">
            @foreach($students->groupBy('year_level') as $year => $group)
                {{ $year }} - {{ $group->count() }}<br>
            @endforeach
        </h3>
    </div>
</div>
