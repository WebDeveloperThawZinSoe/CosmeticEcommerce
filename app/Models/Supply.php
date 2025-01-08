<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'varaint_product_id',
        'type',
        'qty',
        'description',
        'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Correct the foreign key
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariants::class,"varaint_product_id");
    }
}
