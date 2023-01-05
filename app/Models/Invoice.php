<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'branch_id',
        'customer_id',
        'customer_name',
        'customer_phone',
        'restaurant_name',
        'restaurant_name_ar',
        'branch_username',
        'branch_name',
        'branch_name_ar',
        'coupon',
        'type',
        'num_of_people',
        'arrival_time',
        'subtotal',
        'discount',
        'total',
        'notes',
    ];

    public function restaurant(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function invoiceSales(){
        return $this->hasMany(InvoiceSale::class, 'invoice_id','id');
    }
}
