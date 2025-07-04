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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('NAMA')->nullable();
            $table->string('COFFEE')->nullable();
            $table->integer('JUMLAH')->nullable();
            $table->decimal('TOTAL_HARGA', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['NAMA', 'COFFEE', 'JUMLAH', 'TOTAL_HARGA']);
        });
    }
};
