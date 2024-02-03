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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('stock_id');
            $table->integer('qty')->default(0)->nullable();
            $table->decimal('weight', 10, 3)->default(0)->nullable();
            $table->decimal('sale_price', 10, 2)->default(0);
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
