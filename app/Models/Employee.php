<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'group',
        'employee_code',
        'email',
        'password',
        'position',
        'name',
        'address',
        'phone',
    ];

    // Quan hệ với NhomDoiTuong
    public function nhomDoiTuong()
    {
        return $this->hasMany(NhomDoiTuong::class, 'employee_id');
    }
}
