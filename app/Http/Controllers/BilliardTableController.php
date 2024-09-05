<?php

namespace App\Http\Controllers;

use App\Models\BilliardTable;
use Illuminate\Http\Request;

class BilliardTableController extends Controller
{
    public function index()
    {
        // Get all billiard tables with pagination
        $tables = BilliardTable::paginate(10);
        return view('billiard_tables.index', compact('tables'));
    }

    public function create()
    {
        return view('billiard_tables.create');
    }

    public function store(Request $request)
    {
        // Validate and store the billiard table
        $request->validate([
            'Table_number' => 'required|integer|unique:billiard_tables,Table_number',
            'Status' => 'required|string|max:30',
            'Description' => 'required|string|max:20',
        ]);

        BilliardTable::create([
            'Id_Tables' => uniqid(),
            'Table_number' => $request->Table_number,
            'Status' => $request->Status,
            'Description' => $request->Description,
        ]);

        return redirect()->route('billiard_tables.index')->with('success', 'Billiard table created successfully.');
    }

    public function edit($id)
    {
        // Find and return the billiard table for editing
        $table = BilliardTable::findOrFail($id);
        return view('billiard_tables.edit', compact('table'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the billiard table
        $request->validate([
            'Table_number' => 'required|integer|unique:billiard_tables,Table_number,' . $id . ',Id_Tables',
            'Status' => 'required|string|max:30',
            'Description' => 'required|string|max:20',
        ]);

        $table = BilliardTable::findOrFail($id);
        $table->update($request->all());

        return redirect()->route('billiard_tables.index')->with('success', 'Billiard table updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the billiard table
        $table = BilliardTable::findOrFail($id);
        $table->delete();

        return redirect()->route('billiard_tables.index')->with('success', 'Billiard table deleted successfully.');
    }
}
