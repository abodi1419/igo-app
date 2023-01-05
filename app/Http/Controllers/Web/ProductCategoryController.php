<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $productsCategories = Auth::user()->productsCategories;
        return view('categories.index',compact('productsCategories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'string|min:2|max:255|required',
            'name_ar'=>'string|min:2|max:255|required',
            'index'=>'integer|required',
            'description'=>'',
            'description_ar'=>'',
        ]);
        $category = Auth::user()->productsCategories()->create($validatedData);
        if(app()->getLocale()=='ar'){
            return redirect()->back()->with(['message'=>'"'.$category->name_ar.'" '.__('was created successfully')]);
        }else{
            return redirect()->back()->with(['message'=>'"'.$category->name.'" '.__('was created successfully')]);
        }

    }



    public function edit(ProductCategory $productsCategory){
        if($productsCategory->user_id!=Auth::id()) {
            abort(401, "You don't own this resource!");
        }
        return view('categories.edit',compact('productsCategory'));
    }

    public function update(Request $request, ProductCategory $productsCategory){
        if($productsCategory->user_id!=Auth::id()) {
            abort(401, "You don't own this resource!");
        }
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
        if (Auth::id() != $productsCategory->user_id || Auth::id() != $product->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $product->categories()->syncWithoutDetaching($productsCategory->id);
        return response()->json($product->id);
    }

    /**
     * @param ProductCategory $productsCategory
     * @param Product $product
     *
     */
    public function removeProduct(ProductCategory $productsCategory, Product $product ){
        if (Auth::id() != $productsCategory->user_id || Auth::id() != $product->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $product->categories()->detach($productsCategory->id);
        return response()->json($product->id,200);
    }


    /**
     * @param Request $request
     * @param ProductCategory $productsCategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function products(Request $request, ProductCategory $productsCategory)

    {
//        dd($productsCategory);
        if(Auth::id()!=$productsCategory->user_id){
            abort(401,"You dont own this resource!");
        }

        $products = Auth::user()->products()->paginate(6);


        if ($request->ajax()) {

            $view = view('categories.__data',compact('products','productsCategory'))->render();

            return response()->json(['html'=>$view]);

        }


        return view('categories.edit_products',compact('products','productsCategory'));

    }
}
