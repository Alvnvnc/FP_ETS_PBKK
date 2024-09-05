<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\BilliardTable;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // Get all reservations for the logged-in user
        $reservations = Reservation::where('Customers_Id_Customers', auth()->user()->Id_Customers)
                                    ->paginate(10);

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        // Fetch all available billiard tables
        $tables = BilliardTable::where('Status', 'Available')->get();

        return view('reservations.create', compact('tables'));
    }

    public function store(Request $request)
    {
        // Validate the reservation details
        $request->validate([
            'ReservationDate' => 'required|date',
            'Start_time' => 'required|date_format:Y-m-d H:i:s',
            'End_time' => 'required|date_format:Y-m-d H:i:s|after:Start_time',
            'BilliardTable_Id_Tables' => 'required|exists:billiard_tables,Id_Tables',
        ]);

        // Create a new reservation
        Reservation::create([
            'Id_reservations' => uniqid(), // Generate unique reservation ID
            'ReservationDate' => $request->ReservationDate,
            'Start_time' => $request->Start_time,
            'End_time' => $request->End_time,
            'Status' => 'Pending',
            'Customers_Id_Customers' => auth()->user()->Id_Customers,
            'BilliardTable_Id_Tables' => $request->BilliardTable_Id_Tables,
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }
}

