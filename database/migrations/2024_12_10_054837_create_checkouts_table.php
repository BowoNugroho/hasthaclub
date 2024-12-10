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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('invoice');
            $table->uuid('cart_id');
            $table->uuid('user_id');
            $table->uuid('store_id')->nullable();
            $table->uuid('sales_mitra_id')->nullable();
            $table->uuid('sales_to_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_no_hp')->nullable();
            $table->string('customer_email')->nullable();
            $table->text('customer_alamat')->nullable();
            $table->text('catatan')->nullable();
            $table->string('harga')->nullable();
            $table->string('total_harga')->nullable();
            $table->string('pick_up_type')->nullable();
            $table->string('order_status')->nullable();
            $table->text('bukti_pembayaran_img')->nullable();
            $table->boolean('status_pembayaran')->default(false);
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
        Schema::dropIfExists('checkouts');
    }
};
