@extends('admin.layouts.app')
@section('title',__('Restaurants'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h3 class="col-6">{{__("Restaurants")}}</h3>
            <div class="col-6 text-end" >
                <a class="btn btn-dark" href="{{route('admin.restaurant.index.deleted')}}">{{__("Deleted restaurants")}}</a>
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
                    <a class="btn btn-info" href="{{route('admin.restaurant.show',$restaurant->id)}}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-warning" href="{{route('admin.restaurant.edit',$restaurant->id)}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form class="d-inline" action="{{route('admin.restaurant.destroy',$restaurant->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-2x fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>

                            </li>
                            <li>

                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('admin.restaurant.products.index',$restaurant->id)}}">
                                    <i class="fa-solid fa-table-list"></i>
                                    <span>{{__("Products")}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('admin.restaurant.branches.index',$restaurant->id)}}">
                                    <i class="fa-solid fa-shop"></i>
                                    <span>{{__("Branches")}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('admin.restaurant.options.index',$restaurant->id)}}">
                                    <i class="fa-solid fa-list-check"></i>
                                    <span>{{__("Products options")}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('admin.restaurant.menus.index',$restaurant->id)}}">
                                    <i class="fa-solid fa-bars"></i>
                                    <span>{{__("Menus")}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('admin.restaurant.categories.index',$restaurant->id)}}">
                                    <i class="fa-solid fa-list"></i>
                                    <span>{{__("Categories")}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('admin.restaurant.coupons.index',$restaurant->id)}}">
                                    <i class="fa-solid fa-tags"></i>
                                    <span>{{__("Coupons")}}</span>
                                </a>
                            </li>
                            <li>

                            </li>
                        </ul>
                    </div>









                </td>
            </tr>

        @endforeach
        </tbody>
    </table>




@endsection
