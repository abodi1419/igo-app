<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'name_ar',
        'calories',
        'price',
        'description',
        'description_ar',
    ];

    public function restaurant(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function menus(){
        return $this->belongsToMany(Menu::class,'product_menus','product_id','menu_id');
    }
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function options(){
        return $this->belongsToMany(ProductOption::class,'product_options_relations','product_id','option_id');
    }

    public function categories(){
        return $this->belongsToMany(ProductCategory::class,'product_category_relationships','product_id','product_category_id');
    }
}
