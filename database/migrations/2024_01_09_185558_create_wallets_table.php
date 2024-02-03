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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_id');
            $table->unsignedBigInteger('bill_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('direct', 10, 2)->default(0);
            $table->decimal('customer_ref', 10, 2)->default(0);
            $table->decimal('store_ref', 10, 2)->default(0);
            $table->decimal('subwarehouse_ref', 10, 2)->default(0);
            $table->decimal('warehouse_ref', 10, 2)->default(0);
            $table->decimal('merchant_ref', 10, 2)->default(0);
            $table->decimal('vendor_ref', 10, 2)->default(0);
            $table->decimal('employee_ref', 10, 2)->default(0);
            $table->decimal('bp_ref', 10, 2)->default(0);
            $table->decimal('transporter_ref', 10, 2)->default(0);
            $table->decimal('delivery_ref', 10, 2)->default(0);
            $table->decimal('poola', 10, 2)->default(0);
            $table->decimal('poolb', 10, 2)->default(0);
            $table->decimal('poolc', 10, 2)->default(0);
            $table->decimal('poold', 10, 2)->default(0);
            $table->decimal('poole', 10, 2)->default(0);
            $table->decimal('poolf', 10, 2)->default(0);
            $table->decimal('poolg', 10, 2)->default(0);
            $table->decimal('used', 10, 2)->default(0);
            $table->timestamps();

            // user_id is a foreign key referencing users table:
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->foreign('transfer_id')->references('id')->on('transfer');
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet');
    }
};
