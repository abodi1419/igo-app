<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'product_id',
        'user_id',
        'customer_id',
        'branch_id',
        'product_name',
        'product_name_ar',
        'quantity',
        'price',
        'notes',
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id','id');
    }
    public function restaurant(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function saleOptions(){
        return $this->hasMany(SaleOption::class,'invoice_sale_id','id');
    }








}
