<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'name_ar',
        'email',
        'commercial_register',
        'num_of_branches',
        'phone',
        'image',
        'commission',
        'description',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function branches(){
        return $this->hasMany(Branch::class,'user_id','id');
    }

    public function menus(){
        return $this->hasMany(Menu::class,'user_id','id');
    }
    public function products(){
        return $this->hasMany(Product::class,'user_id','id');
    }
    public function options(){
        return $this->hasMany(ProductOption::class,'user_id','id');
    }
    public function categories(){
        return $this->belongsToMany(RestaurantCategory::class,'user_restaurant_categories','user_id','category_id');
    }

    public function productsCategories(){
        return $this->hasMany(ProductCategory::class,'user_id','id');
    }

    public function coupons(){
        return $this->hasMany(Coupon::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class,'user_id','id');
    }

    public function invoiceSales(){
        return $this->hasMany(InvoiceSale::class,'user_id','id');
    }

    public function SaleOption(){
        return $this->hasMany(SaleOption::class,'user_id','id');
    }
}
