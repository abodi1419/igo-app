<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(){

        $restaurants = User::where('type',1)->where('status',1)->get();
        return view('admin.restaurants.index',compact('restaurants'));
    }
    public function show(User $user){
        $restaurant = $user;
        return view('admin.restaurants.show',compact('restaurant'));
    }
    public function indexDeleted(){

        $restaurants = User::where('type',1)->where('status',0)->get();
        return view('admin.restaurants.deleted',compact('restaurants'));
    }

    public function create(){
        return view('admin.restaurants.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:9,12'],
            'commercial_register' => ['required', 'numeric', 'digits:10'],
            'num_of_branches' => ['required', 'numeric', 'min:1'],
            'commission' => ['required', 'numeric', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'description' => [],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $name = null;
        if($request->has('image')){
            $request->validate([
                'image' => ['file', 'mimes:jpg,png,jpeg,svg'],
            ]);
            $name = $request->image->hashName();
        }

        $validatedData['image']= $name;
        $validatedData['password']= bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        if($name){
            try {
                $request->image->storeAs('public/restaurants/'.$user->id,$name);
            }catch (\Exception $e) {
                $user->delete();
                return $e->getMessage();
            }
        }
        return redirect()->back()->with(['message'=>__('Created successfully')]);
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function edit(User $user){
        return view('admin.restaurants.edit',compact('user'));
    }

    public function update(Request $request, User $user){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:9,12'],
            'commercial_register' => ['required', 'numeric', 'digits:10'],
            'num_of_branches' => ['required', 'numeric', 'min:1'],
            'commission' => ['required', 'numeric', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'description' => [],

        ]);
        if($request->has('password')) {
            if($request->password!=null) {
                $request->validate([
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
                $validatedData['password'] = bcrypt($request->password);
            }
        }
        if($request->has('image')){
            $request->validate([
                'image' => ['file', 'mimes:jpg,png,jpeg,svg'],
            ]);
            if(Storage::exists('public/restaurants/'.$user->id.'/'.$user->image)){
                Storage::delete('public/restaurants/'.$user->id.'/'.$user->image);
            }
            $name = $request->image->hashName();
            $request->image->storeAs('public/restaurants/'.$user->id,$name);
            $validatedData['image']= $name;
        }



        $user->update($validatedData);

        return redirect()->back()->with(['message'=>__('Updated successfully')]);
    }

    public function destroy(User $user){
        $user->status = 0;
        $user->save();
        return redirect()->back()->with(["message"=>__('Restaurant was deleted')]);
    }

    public function restore(User $user){
        $user->status = 1;
        $user->save();
        return redirect()->back()->with(["message"=>__('Restaurant was restored')]);
    }
}
