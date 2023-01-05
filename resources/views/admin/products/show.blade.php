
@extends('admin.layouts.app')
@section('title',__('Show restaurant product'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> /
                <a class="text-dark" href="{{route('admin.restaurant.products.index',$restaurant)}}">{{__("Restaurant products")}}</a> /
                {{__("Show restaurant product")}}
            </h6>


        </div>
    </div>

@endsection
@section('content')
    <div class="card mb-3 border-0">
        <div class="card-header bg-white text-bg-white border-0">
            @include('admin.restaurants.__restaurant_info')
        </div>
        <div class="card-body">
            <h5 class="card-title">{{__('Product information')}}</h5>

            <table class="table table-responsive card-text text-center">
                <tr>
                    <th>{{__('Images')}}</th>
                    <td>
                        <div class="row justify-content-center align-items-center">
                            @forelse($product->images as $image)
                                <div class="col-2 text-center" id="img-{{$image->id}}">
                                    <img class="mb-3" src="{{route('product.get.image',[$product,$image->name])}}" height="60" alt="">
                                </div>
                            @empty
                                <div class="col-12 text-center">{{__("No images added to this product")}}</div>
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <th>{{__('Name Arabic')}}</th>
                    <td>{{$product->name_ar}}</td>
                </tr>
                <tr>
                    <th>{{__('Name English')}}</th>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <th>{{__('Price with vat')}}</th>
                    <td>{{$product->price}}</td>
                </tr>
                <tr>
                    <th>{{__('Calories')}}</th>
                    <td>
                        {{$product->calories}}
                    </td>
                </tr>
                <tr>
                    <th>{{__('Status')}}</th>
                    @if($product->status==1)
                        <td><span class="badge rounded-pill text-bg-success">{{__("Active")}}</span></td>
                    @elseif($product->status==0)
                        <td><span class="badge rounded-pill text-bg-danger">{{__("Deleted")}}</span></td>
                    @elseif($product->status==2)
                        <td><span class="badge rounded-pill text-bg-danger">{{__("Disabled")}}</span></td>
                    @endif
                </tr>
                <tr>
                    <th>{{__('Options')}}</th>
                    <td>
                        @forelse($product->options as $option)
                            <span class="badge text-bg-secondary mx-1">
                                @if(app()->getLocale()=='ar')
                                    {{$option->option_ar}}
                                @else
                                    {{$option->option}}
                                @endif
                            </span>
                        @empty
                            {{__("No options")}}
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <th>{{__('Categories')}}</th>
                    <td>
                        @foreach($product->categories as $category)
                            <span class="badge text-bg-secondary mx-1">
                                @if(app()->getLocale()=='ar')
                                    {{$category->name_ar}}
                                @else
                                    {{$category->name}}
                                @endif
                            </span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>{{__('Menus')}}</th>
                    <td>
                        @foreach($product->menus as $menu)
                            {{$menu->name}},
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>{{__('Description Arabic')}}</th>
                    <td>
                    @if(!$product->description_ar)
                        <span class="badge text-bg-warning">{{__('No Arabic description')}}</span>
                    @else
                        {{$product->description_ar}}
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>{{__('Description English')}}</th>
                    <td>
                        @if(!$product->description)
                            <span class="badge text-bg-warning">{{__('No English description')}}</span>
                        @else
                            {{$product->description}}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>{{__('Creation date')}}</th>
                    <td>{{$product->created_at}}</td>
                </tr>

            </table>
{{--            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
        </div>
    </div>








@endsection
