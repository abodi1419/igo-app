<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $products = Auth::user()->products;
        return view('products.index',compact('products'));
    }
    public function create(){
        $menus = Auth::user()->menus;
        $options = Auth::user()->options;
        $productsCategories = Auth::user()->productsCategories;
        return view('products.create',compact('menus','options','productsCategories'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'string|required|max:255',
            'name_ar'=>'string|required|max:255',
            'description'=>'',
            'description_ar'=>'',
            'calories'=>'numeric',
            'price'=>'numeric|required',
            'options'=>'array',
            'options.*'=>'int|exists:product_options,id',
            'productsCategories'=>'array|required',
            'productsCategories.*'=>'int|exists:product_categories,id',
            'images'=>'array',
            'images.*'=>'file|max:1024|mimes:png,jpg,jpeg,svg',
            'menus' => 'array|required',
            'menus.*' => 'int|exists:menus,id',
        ]);
//        dd($request->all());
        $product = Auth::user()->products()->create($validatedData);
        if($request->has('images')) {
            $images = [];
            foreach ($validatedData['images'] as $file) {
                $fileName = $file->hashName();
                $file->storeAs('public/restaurants/'. Auth::id().'/products/pr-' . $product->id, $fileName);
                array_push($images, ['name' => $fileName, 'user_id' => $product->user_id]);
            }
            $product->images()->createMany($images);
        }

        $product->menus()->sync($validatedData['menus']);
        $product->categories()->sync($validatedData['productsCategories']);
        if ($request->has('options'))
            $product->options()->sync($validatedData['options']);
        if(app()->getLocale()=='ar') {
            return redirect()->back()->with(['message' => '"'.$product->name_ar . '" ' . __('was created successfully')]);
        }
        else{
            return redirect()->back()->with(['message' => '"'.$product->name . '" ' . __('was created successfully')]);
        }

    }

    public function edit(Product $product){
        if(Auth::id() != $product->user_id){
            abort(401,"You don't own this resource");
        }
        $menus = Auth::user()->menus;
        $productsCategories = Auth::user()->productsCategories;
        $options = Auth::user()->options;
        return view('products.edit',compact('product','menus','options','productsCategories'));
    }
    /**
     * @param Product $product
     * @param Request $request
     * @return mixed
     */
    public function update(Product $product, Request $request){

        if(Auth::id() != $product->user_id){
            abort(401,"You don't own this resource");
        }
        $validatedData = $request->validate([
            'name'=>'string|required|max:255',
            'name_ar'=>'string|required|max:255',
            'description'=>'',
            'description_ar'=>'',
            'price'=>'numeric|required',
            'images'=>'array',
            'images.*'=>'file|max:1024|mimes:png,jpg,jpeg,svg',
            'options'=>'array',
            'options.*'=>'int|exists:product_options,id',
            'productsCategories'=>'array|required',
            'productsCategories.*'=>'int|exists:product_categories,id',
            'menus' => 'array|required',
            'menus.*' => 'int|exists:menus,id',
        ]);

//        dd($request->all());
        $product->update($validatedData);
        if($request->has('images')) {
            $images = [];
            foreach ($validatedData['images'] as $file) {
                $fileName = $file->hashName();
                $file->storeAs('public/restaurants/'. Auth::id().'/products/pr-' . $product->id, $fileName);
                array_push($images, ['name' => $fileName, 'user_id' => $product->user_id]);
            }
            $product->images()->createMany($images);
        }
        $product->menus()->sync($validatedData['menus']);
        $product->categories()->sync($validatedData['productsCategories']);
        if ($request->has('options')) {
            $product->options()->sync($validatedData['options']);
        }else{
            $product->options()->detach();
        }

        return redirect()->back()->with(['message'=>__("Updated successfully")]);
//        return $validatedData;

    }





    public function getProducts(){
        return Auth::user()->products()->with(['menus','options'])->get();
    }

    /**
     * @param Product $product
     * @return mixed
     */
    public function getProduct(Product $product){
//        dd($product);
        if(Auth::id() != $product->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        return ['product' => $product->with('menus','options','images')->where('id','=',$product->id)->get()];
    }

    /**
     * @param Product $product
     * @return mixed
     */
    public function disableProduct(Product $product){
//        dd($product);
        if(Auth::id() != $product->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $product->status = 2;
        $product->save();
        return ['product' => $product];
    }
    /**
     * @param Product $product
     * @return mixed
     */
    public function enableProduct(Product $product){
//        dd($product);
        if(Auth::id() != $product->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $product->status = 1;
        $product->save();
        return ['product' => $product];
    }

    /**
     * @param Product $product
     * @param ProductOption $option
     *
     */
    public function addOption(Product $product, ProductOption $option){
        if (Auth::id() != $product->user_id || Auth::id() != $option->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $product->options()->attach($option->id);
        return response()->json(['message'=>'success'],200);
    }


    /**
     * @param Product $product
     * @param ProductOption $option
     *
     */
    public function removeOption(Product $product, ProductOption $option){
        if (Auth::id() != $product->user_id || Auth::id() != $option->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $product->options()->detach($option->id);
        return response()->json(['message'=>'success'],200);
    }

    /**
     * @param ProductImage $productImage
     * @return mixed
     */
    public function deleteProductImage(ProductImage $productImage){
        $name = $productImage->name;
        $productId = $productImage->product_id;
        $exists = Storage::exists('public/restaurants/'.$productImage->user_id.'/products/pr-'.$productId.'/'.$name);
        if($exists)
            Storage::delete('public/restaurants/'.$productImage->user_id.'/products/pr-'.$productId.'/'.$name);
        $productImage->delete();
        return response()->json($productImage->id);
    }

    public function getOptions(){
        return Auth::user()->options;
    }

    /**
     * @param ProductOption $productOption
     * @return ProductOption|\Illuminate\Http\JsonResponse
     */
    public function getOption(ProductOption $productOption){
        if(Auth::id() != $productOption->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        return $productOption;
    }

    /**
     * @param ProductOption $productOption
     * @return ProductOption|\Illuminate\Http\JsonResponse
     */
    public function disableOption(ProductOption $productOption){
        if(Auth::id() != $productOption->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $productOption->status = 0;
        $productOption->save();
        return $productOption;
    }

    /**
     * @param ProductOption $productOption
     * @return ProductOption|\Illuminate\Http\JsonResponse
     */
    public function enableOption(ProductOption $productOption){
        if(Auth::id() != $productOption->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $productOption->status = 1;
        $productOption->save();
        return $productOption;
    }

}
