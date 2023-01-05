
@extends('layouts.app')
@section('title', __('Options'))
@section('content')
    <div class="container">
        <table class="table">
            <thead class="text-bg-success">
            <tr>
                <th colspan="4">
                    <h3 class="fw-bold">{{__("Products options")}}</h3>
                </th>
            </tr>
            <tr>
                <th>{{__('Option arabic')}}</th>
                <th>{{__('Option english')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($options as $option)
                <tr>
                    <td>{{$option->option_ar}}</td>
                    <td>{{$option->option}}</td>
                    <td>{{$option->price}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('options.edit',$option)}}"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="4"><div>{{__("No options created. ")}} <a class="p-1 fw-bold text-success" href="{{route('options.create')}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
