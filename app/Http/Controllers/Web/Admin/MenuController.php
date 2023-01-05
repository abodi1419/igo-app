<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
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
        $menus = $restaurant->menus;
        return view('admin.menus.index',compact('menus','restaurant'));
    }

    /**
     * @param User $restaurant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(User $restaurant){
        return view('admin.menus.create',compact('restaurant'));
    }

    /**
     * @param User $restaurant
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(User $restaurant,Request $request){
        $validatedData = $request->validate([
            'name'=>'string|max:255|required',
            'description'=>'',

        ]);
        $menu = $restaurant->menus()->create($validatedData);
        return redirect()->back()->with(['message'=>'"'.$menu->name.'" '.__('was created successfully')]);
    }

    /**
     * @param Menu $menu
     * @param User $restaurant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Menu $menu, User $restaurant){
        return view('admin.menus.edit',compact('menu','restaurant'));
    }

    /**
     * @param Menu $menu
     * @param User $restaurant
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Menu $menu,User $restaurant, Request $request){
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
        $product->menus()->syncWithoutDetaching($menu->id);
        return response()->json($product->id);
    }

    /**
     * @param Menu $menu
     * @param Product $product
     *
     */
    public function removeProduct(Menu $menu, Product $product ){
        $product->menus()->detach($menu->id);
        return response()->json($product->id,200);
    }


    /**
     * @param Menu $menu
     * @param User $restaurant
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function products(Menu $menu, User $restaurant,Request $request)

    {

        $products = $restaurant->products()->paginate(6);


        if ($request->ajax()) {

            $view = view('admin.menus.__data',compact('products','menu','restaurant'))->render();

            return response()->json(['html'=>$view]);

        }


        return view('admin.menus.edit_products',compact('products','menu','restaurant'));

    }


}
