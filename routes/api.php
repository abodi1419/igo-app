<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('customer')->group(function(){
    Route::middleware('guest')->post('register', '\App\Http\Controllers\Api\AuthController@registerCustomer');
    Route::middleware('guest')->post('login', '\App\Http\Controllers\Api\AuthController@loginCustomer');
    Route::middleware('auth:customer-api','scope:customers')->get('validate', '\App\Http\Controllers\Api\AuthController@validateToken');
});
Route::prefix('restaurant')->group(function(){
//    Route::middleware('guest')->post('register', '\App\Http\Controllers\Api\AuthController@registerRestaurant');
//    Route::middleware('guest')->post('login', '\App\Http\Controllers\Api\AuthController@loginRestaurant');
//    Route::middleware('auth:api','scope:users')->get('validate', '\App\Http\Controllers\Api\AuthController@validateResturantToken');
//    Route::middleware('auth:api','scope:users')->post('branch/create', '\App\Http\Controllers\Api\RestaurantController@createBranch');
//    Route::middleware('auth:api','scope:users')->get('branches/get', '\App\Http\Controllers\Api\RestaurantController@getBranches');
//    Route::middleware('auth:api','scope:users')->get('branch/get/{branch}', '\App\Http\Controllers\Api\RestaurantController@getBranch');
//    Route::middleware('auth:api','scope:users')->get('branch/disable/{branch}', '\App\Http\Controllers\Api\RestaurantController@disableBranch');
//    Route::middleware('auth:api','scope:users')->get('branch/enable/{branch}', '\App\Http\Controllers\Api\RestaurantController@enableBranch');
//    Route::middleware('guest')->post('branch/login', '\App\Http\Controllers\Api\AuthController@loginBranch');
//    Route::middleware('auth:branch-api','scope:branches')->post('branch/validate', '\App\Http\Controllers\Api\AuthController@validateBrancheToken');
//    Route::middleware('auth:api','scope:users')->put('branch/assign/menu/{branch}/{menu}', '\App\Http\Controllers\Api\RestaurantController@assignMenu');
//    Route::middleware('auth:api','scope:users')->patch('branch/update/{branch}', '\App\Http\Controllers\Api\RestaurantController@updateBranch');
//    // Menus here
//    Route::middleware('auth:api','scope:users')->post('menu/create', '\App\Http\Controllers\Api\MenuController@createMenu');
//    Route::middleware('auth:api','scope:users')->patch('menu/update/{menu}', '\App\Http\Controllers\Api\MenuController@updateMenu');
//    Route::middleware('auth:api','scope:users')->put('menu/add/{menu}/{product}', '\App\Http\Controllers\Api\MenuController@addProduct');
//    Route::middleware('auth:api','scope:users')->put('menu/remove/{menu}/{product}', '\App\Http\Controllers\Api\MenuController@removeProduct');
//    Route::middleware('auth:api','scope:users')->get('menu/get/{menu}', '\App\Http\Controllers\Api\MenuController@getMenu');
//    Route::middleware('auth:api','scope:users')->get('menus/get', '\App\Http\Controllers\Api\MenuController@getMenus');
//    // Products here
//    Route::middleware('auth:api','scope:users')->get('product/get/{product}', '\App\Http\Controllers\Api\ProductController@getProduct');
//    Route::middleware('auth:api','scope:users')->get('product/disable/{product}', '\App\Http\Controllers\Api\ProductController@disableProduct');
//    Route::middleware('auth:api','scope:users')->get('product/enable/{product}', '\App\Http\Controllers\Api\ProductController@enableProduct');
//    Route::middleware('auth:api','scope:users')->post('product/create', '\App\Http\Controllers\Api\ProductController@createProduct');
//    Route::middleware('auth:api','scope:users')->patch('product/update/{product}', '\App\Http\Controllers\Api\ProductController@updateProduct');
//    Route::middleware('auth:api','scope:users')->put('product/add/option/{product}/{option}', '\App\Http\Controllers\Api\ProductController@addOption');
//    Route::middleware('auth:api','scope:users')->put('product/remove/option/{product}/{option}', '\App\Http\Controllers\Api\ProductController@removeOption');
//    Route::middleware('auth:api','scope:users')->get('products/get', '\App\Http\Controllers\Api\ProductController@getProducts');
//    Route::middleware('auth:api','scope:users')->delete('product/delete/image/{productImage}', '\App\Http\Controllers\Api\ProductController@deleteProductImage');
//    // Options here
//    Route::middleware('auth:api','scope:users')->post('option/create', '\App\Http\Controllers\Api\ProductController@createOption');
//    Route::middleware('auth:api','scope:users')->patch('option/update/{productOption}', '\App\Http\Controllers\Api\ProductController@updateOption');
//    Route::middleware('auth:api','scope:users')->get('options/get', '\App\Http\Controllers\Api\ProductController@getOptions');
//    Route::middleware('auth:api','scope:users')->get('option/get/{productOption}', '\App\Http\Controllers\Api\ProductController@getOption');
//    Route::middleware('auth:api','scope:users')->put('option/disable/{productOption}', '\App\Http\Controllers\Api\ProductController@disableOption');
//    Route::middleware('auth:api','scope:users')->put('option/enable/{productOption}', '\App\Http\Controllers\Api\ProductController@enableOption');
    Route::middleware('auth:customer-api','scope:customers')->get('products/categories/{id}', '\App\Http\Controllers\Api\ProductCategoryController@index');
    Route::middleware('auth:customer-api','scope:customers')->get('products/category/{id}', '\App\Http\Controllers\Api\ProductCategoryController@show');
    Route::middleware('auth:customer-api','scope:customers')->get('categories', '\App\Http\Controllers\Api\RestaurantsCategoryController@index');
    Route::middleware('auth:customer-api','scope:customers')->get('category/{id}', '\App\Http\Controllers\Api\RestaurantsCategoryController@show');
});
Route::middleware('auth:customer-api','scope:customers')->get('restaurants', '\App\Http\Controllers\Api\RestaurantController@index');
Route::get('product/{image}', function (\App\Models\ProductImage $image){
    return response()->file('storage/restaurants/'.$image->user_id.'/products/pr-'.$image->product_id.'/'.$image->name);
})->name('api.product.image');
//Route::prefix('branch')->group(function(){
//    Route::middleware('guest')->post('login', '\App\Http\Controllers\Api\AuthController@loginBranch');
//    Route::middleware('auth:branch-api','scope:branches')->get('validate', '\App\Http\Controllers\Api\AuthController@validateBrancheToken');
//
//});


