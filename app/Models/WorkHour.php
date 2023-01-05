<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHour extends Model
{
    use HasFactory;
    protected $fillable = [
        'form',
        'to',
        'work_day_id'
    ];

    public function workday(){
        return $this->belongsTo(WorkDay::class,'work_day_id','id');
    }
}
