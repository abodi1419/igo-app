<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'restaurant_id'=>'integer|required',
            'branch_id'=>'integer|required',
            'coupon'=>'string|max:100|nullable',
            'type'=>'integer|required',
            'number_of_people'=>'integer|nullable',
            'arrival_time'=>'date_format:Y-m-d\TH:i|after_or_equal:'. date(DATE_ATOM).'|required',
            'notes'=>'string|nullable',
            'products'=>'array|required',
            'products.*'=>'integer',
            'quantities'=>'array|required',
            'quantities.*'=>'integer',
            'sales_notes'=>'array|required',
            'sales_notes.*'=>'string|nullable',
        ]);
        dd($validatedData);
    }
}
