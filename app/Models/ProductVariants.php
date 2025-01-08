<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    use HasFactory;

    // Specify the table name if different from the default
    protected $table = 'product_variants';

    // Define fillable properties
    protected $fillable = [
        'product_id',
        'attribute_name',
        'attribute_value',
        'price',
        'stock',
        'image',
        'status',
        'product_type',
        'discount_type',
        'discount_amount',
        'images'
    ];

    // Relationship to the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Optionally, you can add other useful methods here
    public function isAvailable(): bool
    {
        return $this->stock > 0 && $this->status === 1;
    }
}
