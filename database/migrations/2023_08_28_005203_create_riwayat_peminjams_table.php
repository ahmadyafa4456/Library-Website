<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_peminjams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('buku_id')->constrained('bukus', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_wajib_kembali');
            $table->date('tanggal_pengembalian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_peminjams');
    }
};