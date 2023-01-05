
@extends('layouts.app')
@section('title', __('Categories'))

@section('content')
    <div class="container">

        <table class="table text-center">
            <thead class="text-bg-success"s>
            <tr>
                <th colspan="6">
                    <h3 class="fw-bold text-start">{{__("Categories")}}</h3>
                </th>
            </tr>
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
                        <a class="btn btn-success" href="{{route('categories.edit',$productsCategory)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-success" href="{{route('categories.add.products',$productsCategory)}}"><i class="fa fa-plus"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="6"><div>{{__("No categories created. ")}} <a class=" p-1 fw-bold text-success" href="{{route('categories.create')}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
