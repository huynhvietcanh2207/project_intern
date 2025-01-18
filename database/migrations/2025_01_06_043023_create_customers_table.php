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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); 
            $table->string('group')->nullable(); // Thêm cột "group"
            $table->string('customer_code')->unique(); // Mã khách hàng
            $table->string('name');
            $table->string('address');
            $table->string('phone', 15);
            $table->string('email')->unique();
            $table->string('tax_code')->nullable(); // Mã số thuế
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
