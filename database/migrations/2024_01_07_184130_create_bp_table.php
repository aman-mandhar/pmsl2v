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
        Schema::create('bp', function (Blueprint $table) {
                $table->id(); // Auto-increment ID
                $table->unsignedBigInteger('user_id');
                $table->string('add'); // Warehouse Address
                $table->string('city');
                $table->string('promoter_name');
                $table->string('mobile_no', 10); // Mobile Number
                $table->string('email')->unique(); // Email Address
                $table->timestamps(); // Adds created_at and updated_at
    
                // user_id is a foreign key referencing users table:
                $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bp');
    }
};
