<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function restaurant(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_menus','menu_id','product_id');
    }
}
