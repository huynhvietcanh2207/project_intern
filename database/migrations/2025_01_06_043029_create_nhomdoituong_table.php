<?php
// Migration cho bảng 'nhomdoituong'
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nhomdoituong', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id(); 
            $table->string('ma_doi_tuong');
            $table->string('ten_nhom_doi_tuong');
            $table->string('loai_nhom_doi_tuong');
            $table->unsignedBigInteger('customer_id')->nullable(); 
            $table->unsignedBigInteger('employee_id')->nullable(); 
            $table->timestamps();

            // Ràng buộc khóa ngoại
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('nhomdoituong', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['employee_id']);
        });
        Schema::dropIfExists('nhomdoituong');
    }
};