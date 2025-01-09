<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'image',
        'category_id',
        'sub_category_id',
        'status',
        'short_description',
        'description',
        'min_stock',
        'product_type',
        'pre_order',
        'discount_type',
        'discount_amount',
        'images',
        "brand_id",
        "country"
    ];

    /**
     * Get the category associated with the product.
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * Get the subcategory associated with the product.
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    /**
     * Get the cards associated with the product.
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    /**
     * Get the order details associated with the product.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }


    public function variants()
    {
        return $this->hasMany(ProductVariants::class);
    }

    public function supply()
    {
        return $this->hasMany(Supply::class);
    }

    public function getImagesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

}
