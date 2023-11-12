@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Profile Info -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-semibold mb-4">User Information</h3>
                    <!-- Display user information here -->
                    <p>Name: John Doe</p>
                    <p>Email: john.doe@example.com</p>
                    <!-- Add more user details as needed -->
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-semibold mb-4">Recent Activities</h3>
                    <!-- Display recent activities here -->
                    <ul>
                        <li>Activity 1</li>
                        <li>Activity 2</li>
                        <!-- Add more activities as needed -->
                    </ul>
                </div>
            </div>

            <!-- Projects Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-semibold mb-4">Projects</h3>

                    <!-- Search Input -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search projects">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Project Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <!-- Add more table headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Display project details here -->
                            <tr>
                                <td>Project 1</td>
                                <td>Project description 1</td>
                                <!-- Add more project details as needed -->
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <!-- Additional Profile Forms -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-semibold mb-4">Update Profile Information</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-semibold mb-4">Update Password</h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-semibold mb-4">Delete User</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    @endsection
