@extends('admin.layouts.app')
@section('title',__('Restaurant coupons'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / {{__("Restaurant coupons")}}</h6>
            {{--            <div class="col-6 text-end pe-4">--}}
            {{--                <a class="btn btn-dark" href="{{route('admin.restaurant.branches.create',$restaurant)}}">--}}
            {{--                    <i class="fa fa-plus"></i>--}}
            {{--                </a>--}}
            {{--            </div>--}}
        </div>
    </div>
@endsection
@section('content')
    @include('admin.restaurants.__restaurant_info')
    <div class="row">
        <div class="col-6 mb-2">
            <h4>{{__('Restaurant coupons')}}</h4>
        </div>
        <div class="col-6 mb-2 text-end pe-4">
            <a class="btn btn-dark" href="{{route('admin.restaurant.coupons.create',$restaurant)}}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="container">

        <table class="table text-center">
            <thead class="text-bg-dark">

            <tr>
                <th>{{__('Code')}}</th>
                <th>{{__('Total required')}}</th>
                <th>{{__('Max discount value')}}</th>
                <th>{{__('Start date')}}</th>
                <th>{{__('End date')}}</th>
                <th>{{__('Status')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($coupons as $coupon)
                <tr class="text-center">
                    <td>{{$coupon->code}}</td>
                    <td>{{$coupon->total_required}}</td>
                    @if($coupon->has_max_value)
                        <td>{{$coupon->max_value}}</td>
                    @else
                        <td>{{__("No limit")}}</td>
                    @endif
                    <td>{{date('d/m/Y H:i:s', strtotime($coupon->start_date))}}</td>
                    <td>{{date('d/m/Y H:i:s', strtotime($coupon->end_date))}}</td>
                    <td>
                        @if($coupon->status == 0)
                            <a class="btn btn-transparent border-0" href="{{route('admin.restaurant.coupons.enable',$coupon)}}"><i class="fa fa-2x fa-toggle-off"></i></a>
                        @elseif($coupon->status == 1)
                            <a class="btn btn-transparent text-success border-0" href="{{route('admin.restaurant.coupons.disable',$coupon)}}"><i class="fa fa-2x fa-toggle-on"></i></a>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.restaurant.coupons.edit',[$coupon,$restaurant])}}"><i class="fa fa-edit"></i></a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="6"><div>{{__("No coupons created. ")}} <a class=" p-1 fw-bold text-dark" href="{{route('admin.restaurant.coupons.create',$restaurant)}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
