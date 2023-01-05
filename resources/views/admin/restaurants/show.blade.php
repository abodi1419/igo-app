
@extends('admin.layouts.app')
@section('title',__('Restaurants'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h3 class="col-6"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / {{__("Restaurant information")}}</h3>


        </div>
    </div>

@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-img-top text-center pt-3">
            @if($restaurant->image)
                <img height="150" src="{{asset('storage/restaurants/'.$restaurant->id.'/'.$restaurant->image)}}" alt="">
            @else
                <img src="{{asset('storage/no-image.png')}}" alt="">
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title">{{__('Restaurant information')}}</h5>

            <table class="table table-responsive card-text text-center">
                <tr>
                    <th>{{__('Name Arabic')}}</th>
                    <td>{{$restaurant->name_ar}}</td>
                </tr>
                <tr>
                    <th>{{__('Name English')}}</th>
                    <td>{{$restaurant->name}}</td>
                </tr>
                <tr>
                    <th>{{__('Email Address')}}</th>
                    <td>{{$restaurant->email}}</td>
                </tr>
                <tr>
                    <th>{{__('Phone')}}</th>
                    <td>{{$restaurant->phone}}</td>
                </tr>
                <tr>
                    <th>{{__('Commercial register')}}</th>
                    <td>{{$restaurant->commercial_register}}</td>
                </tr>
                <tr>
                    <th>{{__('Status')}}</th>
                    @if($restaurant->status==1)
                        <td><span class="badge rounded-pill text-bg-success">{{__("Active")}}</span></td>
                    @elseif($restaurant->status==0)
                        <td><span class="badge rounded-pill text-bg-danger">{{__("Deleted")}}</span></td>
                    @endif
                </tr>
                <tr>
                    <th>{{__('# of branches')}}</th>
                    <td>{{$restaurant->num_of_branches}}</td>
                </tr>
                <tr>
                    <th>{{__('Commission')}}</th>
                    <td>{{$restaurant->commission}}%</td>
                </tr>
                <tr>
                    <th>{{__('Rating')}}</th>
                    @if($restaurant->reating)
                        <td>{{$restaurant->reating}}</td>
                    @else
                        <td><span class="badge rounded-pill text-bg-warning">{{__("Not rated yet")}}</span></td>
                    @endif

                </tr>
                <tr>
                    <th>{{__('Email verification')}}</th>
                    @if($restaurant->email_verified_at)
                        <td>{{$restaurant->email_verified_at}}</td>
                    @else
                        <td><span class="badge rounded-pill text-bg-danger">{{__("Not verified")}}</span></td>
                    @endif

                </tr>
                <tr>
                    <th>{{__('Join date')}}</th>
                    <td>{{$restaurant->created_at}}</td>
                </tr>

            </table>
{{--            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
        </div>
    </div>








@endsection
