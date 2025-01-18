<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

   // app/Models/Customer.php
protected $fillable = [
    'group',
    'customer_code',
    'name',
    'address',
    'phone',
    'email',
    'tax_code',
    'note'
];

    // Quan hệ với NhomDoiTuong
    public function nhomDoiTuong()
    {
        return $this->hasMany(NhomDoiTuong::class, 'customer_id');
    }
}
