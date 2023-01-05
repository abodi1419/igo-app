<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BranchController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(User $restaurant){
        $branches = $restaurant->branches;

        return view('admin.branches.index',compact('branches','restaurant'));
    }

    public function create(User $restaurant){
        $menus = $restaurant->menus;
        return view('admin.branches.create',compact('menus','restaurant'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(User $restaurant, Request $request){

        $validatedData = $request->validate([
            'username'=>'string|min:2|required|unique:branches',
            'name'=>'string|min:5|required',
            'name_ar'=>'string|min:5|required',
            'password'=>'string|min:8|confirmed',
            'password_confirmation'=>'required',
            'phone'=>'numeric|digits_between:9,12|required',
            'location'=>'url|required|unique:branches',
            'street'=>'string|required',
            'street_ar'=>'string|required',
            'city'=>'string|required',
            'district'=>'string|required',
            'description'=>'',
            'menu_id'=>'numeric',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        if ($request->has('menu_id')) {
            $menu = Menu::find($validatedData['menu_id']);
            if (!$menu || $menu->user_id != $restaurant->id) {
                $validatedData['menu_id'] = null;
            }
        }
        $branch = $restaurant->branches()->create($validatedData);
        $branch->workdays()->createMany([['day'=>'sunday'],['day'=>'monday'],['day'=>'tuesday'],['day'=>'wednesday'],['day'=>'thursday'],['day'=>'friday'],['day'=>'saturday']]);
        return redirect()->back()->with(['message'=>__('Branch with username').' "'.$branch->username.'" '.__('was created successfully')]);
    }

    /**
     * @param Branch $branch
     * @param User $restaurant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Branch $branch,User $restaurant){
        $menus = $restaurant->menus;
        return view('admin.branches.edit',compact('branch','menus','restaurant'));
    }

    /**
     * @param Branch $branch
     * @param User $restaurant
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Branch $branch, User $restaurant, Request $request){
        $validatedData = $request->validate([
            'username'=>'string|min:2|unique:branches,username,'.$branch->id,
            'name'=>'string|min:5|required',
            'name_ar'=>'string|min:5|required',
            'phone'=>'numeric|digits_between:9,12|required',
            'location'=>'url|required|unique:branches,username,'.$branch->id,
            'street'=>'string|required',
            'street_ar'=>'string|required',
            'city'=>'string|required',
            'district'=>'string|required',
            'description'=>'string',
            'menu_id'=>'numeric',
        ]);

        if($request->password!=null) {
            $request->validate([
                'password'=>'string|min:8|confirmed',
                'password_confirmation'=>'required',
            ]);
            $validatedData['password'] = bcrypt($request->password);
        }
        if($request->has('menu_id')) {
            $menu = Menu::find($validatedData['menu_id']);
            if (!$menu || $menu->user_id != $restaurant->id) {
                $validatedData['menu'] = null;
            }
        }
        $branch->update($validatedData);
//            $token = $branch->createToken('authToken',['branches'])->accessToken;
        return redirect()->back()->with(['message'=>__('Updated successfully')]);

    }

    /**
     * @param Branch $branch
     * @param User $restaurant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Branch $branch, User $restaurant){
        return view('admin.branches.show',compact('branch','restaurant'));
    }

    public function enable(Branch $branch){
//        dd($product);
//        dd($branch);
        if(!$branch->menu_id){
            return redirect()->back()->withErrors(['error'=>'Branch '.$branch->username.' can not be enabled. It has no menu.']);
        }
        $branch->status = 1;
        $branch->save();
        return redirect()->back()->with(['message'=>'Updated successfully']);
    }

    public function disable(Branch $branch){
//        dd($product);
        $branch->status = 2;
        $branch->save();
        return redirect()->back()->with(['message'=>'Updated successfully']);
    }
}
