<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function createMenu(Request $request){
        $validatedData = $request->validate([
            'name'=>'string|max:255|required',
            'description'=>'string',

        ]);
        $menu = Auth::user()->menus()->create($validatedData);
        return $menu;
    }

    /**
     * @param Menu $menu
     * @param Request $request
     * @return mixed
     */
    public function updateMenu(Menu $menu, Request $request){
        if (Auth::id() != $menu->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $validatedData = $request->validate([
            'name'=>'string|max:255',
            'description'=>'string',

        ]);
        $menu->update($validatedData);
        return $menu;
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
        $product->menus()->attach($menu->id);
        return response()->json(['message'=>'success'],200);
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
        return response()->json(['message'=>'success'],200);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenu(Menu $menu){
        if (Auth::id() != $menu->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        return response()->json(['menu'=>$menu, 'products' => $menu->products]);
    }
    public function getMenus(){
        return response()->json(['menu'=>Auth::user()->menus]);
    }


}
