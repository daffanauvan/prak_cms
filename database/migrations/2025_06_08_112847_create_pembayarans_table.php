<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('PEMBAYARAN', function (Blueprint $table) {
            $table->bigIncrements('ID'); // Primary key
            $table->unsignedBigInteger('ID_ORDER'); // Foreign key ke ORDERS
            $table->date('TANGGAL_BAYAR');
            $table->string('METODE_BAYAR');
            $table->string('STATUS_BAYAR');
            $table->timestamps();

            // Oracle-style foreign key (harus cocok nama tabel dan kolom)
            $table->foreign('ID_ORDER')->references('ID')->on('ORDERS')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('PEMBAYARAN');
    }
};
