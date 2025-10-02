<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Database Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">
                                    Warning: Destructive Action
                                </h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <p>This action will permanently delete ALL data from the database. This cannot be undone.</p>
                                    <ul class="list-disc pl-5 mt-2">
                                        <li>All student records will be deleted</li>
                                        <li>All counseling, contract, and referral records will be deleted</li>
                                        <li>All user accounts (except database structure) will be deleted</li>
                                        <li>System will need to be re-seeded after clearing</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-3">Clear Database</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                This will truncate all tables (except migrations) and remove all data from the database.
                            </p>
                            
                            <form method="POST" action="{{ route('admin.db-clear.execute') }}" onsubmit="return confirm('Are you absolutely sure you want to clear the entire database? This action cannot be undone!');">
                                @csrf
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200">
                                    Clear Database
                                </button>
                            </form>
                        </div>

                        <div class="border-t pt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">After Clearing Database</h3>
                            <p class="text-sm text-gray-600 mb-2">After clearing the database, you'll need to:</p>
                            <ol class="list-decimal pl-5 text-sm text-gray-600 space-y-1">
                                <li>Visit the <a href="{{ route('setup') }}" class="text-blue-600 hover:text-blue-800">Setup Page</a> to re-seed basic data</li>
                                <li>Create new user accounts</li>
                                <li>Import or re-enter student data</li>
                            </ol>
                        </div>

                        <div class="border-t pt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">Alternative Options</h3>
                            <div class="space-y-2 text-sm text-gray-600">
                                <p><strong>Via Railway CLI (if mysql client is available):</strong></p>
                                <code class="bg-gray-100 p-2 rounded block">railway connect MySQL</code>
                                <p class="mt-2"><strong>Via Railway Dashboard:</strong></p>
                                <p>Go to your Railway project → MySQL service → Data tab → Delete tables manually</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>