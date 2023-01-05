<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'option',
        'option_ar',
        'description',
        'description_ar',
        'price'
    ];
    public function products(){
        return $this->belongsToMany(Product::class,'product_options_relations','option_id','product_id');
    }
}
