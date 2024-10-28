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
        Schema::create('villaresort_informasis', function (Blueprint $table) {
            $table->id();
            $table->string('villaresortname'); 
            $table->string('location');
            $table->text('description');
            $table->decimal('startingPrice', 10, 2);
            $table->decimal('price', 10, 2);
            $table->string('gambar');
            $table->string('checkInTime');
            $table->string('checkOutTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villaresort_informasis');
    }
};
