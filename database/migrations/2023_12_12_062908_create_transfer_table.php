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
        Schema::create('transfer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('weight', 8, 3)->nullable();
            $table->integer('qnty')->nullable();
            $table->decimal('points', 8, 2);
            $table->unsignedBigInteger('to_subwarehouse_id');
            $table->unsignedBigInteger('to_store_id');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('to_subwarehouse_id')->references('id')->on('subwarehouses');
            $table->foreign('to_store_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer');
    }
};
