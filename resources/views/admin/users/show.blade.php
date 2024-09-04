@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">User Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users List</a>
        </div>
    </div>
</div>
@endsection
