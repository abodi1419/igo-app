<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function __construct(){
        $this->middleware('cauth')->except(['create','store','loginForm','login']);
    }

    public function create(){
        return view('customers.auth.register');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'string|max:255|required',
            'phone'=>'numeric|digits:10|required|unique:customers,phone'
        ]);
        $customer = Customer::create($validatedData);
        Auth::guard('web-customers')->attempt(['phone'=>$customer->phone,'password'=>null],true);
        return redirect()->route('customer/home');
    }

    public function loginForm(){
        return view('customers.auth.login');
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'phone'=>'numeric|digits:10|required|exists:customers,phone'
        ]);
        $customer = Customer::where('phone',$validatedData['phone'])->first();

//        Auth::guard('web-customers')->login($customer,true);
//        $token = $customer->createToken('authToken',['customers'])->accessToken;
//        Auth::guard('web-customers')->
//        dd(Auth::user());
        if(Auth::guard('web-customers')->login($customer,true)){

            return redirect()->to('customer/home');
        }
    }

    public function home(){
        return view('customers.home');
    }

}
