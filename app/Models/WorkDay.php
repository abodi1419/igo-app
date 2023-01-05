<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'branch_id',
        'status'
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function workHours(){
        return $this->hasMany(WorkHour::class,'work_day_id','id');
    }
}
