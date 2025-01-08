<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'description'
    ];


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id'); // Specify the foreign key here
    }

}
