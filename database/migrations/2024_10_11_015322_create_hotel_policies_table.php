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
        Schema::create('hotel_policies', function (Blueprint $table) {
            $table->id();
            $table->string('policyname', 45);
            $table->string('description',);
            $table->string('checkinprocedure',45);
            $table->string('checkoutprocedure',45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_policies');
    }
};
