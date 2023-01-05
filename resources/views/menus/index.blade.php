
@extends('layouts.app')
@section('title', __('Menus'))

@section('content')
    <div class="container">

        <table class="table text-center">
            <thead class="text-bg-success"s>
            <tr>
                <th colspan="4">
                    <h3 class="fw-bold text-start">{{__("Menus")}}</h3>
                </th>
            </tr>
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
                    <td>{{$menu->description}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('menus.edit',$menu)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-success" href="{{route('menu.add.products',$menu)}}"><i class="fa fa-plus"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="4"><div>{{__("No menus created. ")}} <a class=" p-1 fw-bold text-success" href="{{route('menus.create')}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
