<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'discount_amount',
        "amount_limit"
    ];


    public function customers()
    {
        return $this->hasMany(CustomerType::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_type');
    }

}
