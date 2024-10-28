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
        Schema::create('hotel_locations', function (Blueprint $table) {
            $table->id();
            $table->text('address', );
            $table->string('city', 45);
            $table->string('postalCode', 45);
            $table->string('latitude', 255);
            $table->string('longitude', 225);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_locations');
    }
};
