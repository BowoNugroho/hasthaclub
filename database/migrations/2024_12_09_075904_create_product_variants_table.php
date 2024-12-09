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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->uuid('color_id');
            $table->uuid('capacity_id');
            $table->string('harga')->nullable();
            $table->string('jenis_diskon')->nullable(); //jenis diskon misal % atau nominal
            $table->string('jumlah_diskon')->nullable();
            $table->string('harga_diskon')->nullable();
            $table->string('stock')->nullable();
            $table->text('deskripsi')->nullable();
            $table->boolean('status')->default(false);
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
