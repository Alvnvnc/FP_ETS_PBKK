<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Welcome to the Admin Dashboard</h1>
    <p>This is a minimalistic admin dashboard with a sidebar navigation.</p>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">View and manage users within the application.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Go to User List</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Settings</h5>
                    <p class="card-text">Adjust application settings and preferences.</p>
                    <a href="#" class="btn btn-primary">Go to Settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
