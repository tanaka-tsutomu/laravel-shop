<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
public function Product(){
    return $this->hasMany(Product::class);
}

    protected $fillable = [
        'name', 'order_no',
    ];
}
