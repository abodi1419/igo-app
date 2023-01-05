@extends('admin.layouts.app')
@section('title',__('Restaurant branches'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / {{__("Restaurant branches")}}</h6>
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
            <h4>{{__('Restaurant branches')}}</h4>
        </div>
        <div class="col-6 mb-2 text-end pe-4">
            <a class="btn btn-dark" href="{{route('admin.restaurant.branches.create',$restaurant)}}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead class="text-bg-dark">
            <tr>
                <th>{{__('Username')}}</th>
                <th>{{__('City')}}</th>
                <th>{{__('Street')}}</th>
                <th>{{__('Phone')}}</th>
                <th>{{__('Status')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($branches as $branch)
                <tr>
                    <td>{{$branch->username}}</td>
                    <td>{{$branch->city}}</td>
                    <td>{{$branch->street}}</td>
                    <td>{{$branch->phone}}</td>
                    <td>
                        @if($branch->status === 2)
                            <a class="btn border-0 text-dark" href="{{route('admin.restaurant.branches.enable',$branch)}}"><i class="fa-solid fa-2x fa-toggle-off"></i></a>
                        @elseif($branch->status == 1)
                            <a class="btn border-0 text-success" href="{{route('admin.restaurant.branches.disable',$branch)}}"><i class="fa-solid fa-2x fa-toggle-on"></i></a>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.restaurant.branches.edit',[$branch,$restaurant])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-info" href="{{route('admin.restaurant.branches.show',[$branch,$restaurant])}}"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="5"><div>{{__("No branches created. ")}} <a class=" p-1 fw-bold text-dark" href="{{route('admin.restaurant.branches.create',$restaurant)}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
