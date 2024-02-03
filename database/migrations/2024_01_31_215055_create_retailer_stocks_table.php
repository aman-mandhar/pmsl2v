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
        Schema::create('retailer_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('retailer_id');
            $table->integer('qty');
            $table->decimal('weight', 10, 2);
            $table->unsignedBigInteger('subwarehouse_id')->default('1');        
            $table->timestamps();

            // stock_id is a foreign key referencing stocks table:
            $table->foreign('stock_id')->references('id')->on('stocks');

            // retailer_id is a foreign key referencing retailers table:
            $table->foreign('retailer_id')->references('id')->on('stores');

            // subwarehouse_id is a foreign key referencing subwarehouses table:
            $table->foreign('subwarehouse_id')->references('id')->on('subwarehouses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retailer_stocks');
    }
};
