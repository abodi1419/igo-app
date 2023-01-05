<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductOption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{




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
     * @param User $restaurant
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getRestaurantCategories(User $restaurant){
//        dd($restaurant);
        $categories = $restaurant->productsCategories->load('products');
//        dd($categories);
        return ProductCategoryResource::collection($categories);
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
