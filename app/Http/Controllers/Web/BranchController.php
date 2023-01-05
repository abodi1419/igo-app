<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BranchController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $branches = Auth::user()->branches;

        return view('branches.index',compact('branches'));
    }
    public function create(){
        $menus = Auth::user()->menus;
        return view('branches.create',compact('menus'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){

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
            if (!$menu || $menu->user_id != Auth::id()) {
                $validatedData['menu_id'] = null;
            }
        }
        $branch = Auth::user()->branches()->create($validatedData);
        $branch->workdays()->createMany([['day'=>'sunday'],['day'=>'monday'],['day'=>'tuesday'],['day'=>'wednesday'],['day'=>'thursday'],['day'=>'friday'],['day'=>'saturday']]);
        return redirect()->back()->with(['message'=>__('Branch with username').' "'.$branch->username.'" '.__('was created successfully')]);
    }

    /**
     * @param Branch $branch
     * @return mixed
     */
    public function edit(Branch $branch){
        if(Auth::id() != $branch->user_id){
            abort(401,"You don't own this resource");
        }
        $menus = Auth::user()->menus;
        return view('branches.edit',compact('branch','menus'));
    }

    /**
     * @param Branch $branch
     * @param Request $request
     * @return
     */
    public function update(Branch $branch,Request $request){
        if(Auth::id() != $branch->user_id){
            abort(401,"You don't own this resource");
        }
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
            if (!$menu || $menu->user_id != Auth::id()) {
                $validatedData['menu'] = null;
            }
        }
        $branch->update($validatedData);
//            $token = $branch->createToken('authToken',['branches'])->accessToken;
        return redirect()->back()->with(['message'=>__('Updated successfully')]);

    }

}
