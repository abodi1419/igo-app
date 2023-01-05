<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(User $restaurant){
        $productsCategories = $restaurant->productsCategories;
        return view('admin.categories.index',compact('productsCategories','restaurant'));
    }

    public function create(User $restaurant){
        return view('admin.categories.create',compact('restaurant'));
    }

    public function store(User $restaurant, Request $request){
        $validatedData = $request->validate([
            'name'=>'string|min:2|max:255|required',
            'name_ar'=>'string|min:2|max:255|required',
            'index'=>'integer|required',
            'description'=>'',
            'description_ar'=>'',
        ]);
        $category = $restaurant->productsCategories()->create($validatedData);
        if(app()->getLocale()=='ar'){
            return redirect()->back()->with(['message'=>'"'.$category->name_ar.'" '.__('was created successfully')]);
        }else{
            return redirect()->back()->with(['message'=>'"'.$category->name.'" '.__('was created successfully')]);
        }

    }



    public function edit(ProductCategory $productsCategory, User $restaurant){

        return view('admin.categories.edit',compact('productsCategory','restaurant'));
    }

    public function update(Request $request, ProductCategory $productsCategory,User $restaurant){

        $validatedData = $request->validate([
            'name'=>'string|min:2|max:255|required',
            'name_ar'=>'string|min:2|max:255|required',
            'index'=>'integer|required',
            'description'=>'',
            'description_ar'=>'',
        ]);
        $productsCategory->update($validatedData);
        return redirect()->back()->with(['message'=>__("Updated successfully")]);
    }

    /**
     * @param ProductCategory $productsCategory
     * @param Product $product
     *
     */
    public function addProduct(ProductCategory $productsCategory, Product $product){
        $product->categories()->syncWithoutDetaching($productsCategory->id);
        return response()->json($product->id);
    }

    /**
     * @param ProductCategory $productsCategory
     * @param Product $product
     *
     */
    public function removeProduct(ProductCategory $productsCategory, Product $product ){
        $product->categories()->detach($productsCategory->id);
        return response()->json($product->id,200);
    }


    /**
     * @param Request $request
     * @param ProductCategory $productsCategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function products(Request $request, ProductCategory $productsCategory, User $restaurant)

    {
//        dd($productsCategory);

        $products = $restaurant->products()->paginate(6);


        if ($request->ajax()) {

            $view = view('admin.categories.__data',compact('products','productsCategory','restaurant'))->render();

            return response()->json(['html'=>$view]);

        }


        return view('admin.categories.edit_products',compact('products','productsCategory','restaurant'));

    }
}
