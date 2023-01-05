<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:9,12'],
            'image' => ['file', 'mimes:jpg,png,jpeg,svg','max:1024','required'],
            'commercial_register' => ['required', 'numeric', 'digits:10'],
            'num_of_branches' => ['required', 'numeric', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $name = $data['image']->hashName();

        $user = User::create([
            'name' => $data['name'],
            'name_ar' => $data['name_ar'],
            'phone' => $data['phone'],
            'commercial_register' => $data['commercial_register'],
            'num_of_branches' => $data['num_of_branches'],
            'image' => $name,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if($name){
            try {
                $data['image']->storeAs('public/restaurants/'.$user->id,$name);
            }catch (\Exception $e) {
                $user->delete();
                return redirect()->to('register')->withErrors('Something went wrong!');
            }
        }
        return $user;
    }
}
