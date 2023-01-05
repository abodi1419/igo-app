<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $options = Auth::user()->options;
        return view('options.index',compact('options'));
    }
    public function create(){
        return view('options.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'option'=>'string|max:255|required',
            'option_ar'=>'string|max:255|required',
            'price'=>'numeric|required|min:0',
            'description'=>'',
            'description_ar'=>'',
        ]);

        $option = Auth::user()->options()->create($validatedData);
        if(app()->getLocale()=='ar'){
            return redirect()->back()->with(['message'=>'"'.$option->option_ar.'" '.__('was created successfully')]);
        }else{
            return redirect()->back()->with(['message'=>'"'.$option->option.'" '.__('was created successfully')]);

        }
    }

    /**
     * @param ProductOption $option
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function edit(ProductOption $option){
        if(Auth::id() != $option->user_id){
            abort(401,"You don't own this resource");
        }
        return view('options.edit',compact('option'));
    }

    /**
     * @param ProductOption $productOption
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductOption $option, Request $request){

        if(Auth::id() != $option->user_id){
            abort(401,"You don't own this resource");
        }
        $validatedData = $request->validate([
            'option'=>'string|max:255|required',
            'option_ar'=>'string|max:255|required',
            'price'=>'numeric|required|min:0',
            'description'=>'',
            'description_ar'=>'',


        ]);

        $option->update($validatedData);
        return redirect()->back()->with(['message'=>__('Updated successfully')]);
    }
}
