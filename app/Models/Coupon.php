<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount',
        'user_id',
        'has_max_value',
        'max_value',
        'total_required',
        'start_date',
        'end_date',
        'description',
    ];

    public function restaurant(){
        return $this->belongsTo(User::class);
    }
}
