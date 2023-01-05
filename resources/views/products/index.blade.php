
@extends('layouts.app')
@section('title', __('Products'))
@section('content')
    <div class="container">
        <table class="table">
            <thead class="text-bg-success">
            <tr>
                <th colspan="6">
                    <h3 class="fw-bold">{{__("Products")}}</h3>
                </th>
            </tr>
            <tr>
                <th>{{__('Image')}}</th>
                <th>{{__('Name Arabic')}}</th>
                <th>{{__('Name English')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Menus')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
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
                        <a class="btn btn-success" href="{{route('products.edit',$product)}}"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="6"><div>{{__("No products created. ")}} <a class=" p-1 fw-bold text-success" href="{{route('products.create')}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
