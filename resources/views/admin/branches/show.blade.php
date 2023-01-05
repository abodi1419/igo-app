
@extends('admin.layouts.app')
@section('title',__('Show branch'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> /
                <a class="text-dark" href="{{route('admin.restaurant.branches.index',$restaurant)}}">{{__("Restaurant branches")}}</a> /
                {{__("Show restaurant branch")}}
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
            <h5 class="card-title">{{__('Branch information')}}</h5>

            <table class="table table-responsive card-text text-center">
                <tr>
                    <th>{{__('Username')}}</th>
                    <td>{{$branch->username}}</td>
                </tr>
                <tr>
                    <th>{{__('Name Arabic')}}</th>
                    <td>{{$branch->name_ar}}</td>
                </tr>
                <tr>
                    <th>{{__('Name English')}}</th>
                    <td>{{$branch->name}}</td>
                </tr>
                <tr>
                    <th>{{__('Phone')}}</th>
                    <td>{{$branch->phone}}</td>
                </tr>
                <tr>
                    <th>{{__('Location')}}</th>
                    <td>
                        <a class="text-dark" href="{{$branch->location}}">{{__("Click")}}</a>

                    </td>
                </tr>
                <tr>
                    <th>{{__('Status')}}</th>
                    @if($branch->status==1)
                        <td><span class="badge rounded-pill text-bg-success">{{__("Active")}}</span></td>
                    @elseif($branch->status==0)
                        <td><span class="badge rounded-pill text-bg-danger">{{__("Deleted")}}</span></td>
                    @elseif($branch->status==2)
                        <td><span class="badge rounded-pill text-bg-danger">{{__("Disabled")}}</span></td>
                    @endif
                </tr>
                <tr>
                    <th>{{__('City')}}</th>
                    <td>{{$branch->city}}</td>
                </tr>
                <tr>
                    <th>{{__('District')}}</th>
                    <td>{{$branch->district}}</td>
                </tr>
                <tr>
                    <th>{{__('Street in Arabic')}}</th>
                    <td>{{$branch->street_ar}}</td>
                </tr>
                <tr>
                    <th>{{__('Street in English')}}</th>
                    <td>{{$branch->street}}</td>
                </tr>
                <tr>
                    <th>{{__('Menu')}}</th>
                    @if($branch->menu_id)
                        <td>{{$branch->menu->name}}</td>
                    @else
                        <td><span class="badge rounded-pill text-bg-danger">{{__("No menu")}}</span></td>
                    @endif
                </tr>

                <tr>
                    <th>{{__('Creation date')}}</th>
                    <td>{{$branch->created_at}}</td>
                </tr>

            </table>
{{--            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
        </div>
    </div>








@endsection
