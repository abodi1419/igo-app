<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Branch extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'username',
        'name',
        'name_ar',
        'password',
        'phone',
        'location',
        'street',
        'street_ar',
        'city',
        'district',
        'description',
        'user_id',
        'menu_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function restaurant(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id','id');
    }

    public function workdays(){
        return $this->hasMany(WorkDay::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class,'branche_id','id');
    }

    public function invoiceSales(){
        return $this->hasMany(InvoiceSale::class,'branche_id','id');
    }




}
