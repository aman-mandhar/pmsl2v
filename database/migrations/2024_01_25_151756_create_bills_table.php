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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('user_id');
            $table->decimal('total', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('special_discount', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2)->default(0);
            $table->decimal('gst', 10, 2)->default(0);
            $table->decimal('net_total', 10, 2)->default(0);
            $table->decimal('paid', 10, 2)->default(0);
            $table->decimal('points_customer', 10, 2)->default(0);
            $table->decimal('points_ref', 10, 2)->default(0);
            $table->decimal('points_store', 10, 2)->default(0);
            $table->decimal('points_store_ref', 10, 2)->default(0);
            $table->decimal('points_subwarehouse', 10, 2)->default(0);
            $table->decimal('points_subwarehouse_ref', 10, 2)->default(0);
            $table->decimal('points_warehouse', 10, 2)->default(0);
            $table->decimal('points_warehouse_ref', 10, 2)->default(0);
            $table->decimal('points_merchant', 10, 2)->default(0);
            $table->decimal('points_merchant_ref', 10, 2)->default(0);
            $table->decimal('points_vendor', 10, 2)->default(0);
            $table->decimal('points_vendor_ref', 10, 2)->default(0);
            $table->decimal('points_employee', 10, 2)->default(0);
            $table->decimal('points_employee_ref', 10, 2)->default(0);
            $table->decimal('points_bp', 10, 2)->default(0);
            $table->decimal('points_bp_ref', 10, 2)->default(0);
            $table->decimal('points_transporter', 10, 2)->default(0);
            $table->decimal('points_transporter_ref', 10, 2)->default(0);
            $table->decimal('points_delivery', 10, 2)->default(0);
            $table->decimal('points_delivery_ref', 10, 2)->default(0);
            $table->decimal('points_admin', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
