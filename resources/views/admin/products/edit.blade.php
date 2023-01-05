@extends('admin.layouts.app')
@section('title',__('Restaurant product edit'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-6"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / <a class="text-dark" href="{{route('admin.restaurant.products.index',$restaurant)}}">{{__("Restaurant products")}}</a> / {{__("Restaurant product edit")}}</h6>

        </div>
    </div>
@endsection
@section('content')
    @include('admin.restaurants.__restaurant_info')
    <div class="container">
        <div class="card border-dark">
            <div class="card-header text-bg-dark fw-bold">{{ __('Edit product') }}</div>

            <div class="card-body">
                <h6>{{__('Images')}}</h6>
                <div class="row justify-content-center align-items-center mb-3">
                    @forelse($product->images as $image)
                        <div class="col-sm-6 col-md-3 position-relative text-center" id="img-{{$image->id}}">
{{--                            <div style="position: absolute; top: 0; right: 0;" class="text-danger">--}}
{{--                            </div>--}}
                            <img class="mb-3" src="{{route('product.get.image',[$product,$image->name])}}" height="60" alt="">
                            <br>

                            <button class="btn btn-danger" onclick="ajaxDelete('{{route('admin.restaurant.products.image.delete',$image->id)}}')">
                                <i class="fa fa-times-circle fa-lg"></i>
                            </button>
                        </div>
                    @empty
                        <div class="col-12 text-center">{{__("No images added to this product")}}</div>
                    @endforelse
                </div>
                <hr>
                <form action="{{route('admin.restaurant.products.update',[$product,$restaurant])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label for="name_ar" class="col-md-4 col-form-label text-md-end">{{ __('Name in Arabic') }}</label>

                        <div class="col-md-6">
                            <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ $product->name_ar }}" required autofocus>

                            @error('name_ar')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name in English') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price with vat') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="number" step=".01" min="0.1" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autofocus>

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="calories" class="col-md-4 col-form-label text-md-end">{{ __('Calories') }}</label>

                        <div class="col-md-6">
                            <input id="calories" type="number" step=".01" class="form-control @error('calories') is-invalid @enderror" name="calories" value="{{ $product->calories }}" required autofocus>

                            @error('calories')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="images" class="col-md-4 col-form-label text-md-end">{{ __('Choose images') }}</label>

                        <div class="col-md-6">
                            <input id="images" accept="image/*" type="file" class="form-control @error('images') is-invalid @enderror" name="images[]" multiple>

                            @error('images')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 text-center">
                        <h6 class="text-start">{{__('Options')}}</h6>


                        @forelse($options as $option)
                            <div class="text-center">

                                <input id="option{{$option->id}}" type="checkbox" class="form-check-input" name="options[]" value="{{$option->id}}"
                                       {{count($product->options->where('id', $option->id)) ? 'checked':''}}>
                                <label for="option{{$option->id}}" class="form-check-label">{{ $option->option }}</label>
                            </div>
                        @empty
                            <div>
                                {{__('No options created. ')}}<a class="d-inline" href="#">{{__('Create one')}}</a>
                            </div>
                        @endforelse
                    </div>
                    <div class="row mb-3 text-center">
                        <h6 class="text-start">{{__('Categories')}}</h6>


                        @forelse($productsCategories as $productsCategory)
                            <div class="text-center">

                                <input id="category{{$productsCategory->id}}" type="checkbox" class="form-check-input" name="productsCategories[]" value="{{$productsCategory->id}}"
                                    {{count($product->categories->where('id', $productsCategory->id)) ? 'checked':''}}>
                                <label for="category{{$productsCategory->id}}" class="form-check-label">{{ $productsCategory->name }}</label>
                            </div>

                        @empty
                            <div>
                                {{__('No categories created. ')}}<a class="d-inline" href="#">{{__('Create one')}}</a>
                            </div>
                        @endforelse
                        @error('productsCategories')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="row mb-3 text-center">
                        <h6 class="text-start">{{__('Menus')}}</h6>
                        @forelse($menus as $menu)
                            <div class="text-center">

                                <input id="menu{{$menu->id}}" type="checkbox" class="form-check-input @error('menus') is-invalid @enderror" name="menus[]" value="{{$menu->id}}"  {{count($product->menus->where('id', $menu->id))?'checked':''}}>
                                <label for="menu{{$menu->id}}" class="form-check-label">{{ $menu->name }}</label>
                            </div>
                        @empty
                            <div>
                                {{__('No menus created. ')}}<a class="d-inline" href="admin.menus.create">{{__("Create one")}}</a>
                            </div>
                        @endforelse
                        @error('menus')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="description_ar" class="col-md-4 col-form-label text-md-end">{{ __('Description in Arabic') }}</label>

                        <div class="col-md-6">
                            <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar" cols="30" rows="10">{{ $product->description_ar }}</textarea>
                            @error('description_ar')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description in English') }}</label>

                        <div class="col-md-6">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        function ajaxDelete(url){
            const http = new XMLHttpRequest();
            http.open("DELETE", url);
            http.setRequestHeader("X-Requested-With","XMLHttpRequest");
            http.setRequestHeader("X-CSRF-Token", document.querySelector('meta[name="csrf-token"]').content);


            http.onreadystatechange = (e) => {
                if(http.readyState == 4) {
                    if(http.status == 200) {
                        document.getElementById('img-'+http.response).remove()
                    }
                    else {
                        console.log('something went wrong')
                    }
               }

            }
            http.send();
        }
    </script>
@endsection
