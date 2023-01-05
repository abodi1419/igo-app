
@extends('admin.layouts.app')
@section('title',__('Restaurants'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h3 class="col-6"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / {{__("Deleted restaurants")}}</h3>
            <div class="col-6 text-end" >
                <a class="btn btn-dark"  href="{{route('admin.restaurant.create')}}"><i class="fa fa-plus-square"></i></a>
            </div>

        </div>
    </div>

@endsection
@section('content')
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>{{__('Name Arabic')}}</th>
            <th>{{__('Name English')}}</th>
            <th>{{__('# of branches')}}</th>
            <th>{{__('Commission')}}</th>
            <th>{{__('Join date')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($restaurants as $restaurant)

            <tr>
                <td>{{$restaurant->name_ar}}</td>
                <td>{{$restaurant->name}}</td>
                <td>{{$restaurant->num_of_branches}}</td>
                <td>{{$restaurant->commission}}%</td>
                <td>{{$restaurant->created_at}}</td>
                <td>

                    <form class="d-inline" action="{{route('admin.restaurant.restore',$restaurant->id)}}" method="post">
                        @csrf
                        @method("PATCH")
                        <button class="btn btn-danger mb-3">{{__("Restore")}}</button>
                    </form>



                </td>
            </tr>

        @endforeach
        </tbody>
    </table>




@endsection
