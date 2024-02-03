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
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Untitled Token');
            $table->string('values_in')->default('Percentage');
            $table->decimal('discount', 10, 2)->default(0.00);
            $table->integer('retailer')->default(0);
            $table->integer('retailer_ref')->default(0);
            $table->integer('sub_warehouse')->default(0);
            $table->integer('sub_warehouse_ref')->default(0);
            $table->integer('merchant')->default(0);
            $table->integer('merchant_ref')->default(0);
            $table->integer('vendor')->default(0);
            $table->integer('vendor_ref')->default(0);
            $table->integer('customer');
            $table->integer('referrer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};
