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
        
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->decimal('weight', 8, 3)->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('pur_value', 8, 2);
            $table->decimal('gst');
            $table->decimal('mrp', 8, 2);
            $table->decimal('expences', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('subwarehouse_tokens', 8, 2)->nullable();
            $table->decimal('subwarehouse_ref_tokens', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2);
            $table->decimal('profit_before_discount_tokens', 8, 2);
            $table->decimal('profit_after_discount_tokens', 8, 2);
            $table->decimal('profit_after_tokens', 8, 2);
            $table->string('pur_bill_pic')->nullable();
            $table->string('pur_bill_no')->nullable();
            $table->date('pur_date')->nullable();
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('barcode')->nullable();
            $table->string('batch_no')->nullable();
            $table->date('mfg_date')->nullable();
            $table->date('exp_date')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            

        
            // Add any other fields as needed
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
