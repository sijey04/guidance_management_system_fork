<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
    <li class="me-2">
        <a href="{{ route('students.profile', $student->id) }}"
           class="inline-block p-4 rounded-t-lg 
                  {{ request()->routeIs('students.profile') ? 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-blue-500' : 'hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">
            Profile
        </a>
    </li>
    <li class="me-2">
        <a href="{{ route('students.enrollment', $student->id) }}"
           class="inline-block p-4 rounded-t-lg 
                  {{ request()->routeIs('students.enrollment') ? 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-blue-500' : 'hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">
            Enrollment History
        </a>
    </li>
    <li class="me-2">
        <a href="{{ route('students.counseling', $student->id) }}"
           class="inline-block p-4 rounded-t-lg 
                  {{ request()->routeIs('students.counseling') ? 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-blue-500' : 'hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">
            Counseling
        </a>
    </li>
    <li class="me-2">
        <a href="{{ route('students.referral', $student->id) }}"
           class="inline-block p-4 rounded-t-lg 
                  {{ request()->routeIs('students.referral') ? 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-blue-500' : 'hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300' }}">
            Referrals
        </a>
    </li>
</ul>
