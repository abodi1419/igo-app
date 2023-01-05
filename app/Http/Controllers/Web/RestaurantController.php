<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{




    public function getBranches(){
        return Auth::user()->branches;
    }

    /**
     * @param Branch $branch
     * @return mixed
     */
    public function getBranch(Branch $branch){
        if(Auth::id()!=$branch->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        return $branch;
    }

    /**
     * @param Branch $branch
     * @return mixed
     */
    public function disableBranch(Branch $branch){
        if(Auth::id()!=$branch->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $branch->status = 0;
        $branch->save();
        return $branch;
    }

    /**
     * @param Branch $branch
     * @return mixed
     */
    public function enableBranch(Branch $branch){
        if(Auth::id()!=$branch->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $branch->status = 1;
        $branch->save();
        return $branch;
    }


    /**
     * @param Branch $branch
     * @param Menu $menu
     * @return void
     */
    public function assignMenu(Branch $branch, Menu $menu){
        if(Auth::id()!= $branch->user_id || Auth::id() != $menu->user_id){
            return response()->json(['error'=>"You don't own this resource"],401);
        }
        $branch->menu_id = $menu->id;
        $branch->save();
        return ['branch' => $branch, 'menu' => $menu];
    }

}
