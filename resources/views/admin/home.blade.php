@extends('admin.layouts.app')
@section('title',__('Home'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h3 class="col-6">{{__("Home")}}</h3>
        </div>
    </div>

@endsection
@section('content')
    <style>
        .card-icon:dir(rtl){
            position: absolute; left: 10px; top: -13px; padding-top: 10px; border-radius: 5px;height: 45px;width: 45px; text-align: center;
        }
        .card-icon:dir(ltr){
            position: absolute; right: 10px; top: -13px; padding-top: 10px; border-radius: 5px;height: 45px;width: 45px; text-align: center;
        }
    </style>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card text-bg-white border-0"  >
                <div class="card-header bg-white border-0"><h4>{{__('Restaurants')}}</h4></div>
                <div class="card-body">
                    {{--                    <h5 class="card-title">Info card title</h5>--}}
                    <p class="card-text h3 text-center">{{$restaurants}}</p>

                </div>
                <span class="d-inline-block icon-bg card-icon">
                    <i class="fas fa-lg fa-utensils"></i>
                </span>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card text-bg-white border-0" >
                <div class="card-header border-0 bg-white"><h4>{{__('Customers')}}</h4></div>
                <div class="card-body">

                    <p class="card-text h3 text-center" >{{$customers}}</p>
                </div>
                <span class="d-inline-block icon-bg card-icon">
                    <i class="fa fa-lg fa-user-group"></i>
                </span>

            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card text-bg-white border-0 position-relative"  >
                <div class="card-header border-0 bg-white"><h4>{{__('Branches')}}</h4></div>
                <div class="card-body">
                    {{--                    <h5 class="card-title">Info card title</h5>--}}
                    <p class="card-text h3 text-center">{{$branches}}</p>
                </div>
                <span class="d-inline-block icon-bg card-icon">
                    <i class="fa-solid fa-lg fa-store"></i>
                </span>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card text-bg-white border-0"  >
                <div class="card-header border-0 bg-white"><h4>{{__('Products')}}</h4></div>
                <div class="card-body">
                    {{--                    <h5 class="card-title">Info card title</h5>--}}
                    <p class="card-text h3 text-center">{{$products}}</p>
                </div>
                <span class="d-inline-block icon-bg  card-icon">
                    <i class="fas fa-lg fa-hamburger"></i>
                </span>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
            <div class="card text-bg-white border-0"  >
                <div class="card-header bg-white border-0"><h4>{{__('Coupons')}}</h4></div>
                <div class="card-body">
                    {{--                    <h5 class="card-title">Info card title</h5>--}}
                    <p class="card-text h3 text-center">{{$coupons}}</p>
                </div>
                <span class="d-inline-block icon-bg card-icon">
                    <i class="fas fa-lg fa-user-tag"></i>
                </span>
            </div>
        </div>
    </div>

@endsection
