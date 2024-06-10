<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function product_weight(){
        // return $this->belongsTo(Product_weight::class,'id','product_id');
        return $this->hasMany(Product_weight::class);
    }
    public function ProductImage(){
        return $this->hasMany(ProductImage::class);
    }

}
