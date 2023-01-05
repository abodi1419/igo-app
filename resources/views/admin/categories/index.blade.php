@extends('admin.layouts.app')
@section('title',__('Restaurant products categories'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / {{__("Restaurant products categories")}}</h6>
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
            <h4>{{__('Restaurant products categories')}}</h4>
        </div>
        <div class="col-6 mb-2 text-end pe-4">
            <a class="btn btn-dark" href="{{route('admin.restaurant.categories.create',$restaurant)}}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="container">

        <table class="table text-center">
            <thead class="text-bg-dark">
            <tr>
                <th>{{__('Name Arabic')}}</th>
                <th>{{__('Name English')}}</th>
                <th>{{__('Index')}}</th>
                <th>{{__('Description Arabic')}}</th>
                <th>{{__('Description English')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($productsCategories as $productsCategory)
                <tr class="text-center">
                    <td>{{$productsCategory->name_ar}}</td>
                    <td>{{$productsCategory->name}}</td>
                    <td>{{$productsCategory->index}}</td>
                    <td>{{$productsCategory->description_ar}}</td>
                    <td>{{$productsCategory->description}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.restaurant.categories.edit',[$productsCategory,$restaurant])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-dark" href="{{route('admin.restaurant.categories.add.products',[$productsCategory,$restaurant])}}"><i class="fa fa-plus"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="6"><div>{{__("No categories created. ")}} <a class=" p-1 fw-bold text-dark" href="{{route('admin.restaurant.categories.create')}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
