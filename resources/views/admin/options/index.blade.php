@extends('admin.layouts.app')
@section('title',__('Restaurant branches'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / {{__("Restaurant products options")}}</h6>
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
    <div class="container">
        <div class="row">
            <div class="col-6 mb-2">
                <h4>{{__('Restaurant products options')}}</h4>
            </div>
            <div class="col-6 mb-2 text-end pe-4">
                <a class="btn btn-dark" href="{{route('admin.restaurant.options.create',$restaurant)}}">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <table class="table">
            <thead class="text-bg-dark">
            <tr>
                <th>{{__('Option arabic')}}</th>
                <th>{{__('Option english')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($options as $productOption)
                <tr>
                    <td>{{$productOption->option_ar}}</td>
                    <td>{{$productOption->option}}</td>
                    <td>{{$productOption->price}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.restaurant.options.edit',[$productOption,$restaurant])}}"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="4"><div>{{__("No options created. ")}} <a class="p-1 fw-bold text-dark" href="{{route('admin.restaurant.options.create',$restaurant)}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
