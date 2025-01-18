<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); 
            $table->string('group')->nullable(); 
            $table->string('supplier_code')->unique(); 
            $table->string('name'); 
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable(); 
            $table->string('tax_code')->nullable(); 
            $table->text('notes')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
