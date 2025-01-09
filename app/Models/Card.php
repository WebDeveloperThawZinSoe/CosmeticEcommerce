<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable=[
        "user_id",
        "session_id",
        "product_variant_id",
        "qty",
        "coupon_code",
        "country"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product_variant()
    {
        return $this->belongsTo(ProductVariants::class);
    }

    public function cupon_code_info(){
        return $this->belongsTo(CuponCode::class,"coupon_code","id");
    }

}
