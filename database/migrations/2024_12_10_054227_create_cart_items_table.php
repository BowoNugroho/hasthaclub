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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cart_id');
            $table->uuid('product_variant_id');
            $table->uuid('store_id')->nullable();
            $table->uuid('sales_mitra_id')->nullable();
            $table->uuid('sales_to_id')->nullable();
            $table->string('qty')->nullable();
            $table->string('kode_voucher')->nullable();
            $table->string('harga')->nullable();
            $table->string('total_harga')->nullable();
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
        Schema::dropIfExists('cart_items');
    }
};
