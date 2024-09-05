<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'Id_Customers';
    public $incrementing = false; // Disable auto-increment for non-integer primary keys
    protected $keyType = 'char'; // Primary key type is 'char'
    
    protected $fillable = ['Id_Customers', 'Name', 'Phone_number'];

    // Example relationships, if applicable:
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'Customers_Id_Customers', 'Id_Customers');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'Customers_Id_Customers', 'Id_Customers');
    }
}
