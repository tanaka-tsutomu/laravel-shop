<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function ProductCategory(){
        return $this->belongsTo(ProductCategory::class);
    }

    protected $fillable = [
        'product_category_id', 'name', 'price', 'description', 'image_path', 'delete_image'
    ];
}
