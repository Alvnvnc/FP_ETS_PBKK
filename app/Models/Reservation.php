<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $primaryKey = 'Id_reservations';
    public $incrementing = false; // Disable auto-increment for non-integer primary keys
    protected $keyType = 'char'; // Primary key type is 'char'

    protected $fillable = [
        'Id_reservations', 'ReservationDate', 'Start_time', 'End_time', 'Status', 'Customers_Id_Customers', 'BilliardTable_Id_Tables',
    ];

    // Relationship to customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customers_Id_Customers', 'Id_Customers');
    }

    // Relationship to billiard table
    public function billiardTable()
    {
        return $this->belongsTo(BilliardTable::class, 'BilliardTable_Id_Tables', 'Id_Tables');
    }
}
