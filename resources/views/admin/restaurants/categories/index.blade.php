@extends('admin.layouts.app')
@section('title',__('Restaurants categories'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h3 class="col-6">{{__("Restaurants categories")}}</h3>
            <div class="col-6 text-end" >
                <a class="btn btn-dark"  href="{{route('admin.categories.create')}}"><i class="fa fa-plus-square"></i></a>
            </div>

        </div>
    </div>

@endsection
@section('content')
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>{{__('Name Arabic')}}</th>
                <th>{{__('Name English')}}</th>
                <th>{{__('# of restaurants')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $index=>$category)

            <tr>
                <td>{{$index+1}}</td>
                <td>{{$category->name_ar}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->restaurants->count()}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('admin.categories.show',$category->id)}}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-warning" href="{{route('admin.categories.edit',$category->id)}}">
                        <i class="fa fa-edit"></i>
                    </a>
{{--                    <form class="d-inline" action="{{route('admin.categories.destroy',$category->id)}}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method("DELETE")--}}
{{--                        <button class="btn btn-danger">--}}
{{--                            <i class="fa fa-trash"></i>--}}
{{--                        </button>--}}
{{--                    </form>--}}
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>




@endsection
