<!-- resources/views/user/dashboard.blade.php -->

@extends('layouts.user-dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-700">Here is your dashboard where you can manage your account and activities.</p>

        <!-- Example of a responsive grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <!-- Card 1 -->
            <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-200">
                <h3 class="text-lg font-semibold text-gray-800">Profile Settings</h3>
                <p class="text-gray-600 mt-2">Update your personal information and change your password.</p>
                <a href="{{ route('profile') }}" class="text-blue-500 mt-4 inline-block">Go to Profile &rarr;</a>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-200">
                <h3 class="text-lg font-semibold text-gray-800">Activity Log</h3>
                <p class="text-gray-600 mt-2">Check your recent activities and logs on the platform.</p>
                <a href="#" class="text-blue-500 mt-4 inline-block">View Activities &rarr;</a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-200">
                <h3 class="text-lg font-semibold text-gray-800">Support</h3>
                <p class="text-gray-600 mt-2">Need help? Contact support for assistance.</p>
                <a href="#" class="text-blue-500 mt-4 inline-block">Contact Support &rarr;</a>
            </div>
        </div>
    </div>
@endsection
