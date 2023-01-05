<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->type===0){
            $restaurants = User::where('type',1)->count();

            $branches = Branch::all()->count();
            $customers = Customer::all()->count();
            $coupons = Coupon::all()->count();
            $products = Product::all()->count();
            return view('admin.home',compact('restaurants','branches','customers','coupons','products'));
        }
        return view('home');
    }

    public function markNotification(Request $request){
        if(Auth::user()->type!=0){
            abort(401,"Unauthorized");
        }
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
