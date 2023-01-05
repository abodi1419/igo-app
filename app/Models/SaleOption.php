<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_sale_id',
        'user_id',
        'product_option_id',
        'option',
        'option_ar',
        'price',
    ];

    public function restaurant(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function productOption(){
        return $this->belongsTo(ProductOption::class,'product_option_id','id');
    }

    public function invoiceSale(){
        return $this->belongsTo(InvoiceSale::class,'invoice_sale_id','id');
    }
}
