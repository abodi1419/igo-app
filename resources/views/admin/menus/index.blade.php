@extends('admin.layouts.app')
@section('title',__('Restaurant menus'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / {{__("Restaurant menus")}}</h6>
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
            <h4>{{__('Restaurant menus')}}</h4>
        </div>
        <div class="col-6 mb-2 text-end pe-4">
            <a class="btn btn-dark" href="{{route('admin.restaurant.menus.create',$restaurant)}}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="container">

        <table class="table text-center">
            <thead class="text-bg-dark"s>

            <tr>
                <th>{{__('Name')}}</th>
                <th>{{__('# of products')}}</th>
                <th>{{__('Description')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($menus as $menu)
                <tr class="text-center">
                    <td>{{$menu->name}}</td>
                    <td>{{$menu->products()->count()}}</td>
                    <td>
                        @if($menu->description)
                            {{$menu->description}}
                        @else
                            {{__("No description")}}
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.restaurant.menus.edit',[$menu,$restaurant])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-dark" href="{{route('admin.restaurant.menu.add.products',[$menu,$restaurant])}}"><i class="fa fa-plus"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="4"><div>{{__("No menus created. ")}} <a class=" p-1 fw-bold text-success" href="{{route('admin.restaurant.menus.create',$restaurant)}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
