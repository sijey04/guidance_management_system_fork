<table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Course</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $profile)
            <tr>
                <td>{{ $profile->student->student_id }}</td>
                <td>{{ $profile->student->first_name }} {{ $profile->student->last_name }}</td>
                <td>{{ $profile->course }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
