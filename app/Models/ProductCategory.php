<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_ar',
        'index',
        'description',
        'description_ar',
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'product_category_relationships','product_category_id','product_id');
    }
    public function restaurant(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
