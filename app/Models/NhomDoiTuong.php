<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomDoiTuong extends Model
{
    use HasFactory;

    protected $table = 'nhomdoituong';

    protected $fillable = [
        'ma_doi_tuong', 
        'ten_nhom_doi_tuong', 
        'loai_nhom_doi_tuong',
        'customer_id', 
        'employee_id'
    ];

    // Quan hệ với bảng customers
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    // Quan hệ với bảng employees
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
