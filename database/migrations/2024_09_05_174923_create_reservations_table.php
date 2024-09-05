<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->char('Id_reservations', 6)->primary();
            $table->date('ReservationDate');
            $table->dateTime('Start_time');
            $table->dateTime('End_time');
            $table->string('Status', 30); // e.g., Pending, Confirmed, Canceled
            $table->char('Customers_Id_Customers', 6);
            $table->char('BilliardTable_Id_Tables', 6);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('Customers_Id_Customers')->references('Id_Customers')->on('customers')->onDelete('cascade');
            $table->foreign('BilliardTable_Id_Tables')->references('Id_Tables')->on('billiard_tables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
