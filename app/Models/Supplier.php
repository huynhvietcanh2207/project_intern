<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'supplier_code',
        'name',
        'address',
        'phone',
        'email',
        'tax_code',
        'notes',
    ];
}
