@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Judul Halaman -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">User List</h1>
        <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow">
            <i class="fas fa-user-plus"></i> Create New User
        </a>
    </div>

    <!-- Alert untuk pesan sukses -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel responsif -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="user-table">
                @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $user->id }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $user->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $user->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('users.show', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-600 hover:text-yellow-900 ml-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-3">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginasi -->
    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let searchInput = document.getElementById('search');
        let userTable = document.getElementById('user-table');

        searchInput.addEventListener('keyup', function() {
            let searchTerm = searchInput.value.toLowerCase();
            let rows = userTable.getElementsByTagName('tr');

            Array.from(rows).forEach(function(row) {
                let name = row.cells[1].textContent.toLowerCase();
                let email = row.cells[2].textContent.toLowerCase();

                if (name.includes(searchTerm) || email.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
