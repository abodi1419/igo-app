<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_ar',
        'description',
        'description_ar',
    ];


    public function restaurants(){
        return $this->belongsToMany(User::class,'user_restaurant_categories','category_id','user_id');
    }

}
