<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function registerCustomer(Request $request){
        $validatedData = $request->validate([
            'name'=>'string|max:191|required',
            'phone'=>'numeric|digits_between:9,12|required',
            'image'=>'string|nullable'
        ]);
//        return $validatedData;

        $customer = Customer::create($validatedData);
        $token = $customer->createToken('authToken',['customers'])->accessToken;
        return ['customer'=>$customer, 'token'=> $token];


    }

    public function loginCustomer(Request $request){
        $validatedData = $request->validate([
            'phone'=>'numeric|digits_between:9,12|required',
        ]);

        $customer = Customer::where('phone','=',$validatedData['phone'])->first();
        if(!$customer){
            return response()->json(['message'=>'Not found!'],404);
        }
        $token = $customer->createToken('authToken',['customers'])->accessToken;
        return ['customer'=>$customer, 'token'=> $token];

    }

    public function validateToken(){
        return Auth::user();
    }

    public function registerRestaurant(Request $request){
        $validatedData = $request->validate([
            'name'=>'string|max:191|required',
            'email'=>'email|required',
            'password' => 'string|min:8|confirmed',
            'password_confirmation'=>'required',
            'phone'=>'numeric|digits_between:9,12|required',
        ]);
//        return $validatedData;
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        $token = $user->createToken('authToken',['users'])->accessToken;
        return ['user'=>$user, 'token'=> $token];


    }

    public function loginRestaurant(Request $request){
        $validatedData = $request->validate([
            'email'=>'email|required',
            'password'=>'required',
        ]);

        if(!Auth::attempt($validatedData)){
            return response()->json(['message'=>'invalid credentials!'], 401);
        }
        $token = Auth::user()->createToken('authToken',['users'])->accessToken;
        return ['customer'=>Auth::user(), 'token'=> $token];

    }

    public function validateResturantToken(){
        return Auth::user();
    }

    public function loginBranch(Request $request){
        $validatedData = $request->validate([
            'username'=>'string|required',
            'password'=>'required',
        ]);

        $branch = Branch::where('username','=',$validatedData['username'])->first();
//        dd($branch);
        if(!$branch|| !Hash::check($validatedData['password'], $branch->password)){
            return response()->json(['message'=>'Invalid credentials!'],401);
        }

        $token = $branch->createToken('authToken',['branches'])->accessToken;
        return ['branch'=>$branch, 'token'=> $token];

    }

    public function validateBrancheToken(){
        return Auth::user();
    }


}
