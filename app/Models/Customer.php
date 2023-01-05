<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'name',
        'phone',
        'image',
        'city',
    ];

    public function invoices(){
        return $this->hasMany(Invoice::class,'customer_id','id');
    }

    public function invoiceSales(){
        return $this->hasMany(InvoiceSale::class,'customer_id','id');
    }
}
