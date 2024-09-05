<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BilliardTable extends Model
{
    protected $primaryKey = 'Id_Tables';
    public $incrementing = false; // Since the primary key is not an integer
    protected $keyType = 'char'; // Primary key type is 'char'

    protected $fillable = [
        'Id_Tables', 'Table_number', 'Status', 'Description', 'Customers_Id_Customers',
    ];

    // Relationship to customers (optional if assigned)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customers_Id_Customers', 'Id_Customers');
    }

    // Relationship to reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'BilliardTable_Id_Tables', 'Id_Tables');
    }
}

