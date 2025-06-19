@if($profile)
    Home Address: {{ showData($profile->home_address) }} <br>
    Father's Occupation: {{ showData($profile->father_occupation) }} <br>
    Mother's Occupation: {{ showData($profile->mother_occupation) }} <br>
    Guardian Name: {{ showData($profile->parent_guardian_name) }} <br>
    Guardian Contact: {{ showData($profile->parent_guardian_contact) }} <br>
    Sisters: {{ $profile->number_of_sisters ?? 0 }} <br>
    Brothers: {{ $profile->number_of_brothers ?? 0 }} <br>
    Position: {{ $profile->ordinal_position ?? 'N/A' }} <br>
@else
    No profile found.
@endif
