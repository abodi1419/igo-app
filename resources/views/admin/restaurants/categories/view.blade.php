@extends('admin.layouts.app')
@section('title',__('Restaurants category'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h3 class="col-6">{{__("Restaurants category")}}</h3>

        </div>
    </div>

@endsection
@section('content')
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>{{__('Name Arabic')}}</th>
                <td>{{$category->name_ar}}</td>
            </tr>
            <tr>
                <th>{{__('Name English')}}</th>
                <td>{{$category->name}}</td>
            </tr>
            <tr>

                <th>{{__('# of restaurants')}}</th>
                <td>{{$category->restaurants->count()}}</td>

            </tr>
            <tr>
                <th>{{__('Description Arabic')}}</th>
                <td>{{$category->description_ar?$category->description_ar:__("No description")}}</td>
            </tr>
            <tr>
                <th>{{__('Description English')}}</th>
                <td>{{$category->description?$category->description:__("No description")}}</td>
            </tr>
        </table>

        <h5>{{__("Restaurants in category")}}</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__("Name Arabic")}}</th>
                    <th>{{__("Name English")}}</th>
                    <th>{{__('Actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($category->restaurants as $index=>$restaurant)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$restaurant->name_ar}}</td>
                        <td>{{$restaurant->name}}</td>
                        <td>
                            <button class="btn btn-danger" id="rm{{$restaurant->id}}" onclick="ajaxRemove('{{route('admin.categories.remove',[$restaurant,$category->id])}}')">
                                <i class="fa fa-minus"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            {{__("No restaurants added")}}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <script>
        function ajaxRemove(url){
            $.ajax(

                {

                    url: url,

                    type: "get",

                    success: function (data) {
                        $('#rm'+data).closest('tr').remove();
                    },


                })


        }
    </script>




@endsection
