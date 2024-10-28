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
        Schema::create('villaresort_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('villaresort_id')->constrained('villaresort_informasis')->onDelete('cascade');
            $table->string('roomTypeName', 45);
            $table->decimal('price', 8, 2);
            $table->string('capacity', 45);
            $table->string('gambar', 45);
            $table->text('description', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villaresort_rooms');
    }
};
