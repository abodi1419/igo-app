@extends('admin.layouts.app')
@section('title',__('Restaurant add products to category'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> /
                <a class="text-dark" href="{{route('admin.restaurant.categories.index',$restaurant)}}">{{__("Restaurant products categories")}}</a> /
                {{__("Restaurant add products to category")}}
            </h6>

        </div>
    </div>
@endsection
@section('content')
    @include('admin.restaurants.__restaurant_info')
    <div class="container">
        <div class="card mb-3 border-dark">
            <div class="card-header text-bg-dark fw-bold">
                <h4>{{__('Add products to category')}}: {{$productsCategory->name_ar.' - '.$productsCategory->name}}</h4>
            </div>
            <div class="card-body">
                <div class="row justify-content-center align-items-center ajax" id="product-data">
                    @include('admin.categories.__data')

                </div>

                <div class="ajax-load text-center pt-5" style="display:none">

                    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>

                </div>
            </div>


        </div>




    </div>
    <script>
        var page = 1;

        $('.fixed').scroll(function() {

            if($('.fixed').scrollTop() + $('.fixed').height() >= $(document).height()) {

                page++;

                loadMoreData(page);

            }

        });


        function loadMoreData(page){

            $.ajax(

                {

                    url: '?page=' + page,

                    type: "get",

                    beforeSend: function()

                    {

                        $('.ajax-load').show();

                    }

                })

                .done(function(data)

                {

                    if(data.html == " "){

                        $('.ajax-load').html("No more records found");

                        return;

                    }

                    $('.ajax-load').hide();

                    $("#product-data").append(data.html);

                })

                .fail(function(jqXHR, ajaxOptions, thrownError)

                {

                    alert('server not responding...');

                });

        }

        function addProduct(url){
            $.ajax(

                {

                    url: url,

                    type: "get",

                    success: function (data) {
                        let addId = "#add-"+data
                        let rmId = "#rm-"+data
                        $(addId).hide()
                        $(rmId).show()
                    },


                    })


        }
        function removeProduct(url){
            $.ajax(

                {

                    url: url,

                    type: "get",

                    success: function (data) {
                        let addId = "#add-"+data
                        let rmId = "#rm-"+data
                        $(rmId).hide()
                        $(addId).show()
                    },


                })


        }
    </script>

@endsection
