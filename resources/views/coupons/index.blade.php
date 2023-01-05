
@extends('layouts.app')
@section('title', __('Coupons'))

@section('content')
    <div class="container">

        <table class="table text-center">
            <thead class="text-bg-success"s>
            <tr>
                <th colspan="6">
                    <h3 class="fw-bold text-start">{{__("Coupons")}}</h3>
                </th>
            </tr>
            <tr>
                <th>{{__('Code')}}</th>
                <th>{{__('Total required')}}</th>
                <th>{{__('Max discount value')}}</th>
                <th>{{__('Start date')}}</th>
                <th>{{__('End date')}}</th>
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
                        <a class="btn btn-success" href="{{route('coupons.edit',$coupon)}}"><i class="fa fa-edit"></i></a>
                        @if($coupon->status == 0)
                            <a class="btn btn-warning" href="{{route('coupons.enable',$coupon)}}">{{__("Enable")}}</a>
                        @elseif($coupon->status == 1)
                            <a class="btn btn-danger" href="{{route('coupons.disable',$coupon)}}">{{__("Disable")}}</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="6"><div>{{__("No coupons created. ")}} <a class=" p-1 fw-bold text-success" href="{{route('coupons.create')}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
