<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\WorkDay;
use App\Models\WorkHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkDayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkDay  $workDay
     * @return \Illuminate\Http\Response
     */
    public function show(WorkDay $workDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $branches = Auth::user()->branches;
        return view('workdays.edit',compact('branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
           'days'=>'array|min:1|max:7|required',
           'days.*'=>'in:sunday,monday,tuesday,wednesday,thursday,friday,saturday',
            'branches'=>'array|min:1|required',
            'branches.*'=>'exists:branches,id',
            'from' => 'array|min:1',
            'to'=>'array|min:1',
            'from.*'=>'date_format:H:i',
            'to.*'=>'date_format:H:i',
            'status'=>'array|min:1|max:1',
            'status.*'=>'in:opened,closed'
        ]);
        $days = DB::table('work_days')->whereIn('branch_id',$request->branches)->whereIn('day',$request->days)->get('id')->toArray();
        $branches = Branch::findMany($validatedData['branches']);
        foreach ($branches as $branch){
            if($branch->user_id!=Auth::id()){
                abort(401,'You dont own the branches!');
            }
        }
        $daysIds = [];
        foreach ($days as $day){
            array_push($daysIds,$day->id);
        }
        WorkHour::whereIn('work_day_id',$daysIds)->delete();
        if($request->has('from')){
            $from = $request->from;
            $to = $request->to;
            $data = [];
            for ($i=0;$i<count($from);$i++){
                foreach ($daysIds as $dayId)
                    array_push($data,[ 'from'=> $from[$i],'to'=>$to[$i] ,'work_day_id'=>$dayId]);
            }

            WorkHour::insert($data);
            WorkDay::whereIn('id',$daysIds)->update(['status'=>'1']);

        }else{
            if($request->status[0] == 'opened') {
                WorkDay::whereIn('id', $daysIds)->update(['status' => '2']);
            }
            else {
                WorkDay::whereIn('id', $daysIds)->update(['status' => '0']);
            }
        }

        return redirect()->back()->with(['message'=>__('Updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkDay  $workDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkDay $workDay)
    {
        //
    }
}
