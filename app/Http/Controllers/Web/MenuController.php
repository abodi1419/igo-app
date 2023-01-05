<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $menus = Auth::user()->menus;
        return view('menus.index',compact('menus'));
    }
    public function create(){
        return view('menus.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'string|max:255|required',
            'description'=>'',

        ]);
        $menu = Auth::user()->menus()->create($validatedData);
        return redirect()->back()->with(['message'=>'"'.$menu->name.'" '.__('was created successfully')]);
    }

    public function edit(Menu $menu){
        if(Auth::id() != $menu->user_id){
            abort(401,"You don't own this resource");
        }
        return view('menus.edit',compact('menu'));
    }
    /**
     * @param Menu $menu
     * @param Request $request
     * @return mixed
     */
    public function update(Menu $menu, Request $request){
        if(Auth::id() != $menu->user_id){
            abort(401,"You don't own this resource");
        }
        $validatedData = $request->validate([
            'name'=>'string|max:255|required',
            'description'=>'',

        ]);
        $menu->update($validatedData);
        return redirect()->back()->with(['message'=>'Updated successfully']);
    }
    /**
     * @param Menu $menu
     * @param Product $product
     *
     */
    public function addProduct(Menu $menu, Product $product){
        if (Auth::id() != $menu->user_id || Auth::id() != $product->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $product->menus()->syncWithoutDetaching($menu->id);
        return response()->json($product->id);
    }

    /**
     * @param Menu $menu
     * @param Product $product
     *
     */
    public function removeProduct(Menu $menu, Product $product ){
        if (Auth::id() != $menu->user_id || Auth::id() != $product->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $product->menus()->detach($menu->id);
        return response()->json($product->id,200);
    }


    /**
     * @param Request $request
     * @param Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function products(Request $request, Menu $menu)

    {
        if(Auth::id()!=$menu->user_id){
            abort(401,"You dont own this resource!");
        }

        $products = Auth::user()->products()->paginate(6);


        if ($request->ajax()) {

            $view = view('menus.__data',compact('products','menu'))->render();

            return response()->json(['html'=>$view]);

        }


        return view('menus.edit_products',compact('products','menu'));

    }


}
