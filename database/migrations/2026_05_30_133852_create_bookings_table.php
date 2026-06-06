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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('studio_id')->constrained()->onDelete('cascade'); // <-- Pastikan baris ini tertulis persis seperti ini
        $table->date('tanggal_booking');
        $table->time('jam_mulai');
        $table->integer('durasi'); 
        $table->integer('total_harga');
        $table->string('status')->default('Pending'); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
