<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotel_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('hotel_informasis')->onDelete('cascade');
            $table->foreignId('room_id')->constrained('hotel_rooms')->onDelete('cascade');
            $table->decimal('room_price', 10, 2); // Menambahkan kolom room_price
            $table->string('discount', 100)->nullable();
            $table->string('fullname', 100);
            $table->string('contactnumber', 100);
            $table->string('email', 100);
            $table->string('note', 100);
            $table->date('checkInDate');
            $table->date('checkOutDate');
            $table->decimal('totalAmount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_orders');
    }
};
