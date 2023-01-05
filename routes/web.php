<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return view('welcome');
});

Auth::routes();

Route::prefix('admin')->group(function (){
    Route::get('categories/index',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('categories/create',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('categories/store',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'store'])->name('admin.categories.store');
    Route::post('categories/store',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('categories/show/{id}',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('categories/edit/{id}',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::patch('categories/update/{id}',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('categories/remove/{restaurant}/{id}',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'detachRestaurant'])->name('admin.categories.remove');
//    Route::delete('categories/destroy',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::post('/mark-as-read', [App\Http\Controllers\HomeController::class,'markNotification'])->name('notification.mark.read');

    Route::prefix('restaurants')->group(function () {
        Route::get('create',[App\Http\Controllers\Web\Admin\RestaurantController::class, 'create'])->name('admin.restaurant.create');
        Route::get('index',[App\Http\Controllers\Web\Admin\RestaurantController::class, 'index'])->name('admin.restaurant.index');
        Route::get('index/deleted',[App\Http\Controllers\Web\Admin\RestaurantController::class, 'indexDeleted'])->name('admin.restaurant.index.deleted');
        Route::post('store',[App\Http\Controllers\Web\Admin\RestaurantController::class, 'store'])->name('admin.restaurant.store');
        Route::get('edit/{user}',[App\Http\Controllers\Web\Admin\RestaurantController::class, 'edit'])->name('admin.restaurant.edit');
        Route::patch('update/{user}',[App\Http\Controllers\Web\Admin\RestaurantController::class, 'update'])->name('admin.restaurant.update');
        Route::patch('restore/{user}',[App\Http\Controllers\Web\Admin\RestaurantController::class, 'restore'])->name('admin.restaurant.restore');
        Route::get('show/{user}',[App\Http\Controllers\Web\Admin\RestaurantController::class, 'show'])->name('admin.restaurant.show');
        Route::delete('destroy/{user}',[App\Http\Controllers\Web\Admin\RestaurantController::class, 'destroy'])->name('admin.restaurant.destroy');




        Route::prefix('products')->group(function () {
            Route::get('create/{restaurant}',[App\Http\Controllers\Web\Admin\ProductController::class, 'create'])->name('admin.restaurant.products.create');
            Route::get('index/{restaurant}',[App\Http\Controllers\Web\Admin\ProductController::class, 'index'])->name('admin.restaurant.products.index');
            Route::get('index/deleted',[App\Http\Controllers\Web\Admin\ProductController::class, 'indexDeleted'])->name('admin.restaurant.products.index.deleted');
            Route::post('store/{restaurant}',[App\Http\Controllers\Web\Admin\ProductController::class, 'store'])->name('admin.restaurant.products.store');
            Route::get('edit/{product}/{restaurant}',[App\Http\Controllers\Web\Admin\ProductController::class, 'edit'])->name('admin.restaurant.products.edit');
            Route::patch('update/{product}/{restaurant}',[App\Http\Controllers\Web\Admin\ProductController::class, 'update'])->name('admin.restaurant.products.update');
//            Route::patch('restore/{user}',[App\Http\Controllers\Web\Admin\ProductController::class, 'restore'])->name('admin.restaurant.products.restore');
            Route::get('show/{product}/{restaurant}',[App\Http\Controllers\Web\Admin\ProductController::class, 'show'])->name('admin.restaurant.products.show');
            Route::delete('destroy/{product}/{restaurant}',[App\Http\Controllers\Web\Admin\ProductController::class, 'destroy'])->name('admin.restaurant.products.destroy');
            Route::get('enable/{product}',[App\Http\Controllers\Web\Admin\ProductController::class, 'enableProduct'])->name('admin.restaurant.products.enable');
            Route::get('disable/{product}',[App\Http\Controllers\Web\Admin\ProductController::class, 'disableProduct'])->name('admin.restaurant.products.disable');
            Route::delete('image/delete/{productImage}',[App\Http\Controllers\Web\Admin\ProductController::class, 'deleteProductImage'])->name('admin.restaurant.products.image.delete');

        });
        Route::prefix('options')->group(function () {
            Route::get('create/{restaurant}',[App\Http\Controllers\Web\Admin\OptionController::class, 'create'])->name('admin.restaurant.options.create');
            Route::get('index/{restaurant}',[App\Http\Controllers\Web\Admin\OptionController::class, 'index'])->name('admin.restaurant.options.index');
            Route::get('index/deleted',[App\Http\Controllers\Web\Admin\OptionController::class, 'indexDeleted'])->name('admin.restaurant.options.index.deleted');
            Route::post('store/{restaurant}',[App\Http\Controllers\Web\Admin\OptionController::class, 'store'])->name('admin.restaurant.options.store');
            Route::get('edit/{productOption}/{restaurant}',[App\Http\Controllers\Web\Admin\OptionController::class, 'edit'])->name('admin.restaurant.options.edit');
            Route::patch('update/{productOption}/{restaurant}',[App\Http\Controllers\Web\Admin\OptionController::class, 'update'])->name('admin.restaurant.options.update');
//            Route::patch('restore/{user}',[App\Http\Controllers\Web\Admin\ProductController::class, 'restore'])->name('admin.restaurant.products.restore');
            Route::get('show/{productOption}/{restaurant}',[App\Http\Controllers\Web\Admin\OptionController::class, 'show'])->name('admin.restaurant.options.show');
            Route::delete('destroy/{productOption}/{restaurant}',[App\Http\Controllers\Web\Admin\OptionController::class, 'destroy'])->name('admin.restaurant.options.destroy');
            Route::get('enable/{productOption}',[App\Http\Controllers\Web\Admin\OptionController::class, 'enableProduct'])->name('admin.restaurant.options.enable');
            Route::get('disable/{productOption}',[App\Http\Controllers\Web\Admin\OptionController::class, 'disableProduct'])->name('admin.restaurant.options.disable');
//            Route::delete('image/delete/{productImage}',[App\Http\Controllers\Web\Admin\ProductController::class, 'deleteProductImage'])->name('admin.restaurant.products.image.delete');

        });
        Route::prefix('menus')->group(function () {
            Route::get('create/{restaurant}',[App\Http\Controllers\Web\Admin\MenuController::class, 'create'])->name('admin.restaurant.menus.create');
            Route::get('index/{restaurant}',[App\Http\Controllers\Web\Admin\MenuController::class, 'index'])->name('admin.restaurant.menus.index');
//            Route::get('index/deleted',[App\Http\Controllers\Web\Admin\OptionController::class, 'indexDeleted'])->name('admin.restaurant.options.index.deleted');
            Route::post('store/{restaurant}',[App\Http\Controllers\Web\Admin\MenuController::class, 'store'])->name('admin.restaurant.menus.store');
            Route::get('edit/{menu}/{restaurant}',[App\Http\Controllers\Web\Admin\MenuController::class, 'edit'])->name('admin.restaurant.menus.edit');
            Route::patch('update/{menu}/{restaurant}',[App\Http\Controllers\Web\Admin\MenuController::class, 'update'])->name('admin.restaurant.menus.update');
//            Route::patch('restore/{user}',[App\Http\Controllers\Web\Admin\ProductController::class, 'restore'])->name('admin.restaurant.products.restore');
            Route::get('show/{menu}/{restaurant}',[App\Http\Controllers\Web\Admin\MenuController::class, 'show'])->name('admin.restaurant.menus.show');
            Route::delete('destroy/{menu}/{restaurant}',[App\Http\Controllers\Web\Admin\MenuController::class, 'destroy'])->name('admin.restaurant.menus.destroy');
            Route::get('add/products/{menu}/{restaurant}',[\App\Http\Controllers\Web\Admin\MenuController::class,'products'])->name('admin.restaurant.menu.add.products');
            Route::get('add/product/{menu}/{product}',[\App\Http\Controllers\Web\Admin\MenuController::class,'addProduct'])->name('admin.restaurant.menus.add.product');
            Route::get('remove/product/{menu}/{product}',[\App\Http\Controllers\Web\Admin\MenuController::class,'removeProduct'])->name('admin.restaurant.menus.remove.product');
//            Route::get('enable/{productOption}',[App\Http\Controllers\Web\Admin\OptionController::class, 'enableProduct'])->name('admin.restaurant.options.enable');
//            Route::get('disable/{productOption}',[App\Http\Controllers\Web\Admin\OptionController::class, 'disableProduct'])->name('admin.restaurant.options.disable');
//            Route::delete('image/delete/{productImage}',[App\Http\Controllers\Web\Admin\ProductController::class, 'deleteProductImage'])->name('admin.restaurant.products.image.delete');

        });
        Route::prefix('categories')->group(function () {
            Route::get('create/{restaurant}',[App\Http\Controllers\Web\Admin\ProductCategoryController::class, 'create'])->name('admin.restaurant.categories.create');
            Route::get('index/{restaurant}',[App\Http\Controllers\Web\Admin\ProductCategoryController::class, 'index'])->name('admin.restaurant.categories.index');
//            Route::get('index/deleted',[App\Http\Controllers\Web\Admin\OptionController::class, 'indexDeleted'])->name('admin.restaurant.options.index.deleted');
            Route::post('store/{restaurant}',[App\Http\Controllers\Web\Admin\ProductCategoryController::class, 'store'])->name('admin.restaurant.categories.store');
            Route::get('edit/{productsCategory}/{restaurant}',[App\Http\Controllers\Web\Admin\ProductCategoryController::class, 'edit'])->name('admin.restaurant.categories.edit');
            Route::patch('update/{productsCategory}/{restaurant}',[App\Http\Controllers\Web\Admin\ProductCategoryController::class, 'update'])->name('admin.restaurant.categories.update');
//            Route::patch('restore/{user}',[App\Http\Controllers\Web\Admin\ProductController::class, 'restore'])->name('admin.restaurant.products.restore');
            Route::get('show/{productsCategory}/{restaurant}',[App\Http\Controllers\Web\Admin\ProductCategoryController::class, 'show'])->name('admin.restaurant.categories.show');
            Route::delete('destroy/{productsCategory}/{restaurant}',[App\Http\Controllers\Web\Admin\ProductCategoryController::class, 'destroy'])->name('admin.restaurant.categories.destroy');
            Route::get('add/products/{productsCategory}/{restaurant}',[\App\Http\Controllers\Web\Admin\ProductCategoryController::class,'products'])->name('admin.restaurant.categories.add.products');
            Route::get('add/product/{productsCategory}/{product}',[\App\Http\Controllers\Web\Admin\ProductCategoryController::class,'addProduct'])->name('admin.restaurant.categories.add.product');
            Route::get('remove/product/{productsCategory}/{product}',[\App\Http\Controllers\Web\Admin\ProductCategoryController::class,'removeProduct'])->name('admin.restaurant.categories.remove.product');
//            Route::get('enable/{productOption}',[App\Http\Controllers\Web\Admin\OptionController::class, 'enableProduct'])->name('admin.restaurant.options.enable');
//            Route::get('disable/{productOption}',[App\Http\Controllers\Web\Admin\OptionController::class, 'disableProduct'])->name('admin.restaurant.options.disable');
//            Route::delete('image/delete/{productImage}',[App\Http\Controllers\Web\Admin\ProductController::class, 'deleteProductImage'])->name('admin.restaurant.products.image.delete');

        });
        Route::prefix('branches')->group(function () {
            Route::get('create/{restaurant}',[App\Http\Controllers\Web\Admin\BranchController::class, 'create'])->name('admin.restaurant.branches.create');
            Route::get('index/{restaurant}',[App\Http\Controllers\Web\Admin\BranchController::class, 'index'])->name('admin.restaurant.branches.index');
            Route::get('index/deleted',[App\Http\Controllers\Web\Admin\BranchController::class, 'indexDeleted'])->name('admin.restaurant.branches.index.deleted');
            Route::post('store/{restaurant}',[App\Http\Controllers\Web\Admin\BranchController::class, 'store'])->name('admin.restaurant.branches.store');
            Route::get('edit/{branch}/{restaurant}',[App\Http\Controllers\Web\Admin\BranchController::class, 'edit'])->name('admin.restaurant.branches.edit');
            Route::patch('update/{branch}/{restaurant}',[App\Http\Controllers\Web\Admin\BranchController::class, 'update'])->name('admin.restaurant.branches.update');
//            Route::patch('restore/{user}',[App\Http\Controllers\Web\Admin\ProductController::class, 'restore'])->name('admin.restaurant.products.restore');
            Route::get('show/{branch}/{restaurant}',[App\Http\Controllers\Web\Admin\BranchController::class, 'show'])->name('admin.restaurant.branches.show');
            Route::delete('destroy/{branch}/{restaurant}',[App\Http\Controllers\Web\Admin\BranchController::class, 'destroy'])->name('admin.restaurant.branches.destroy');
            Route::get('enable/{branch}',[App\Http\Controllers\Web\Admin\BranchController::class, 'enable'])->name('admin.restaurant.branches.enable');
            Route::get('disable/{branch}',[App\Http\Controllers\Web\Admin\BranchController::class, 'disable'])->name('admin.restaurant.branches.disable');
//            Route::delete('image/delete/{productImage}',[App\Http\Controllers\Web\Admin\BranchController::class, 'deleteProductImage'])->name('admin.restaurant.branches.image.delete');

        });

        Route::prefix('coupons')->group(function () {
            Route::get('create/{restaurant}',[App\Http\Controllers\Web\Admin\CouponController::class, 'create'])->name('admin.restaurant.coupons.create');
            Route::get('index/{restaurant}',[App\Http\Controllers\Web\Admin\CouponController::class, 'index'])->name('admin.restaurant.coupons.index');
            Route::post('store/{restaurant}',[App\Http\Controllers\Web\Admin\CouponController::class, 'store'])->name('admin.restaurant.coupons.store');
            Route::get('edit/{coupon}/{restaurant}',[App\Http\Controllers\Web\Admin\CouponController::class, 'edit'])->name('admin.restaurant.coupons.edit');
            Route::patch('update/{coupon}/{restaurant}',[App\Http\Controllers\Web\Admin\CouponController::class, 'update'])->name('admin.restaurant.coupons.update');
            Route::get('enable/{coupon}',[App\Http\Controllers\Web\Admin\CouponController::class, 'enable'])->name('admin.restaurant.coupons.enable');
            Route::get('disable/{coupon}',[App\Http\Controllers\Web\Admin\CouponController::class, 'disable'])->name('admin.restaurant.coupons.disable');

        });

    });

});

Route::prefix('restaurant')->group(function (){
    Route::prefix('workdays')->group(function () {
        Route::get('create',[App\Http\Controllers\Web\WorkDayController::class, 'create'])->name('workdays.create');
        Route::get('edit',[App\Http\Controllers\Web\WorkDayController::class, 'edit'])->name('workdays.edit');
        Route::post('update',[App\Http\Controllers\Web\WorkDayController::class, 'update'])->name('workdays.update');
    });
    Route::prefix('branches')->group(function () {
        Route::get('create',[App\Http\Controllers\Web\BranchController::class, 'create'])->name('branches.create');
        Route::get('index',[App\Http\Controllers\Web\BranchController::class, 'index'])->name('branches.index');
        Route::post('store',[App\Http\Controllers\Web\BranchController::class, 'store'])->name('branches.store');
        Route::get('edit/{branch}',[App\Http\Controllers\Web\BranchController::class, 'edit'])->name('branches.edit');
        Route::patch('update/{branch}',[App\Http\Controllers\Web\BranchController::class, 'update'])->name('branches.update');

    });
    Route::prefix('coupons')->group(function () {
        Route::get('create',[App\Http\Controllers\Web\CouponController::class, 'create'])->name('coupons.create');
        Route::get('index',[App\Http\Controllers\Web\CouponController::class, 'index'])->name('coupons.index');
        Route::post('store',[App\Http\Controllers\Web\CouponController::class, 'store'])->name('coupons.store');
        Route::get('edit/{coupon}',[App\Http\Controllers\Web\CouponController::class, 'edit'])->name('coupons.edit');
        Route::patch('update/{coupon}',[App\Http\Controllers\Web\CouponController::class, 'update'])->name('coupons.update');
        Route::get('enable/{coupon}',[App\Http\Controllers\Web\CouponController::class, 'enable'])->name('coupons.enable');
        Route::get('disable/{coupon}',[App\Http\Controllers\Web\CouponController::class, 'disable'])->name('coupons.disable');

    });
    Route::prefix('menus')->group(function() {
        Route::get('create',[\App\Http\Controllers\Web\MenuController::class,'create'])->name('menus.create');
        Route::post('store',[\App\Http\Controllers\Web\MenuController::class,'store'])->name('menus.store');
        Route::get('edit/{menu}',[\App\Http\Controllers\Web\MenuController::class,'edit'])->name('menus.edit');
        Route::get('index',[\App\Http\Controllers\Web\MenuController::class,'index'])->name('menus.index');
        Route::patch('update/{menu}',[\App\Http\Controllers\Web\MenuController::class,'update'])->name('menus.update');
        Route::get('add/products/{menu}',[\App\Http\Controllers\Web\MenuController::class,'products'])->name('menu.add.products');
        Route::get('add/product/{menu}/{product}',[\App\Http\Controllers\Web\MenuController::class,'addProduct']);
        Route::get('remove/product/{menu}/{product}',[\App\Http\Controllers\Web\MenuController::class,'removeProduct']);
    });
    Route::prefix('categories')->group(function() {
        Route::get('create',[\App\Http\Controllers\Web\ProductCategoryController::class,'create'])->name('categories.create');
        Route::post('store',[\App\Http\Controllers\Web\ProductCategoryController::class,'store'])->name('categories.store');
        Route::get('edit/{productsCategory}',[\App\Http\Controllers\Web\ProductCategoryController::class,'edit'])->name('categories.edit');
        Route::get('index',[\App\Http\Controllers\Web\ProductCategoryController::class,'index'])->name('categories.index');
        Route::patch('update/{productsCategory}',[\App\Http\Controllers\Web\ProductCategoryController::class,'update'])->name('categories.update');
        Route::get('add/products/{productsCategory}',[\App\Http\Controllers\Web\ProductCategoryController::class,'products'])->name('categories.add.products');
        Route::get('add/product/{productsCategory}/{product}',[\App\Http\Controllers\Web\ProductCategoryController::class,'addProduct']);
        Route::get('remove/product/{productsCategory}/{product}',[\App\Http\Controllers\Web\ProductCategoryController::class,'removeProduct']);
    });
    Route::prefix('products')->group(function (){
        Route::get('create',[\App\Http\Controllers\Web\ProductController::class,'create'])->name('products.create');
        Route::post('store',[\App\Http\Controllers\Web\ProductController::class,'store'])->name('products.store');
        Route::get('index',[\App\Http\Controllers\Web\ProductController::class,'index'])->name('products.index');
        Route::get('edit/{product}',[\App\Http\Controllers\Web\ProductController::class,'edit'])->name('products.edit');
        Route::patch('update/{product}',[\App\Http\Controllers\Web\ProductController::class,'update'])->name('products.update');
    });
    Route::prefix('options')->group(function (){
        Route::get('create',[\App\Http\Controllers\Web\OptionController::class,'create'])->name('options.create');
        Route::post('store',[\App\Http\Controllers\Web\OptionController::class,'store'])->name('options.store');
        Route::get('index',[\App\Http\Controllers\Web\OptionController::class,'index'])->name('options.index');
        Route::get('edit/{option}',[\App\Http\Controllers\Web\OptionController::class,'edit'])->name('options.edit');
        Route::patch('update/{option}',[\App\Http\Controllers\Web\OptionController::class,'update'])->name('options.update');
    });

});
Route::prefix('customer')->group(function (){
    Route::prefix('auth')->group(function (){
        Route::get('register_form',[App\Http\Controllers\Web\CustomerController::class,'create'])->name('customer.register_form');
        Route::post('register',[App\Http\Controllers\Web\CustomerController::class,'store'])->name('customer.register');
        Route::get('login_form',[App\Http\Controllers\Web\CustomerController::class,'loginForm'])->name('customer.login_form');
        Route::post('login',[App\Http\Controllers\Web\CustomerController::class,'login'])->name('customer.login');
    });
    Route::get('home',[App\Http\Controllers\Web\CustomerController::class,'home'])->name('customer.home');
});
// Edit restaurant categories
Route::get('categories/edit/{restaurant}',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'editCategories'])->name('categories.edit');
Route::patch('categories/update/{restaurant}',[App\Http\Controllers\Web\RestaurantCategoryController::class, 'updateCategories'])->name('categories.update');
// ----------------------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('product/image/get/{product}/{imageName}', function (\App\Models\Product $product,$imageName){
    return response()->file('storage/restaurants/'.$product->user_id.'/products/pr-'.$product->id.'/'.$imageName);
})->name('product.get.image');
Route::get('product/random/image/get/{product}', function (\App\Models\Product $product){
    if (!count($product->images)){
        return response()->file('storage/no-image.png');
    }
    return response()->file('storage/restaurants/'.$product->user_id.'/products/pr-'.$product->id.'/'.$product->images[0]->name);
})->name('random.image');

Route::delete('image/{image}',function (\App\Models\ProductImage $image){
    if(Auth::id() != $image->user_id){
        return response()->json(['error'=>"You don't own this resource"],401);
    }
    $name = $image->name;
    $productId = $image->product_id;
    $exists = Storage::exists('public/restaurants/'.Auth::id().'/products/pr-'.$productId.'/'.$name);
    if($exists)
        Storage::delete('public/restaurants/'.Auth::id().'/products/pr-'.$productId.'/'.$name);
    $image->delete();
    return $image->id;
})->name('image.delete');

Route::get('cities',function (){
    $data = \Illuminate\Support\Facades\DB::table('cities_lite')->select(['city_id','name_en','name_ar'])->get();
    return response()->json($data);
});
Route::get('district/{id}',function ($id){
    $data = \Illuminate\Support\Facades\DB::table('districts_lite')->select(['name_en','name_ar'])->where('city_id',$id)->get();
    return response()->json($data);
});

Route::get('change/language/{locale}',function ($locale){
    if(in_array($locale,['ar','en'])){
        \Illuminate\Support\Facades\App::setLocale($locale);
        // Session
        session()->put('locale', $locale);

        return redirect()->back();
    }else{
        abort(404,'Language not found!');
    }
})->name('language.change');


