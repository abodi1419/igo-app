@extends('admin.layouts.app')
@section('title',__('Restaurant products'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-6"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / {{__("Restaurant products")}}</h6>

        </div>
    </div>
@endsection
@section('content')
    @include('admin.restaurants.__restaurant_info')
    <div class="row">
        <div class="col-6 mb-2">
            <h4>{{__('Restaurant products')}}</h4>
        </div>
        <div class="col-6 mb-2 text-end pe-4">
            <a class="btn btn-dark" href="{{route('admin.restaurant.products.create',$restaurant)}}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>

    <div class="container">

        <table class="table">
            <thead class="text-bg-dark">
            <tr>
                <th>{{__('Image')}}</th>
                <th>{{__('Name Arabic')}}</th>
                <th>{{__('Name English')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Menus')}}</th>
                <th>{{__('Status')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($userProducts as $product)
                <tr>
                    <td>
                        <img height="30" src="{{route('random.image',$product)}}" alt="">
                    </td>
                    <td>{{$product->name_ar}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        @forelse($product->menus()->get(['name']) as $name)
                            {{$name['name'].', '}}
                        @empty
                            {{__("No menus")}}
                        @endforelse
                    </td>
                    <td>
                        @if($product->status === 2)
                            <a class="btn border-0 text-dark" href="{{route('admin.restaurant.products.enable',$product)}}"><i class="fa-solid fa-2x fa-toggle-off"></i></a>
                        @elseif($product->status == 1)
                            <a class="btn border-0 text-success" href="{{route('admin.restaurant.products.disable',$product)}}"><i class="fa-solid fa-2x fa-toggle-on"></i></a>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.restaurant.products.edit',[$product,$restaurant->id])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-info" href="{{route('admin.restaurant.products.show',[$product,$restaurant->id])}}"><i class="fa fa-eye"></i></a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="6"><div>{{__("No products created. ")}} <a class=" p-1 fw-bold text-success" href="{{route('admin.restaurant.products.create',$restaurant)}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
