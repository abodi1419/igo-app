<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OptionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    /**
     * @param User $restaurant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(User $restaurant){
        $options = $restaurant->options;
        return view('admin.options.index',compact('options','restaurant'));
    }

    /**
     * @param User $restaurant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(User $restaurant){
        return view('admin.options.create',compact('restaurant'));
    }

    /**
     * @param User $restaurant
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(User $restaurant, Request $request){
        $validatedData = $request->validate([
            'option'=>'string|max:255|required',
            'option_ar'=>'string|max:255|required',
            'price'=>'numeric|required|min:0',
            'description'=>'',
            'description_ar'=>'',
        ]);

        $option = $restaurant->options()->create($validatedData);
        if(app()->getLocale()=='ar'){
            return redirect()->back()->with(['message'=>'"'.$option->option_ar.'" '.__('was created successfully')]);
        }else{
            return redirect()->back()->with(['message'=>'"'.$option->option.'" '.__('was created successfully')]);

        }
    }

    /**
     * @param ProductOption $productOption
     * @param User $restaurant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ProductOption $productOption,User $restaurant){
        return view('admin.options.edit',compact('productOption','restaurant'));
    }

    /**
     * @param ProductOption $productOption
     * @param User $restaurant
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductOption $productOption,User $restaurant, Request $request){

        $validatedData = $request->validate([
            'option'=>'string|max:255|required',
            'option_ar'=>'string|max:255|required',
            'price'=>'numeric|required|min:0',
            'description'=>'',
            'description_ar'=>'',
        ]);

        $productOption->update($validatedData);
        return redirect()->back()->with(['message'=>('Updated successfully')]);
    }
}
