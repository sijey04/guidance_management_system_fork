<form action="{{ route('semester.store') }}" method="POST">
    @csrf
    <label>School Year:</label>
    <input type="text" name="school_year" required>

    <label>Semester:</label>
    <select name="semester">
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="Summer">Summer</option>
    </select>

    <label>Set as Current:</label>
    <input type="checkbox" name="is_current" value="1">

    <button type="submit">Save Semester</button>
</form>
