<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\RestaurantCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('editCategories','updateCategories');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = RestaurantCategory::all();
        return view('admin.restaurants.categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|string|max:100|unique:restaurant_categories,name',
            'name_ar'=>'required|string|max:100|unique:restaurant_categories,name',
            'description'=>'string|nullable',
            'description_ar'=>'string|nullable',
        ]);

        RestaurantCategory::create($validatedData);
        return redirect()->back()->with(['message'=>__("Created successfully")]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = RestaurantCategory::find($id);
        if(!$category){
            abort(404,"Not found!");
        }
        $category->load('restaurants');
        return view('admin.restaurants.categories.view',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = RestaurantCategory::find($id);
        if(!$category){
            abort(404,'Not found!');
        }
        return view('admin.restaurants.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = RestaurantCategory::find($id);
        if(!$category){
            abort(404,'Not found!');
        }
        $validatedData = $request->validate([
            'name'=>'required|string|max:100|unique:restaurant_categories,name,'.$id,
            'name_ar'=>'required|string|max:100|unique:restaurant_categories,name,'.$id,
            'description'=>'string|nullable',
            'description_ar'=>'string|nullable',
        ]);

        $category->update($validatedData);
        return redirect()->back()->with(['message'=>__("Updated successfully")]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editCategories(User $restaurant){
        if($restaurant->id != Auth::id()){
            abort(402);
        }
        $categories = RestaurantCategory::all();
        $restaurant->load('categories');
        $selectedCats = $restaurant->categories->pluck('id')->toArray();
        return view('restaurants.categories.edit',compact('categories','restaurant','selectedCats'));
    }
    /**
     * @param Request $request
     * @param User $restaurant
     *
     */
    public function updateCategories(Request $request, User $restaurant){
        if($restaurant->id != Auth::id()){
            abort(401);
        }
        $validatedData = $request->validate([
            'categories'=>'array|max:5|required',
            'categories.*'=>'integer|exists:restaurant_categories,id'
        ]);
        $restaurant->categories()->sync($validatedData['categories']);
        return redirect()->back()->with(['message'=>__('Updated successfully')]);
    }

    public function detachRestaurant(User $restaurant,$id){
        $restaurant->categories()->detach($id);
        return $restaurant->id;
    }
}
