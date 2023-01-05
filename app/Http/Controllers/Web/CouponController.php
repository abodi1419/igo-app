<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Auth::user()->coupons;
        return view('coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validatedData = $request->validate([
            'code'=>'string|min:2|max:10|required|unique:coupons,code',
            'discount' => 'numeric|min:1|max:100|required',
            'total_required'=>'numeric|min:0|required',
            'description'=>'',
            'start_date'=>'before:end_date|date_format:Y-m-d\TH:i|after_or_equal:'. date(DATE_ATOM).'|required',
            'end_date'=>'after:start_date|date_format:Y-m-d\TH:i|required',
        ]);
        if($request->has('has_max')){
            $request->validate([
                'max_value' => 'numeric|min:1|required'
            ]);
            $validatedData['has_max_value'] = 1;
            $validatedData['max_value']=$request->max_value;
        }
        $startDate = $validatedData['start_date'];
        $exploded = explode('T',$startDate);
        $validatedData['start_date'] = $exploded[0].' '.$exploded[1].':00';
        $endDate= $validatedData['end_date'];
        $exploded = explode('T',$endDate);
        $validatedData['end_date'] = $exploded[0].' '.$exploded[1].':00';

        $coupon = Auth::user()->coupons()->create($validatedData);
        return redirect()->back()->with(['message'=>__('Coupon with code ').$coupon->code.' '.__('was created successfully')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        if(Auth::id() != $coupon->user_id){
            abort(401,'You don\'t own this resource!');
        }
        return view('coupons.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        if(Auth::id() != $coupon->user_id){
            abort(401,'You don\'t own this resource!');
        }
        $validatedData = $request->validate([
            'code'=>'string|min:2|max:10|required|unique:coupons,code,'.$coupon->id,
            'discount' => 'numeric|min:1|max:100|required',
            'total_required'=>'numeric|min:0|required',
            'description'=>'',
            'start_date'=>'before:end_date|date_format:Y-m-d\TH:i|after_or_equal:'. date(DATE_ATOM).'|required',
            'end_date'=>'after:start_date|date_format:Y-m-d\TH:i|required',
        ]);
        if($request->has('has_max')){
            $request->validate([
                'max_value' => 'numeric|min:1|required'
            ]);
            $validatedData['has_max_value'] = 1;
            $validatedData['max_value']=$request->max_value;
        }else{
            $validatedData['has_max_value'] = null;
            $validatedData['max_value']=null;
        }
        $startDate = $validatedData['start_date'];
        $exploded = explode('T',$startDate);
        $validatedData['start_date'] = $exploded[0].' '.$exploded[1].':00';
        $endDate= $validatedData['end_date'];
        $exploded = explode('T',$endDate);
        $validatedData['end_date'] = $exploded[0].' '.$exploded[1].':00';
        $coupon->update($validatedData);
        return redirect()->back()->with(['message'=>__('Updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }

    public function enable(Coupon $coupon){
        if(Auth::id() != $coupon->user_id){
            abort(401,'You don\'t own this resource!');
        }
        $coupon->status = 1;
        $coupon->save();
        return redirect()->back()->with(['message'=>__("Coupon")." '".$coupon->code."' ".__("enabled and customers can use it")]);
    }

    public function disable(Coupon $coupon){
        if(Auth::id() != $coupon->user_id){
            abort(401,'You don\'t own this resource!');
        }
        $coupon->status = 0;
        $coupon->save();
        return redirect()->back()->with(['message'=>__("Coupon")." '".$coupon->code."' ".__("disabled and customers can not use it anymore")]);
    }


}
