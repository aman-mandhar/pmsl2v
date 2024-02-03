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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('name'); // Product name
            $table->integer('gst')->default(0); // GST % applicable at item
            $table->string('description')->nullable(); // Product Description
            $table->string('type')->default('Pack');
            $table->unsignedBigInteger('category_id'); // Reference to product_categories table
            $table->unsignedBigInteger('subcategory_id')->nullable(); // Reference to product_subcategories table
            $table->unsignedBigInteger('variation_id')->nullable(); // Reference to product_variations table
            $table->unsignedBigInteger('token_id')->default(1); // Reference to tokens table
            $table->string('prod_pic')->nullable(); // Product picture (assuming you'd store the file path here)
            $table->timestamps(); 
        
            $table->foreign('subcategory_id')->references('id')->on('product_subcategories')->onDelete('set null');
            $table->foreign('variation_id')->references('id')->on('product_variations')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('token_id')->references('id')->on('tokens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
