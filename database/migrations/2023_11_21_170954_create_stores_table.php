<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ref_id')->default('1');
            $table->unsignedBigInteger(('subwarehouse_id'))->default('1');
            $table->string('store_name'); // Store Name
            $table->string('store_add'); // Store Address
            $table->string('city');
            $table->string('manager');  // Manager's Name            
			$table->string('mobile_no', 10); // Mobile Number
            $table->string('email')->unique(); // Email Address
            $table->timestamps(); // Adds created_at and updated_at

            // user_id is a foreign key referencing users table:
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ref_id')->references('id')->on('users');
            $table->foreign('subwarehouse_id')->references('id')->on('subwarehouses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
?>