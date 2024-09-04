@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <!-- Judul Halaman -->
    <h1 class="text-center mb-5">Admin Dashboard</h1>

    <!-- Statistik atau Widget (Contoh) -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text fs-1">120</p>
                </div>
                <div class="card-footer bg-white text-center">
                    <a href="{{ route('admin.users') }}" class="text-decoration-none text-primary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">New Registrations</h5>
                    <p class="card-text fs-1">15</p>
                </div>
                <div class="card-footer bg-white text-center">
                    <a href="#" class="text-decoration-none text-primary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Server Status</h5>
                    <p class="card-text fs-1">Online</p>
                </div>
                <div class="card-footer bg-white text-center">
                    <a href="#" class="text-decoration-none text-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel atau Konten Tambahan -->
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Latest Activity</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Activity</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>User Login</td>
                        <td>2024-09-04</td>
                        <td>Success</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Admin Updated Profile</td>
                        <td>2024-09-04</td>
                        <td>Success</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>New User Registered</td>
                        <td>2024-09-03</td>
                        <td>Pending</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
