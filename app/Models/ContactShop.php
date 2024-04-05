<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactShop extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_name',
        'address',
        'phone',
        'email',
        'opening_hours'
    ];
}