<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'order_id',
        'product_variant_id',
        'price',
        'discount_type',
        'discount_amount',
        'qty',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }

    public function productVaraints()
    {
        return $this->belongsTo(ProductVariants::class, 'product_variant_id', 'id');
    }

}
