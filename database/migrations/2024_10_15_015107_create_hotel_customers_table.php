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
        Schema::create('hotel_customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('hotel_orders')->onDelete('cascade');
            $table->string('contactNumber', 25);
            $table->string('email', 100);
            $table->enum('identityType', ['KTP', 'SIM', 'Passport']);
            $table->string('identityNumber', 50)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_customers');
    }
};
