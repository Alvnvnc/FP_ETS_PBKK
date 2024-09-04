<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Display the user list.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function users()
    {
        $users = User::all(); // Dapatkan semua pengguna
        return view('admin.users.index', compact('users'));
    }
}
