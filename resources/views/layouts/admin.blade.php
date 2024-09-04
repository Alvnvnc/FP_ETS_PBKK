<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tautan ke file CSS Bootstrap dan CSS kustom dashboard -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a2e;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #e6e6e6;
        }
        #sidebar-wrapper {
            background-color: #162447;
            min-height: 100vh;
            padding: 20px;
        }
        .sidebar-heading {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            color: #e6e6e6;
            margin-bottom: 20px;
        }
        .list-group-item {
            background-color: transparent;
            border: none;
            color: #e6e6e6;
        }
        .list-group-item:hover {
            background-color: #1f4068;
            color: #fff;
        }
        #page-content-wrapper {
            padding: 20px;
        }
        .navbar {
            background-color: #1a1a2e;
            border-bottom: 1px solid #1f4068;
        }
        .btn-logout {
            color: #e6e6e6;
            background-color: transparent;
            border: 1px solid #e6e6e6;
        }
        .btn-logout:hover {
            background-color: #e6e6e6;
            color: #1a1a2e;
        }
    </style>
</head>
<body>
    <div id="wrapper" class="d-flex">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Dashboard</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action">User List</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <!-- Tidak ada tombol toggle menu -->
                    <div class="ml-auto">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-logout">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>

            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Tautan ke file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
