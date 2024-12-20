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
        Schema::table('checkouts', function (Blueprint $table) {
            $table->timestamp('tgl_pembelian')->nullable()->after('status_pembayaran');
            $table->timestamp('tgl_pembayaran')->nullable()->after('tgl_pembelian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropColumn('tgl_pembelian');
            $table->dropColumn('tgl_pembayaran');
        });
    }
};
