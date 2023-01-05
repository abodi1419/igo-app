
@extends('layouts.app')
@section('title', __('Branches'))

@section('content')
    <div class="container">
        <table class="table">
            <thead class="text-bg-success">
            <tr>
                <th colspan="5">
                    <h3 class="fw-bold">{{__("Branches")}}</h3>
                </th>
            </tr>
            <tr>
                <th>{{__('Username')}}</th>
                <th>{{__('City')}}</th>
                <th>{{__('Street')}}</th>
                <th>{{__('Phone')}}</th>
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
                        <a class="btn btn-success" href="{{route('branches.edit',$branch)}}"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center" colspan="5"><div>{{__("No branches created. ")}} <a class=" p-1 fw-bold text-success" href="{{route('branches.create')}}">{{__('Create one')}}</a></div></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
