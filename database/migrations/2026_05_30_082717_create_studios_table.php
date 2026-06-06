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
    Schema::create('studios', function (Blueprint $table) {
        $table->id();
        $table->string('nama_studio'); // <-- Pastikan baris ini ada dan tidak typo
        $table->integer('harga_per_jam');
        $table->text('deskripsi');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studios');
    }
};
