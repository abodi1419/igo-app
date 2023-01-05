

@foreach($products as $product)

    <div class="col-sm-12 col-md-6 col-lg-4 text-center mb-3" >
        <div class="card text-center" style="width: 18rem;">
            <img src="{{route('random.image',$product)}}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">{{$product->name_ar}}</h5>
                <small>{{ $product->name }}</small>
                <br>
                <small class="text-success">{{ $product->price.' '.__('SAR') }}</small>
                <br>
                <small class="">{{ $product->calories }} {{__('Calorie')}}</small>
                <div class="text-center mt-3">
                    @php
                    $isInCategory = count($product->categories()->where('product_category_id',$productsCategory->id)->get());
                    @endphp

                    <div id="rm-{{$product->id}}" @if(!$isInCategory) style="display: none" @endif >
                        <button class="btn btn-danger" onclick="removeProduct('{{route('admin.restaurant.categories.remove.product',[$productsCategory,$product])}}')">
                            <i class="fa fa-minus fa-lg"></i>
                        </button>
                    </div>

                    <div id="add-{{$product->id}}" @if($isInCategory) style="display: none" @endif >
                        <button class="btn btn-success" onclick="addProduct('{{route('admin.restaurant.categories.add.product',[$productsCategory,$product])}}')">
                            <i class="fa fa-plus fa-lg"></i>
                        </button>
                    </div>

                </div>


            </div>
        </div>
    </div>

@endforeach
