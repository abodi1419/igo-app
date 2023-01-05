
@extends('admin.layouts.app')
@section('title',__('Restaurant product edit'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-6"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> / <a class="text-dark" href="{{route('admin.restaurant.products.index',$restaurant)}}">{{__("Restaurant products")}}</a> / {{__("Restaurant product create")}}</h6>

        </div>
    </div>
@endsection
@section('content')
    @include('admin.restaurants.__restaurant_info')
    <div class="container">
        <div class="card border-dark">
            <div class="card-header text-bg-dark fw-bold">{{ __('Create product') }}</div>

            <div class="card-body">
                <form action="{{route('admin.restaurant.products.store',$restaurant)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="name_ar" class="col-md-4 col-form-label text-md-end">{{ __('Name in Arabic') }}</label>

                        <div class="col-md-6">
                            <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name_ar') }}" required autofocus>

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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

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
                            <input id="price" type="number" step=".01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autofocus>

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
                            <input id="calories" type="number" step=".01" class="form-control @error('calories') is-invalid @enderror" name="calories" value="{{ old('calories') }}" required autofocus>

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

                                <input id="option{{$option->id}}" type="checkbox" class="form-check-input @error('options[]') is-invalid @enderror" name="options[]" value="{{$option->id}}">


                                <label for="option{{$option->id}}" class="form-check-label">{{ app()->getLocale()=='en'? $option->option: $option->option_ar }}</label>

                            </div>
                        @empty
                            <div>
                                {{__('No options created ')}}<a class="d-inline" href="{{route('options.create')}}">{{__("Create one")}}</a>
                            </div>
                        @endforelse
                    </div>
                    <div class="row mb-3 text-center">
                        <h6 class="text-start">{{__('Categories')}}</h6>
                        @forelse($productsCategories as $productsCategory)
                            <div class="text-center">
                                <input id="category{{$productsCategory->id}}" type="checkbox" class="form-check-input @error('productsCategories[]') is-invalid @enderror" name="productsCategories[]" value="{{$productsCategory->id}}">
                                <label for="category{{$productsCategory->id}}" class="form-check-label">{{ app()->getLocale()=='en'? $productsCategory->name: $productsCategory->name_ar }}</label>
                            </div>
                        @empty
                            <div>
                                {{__('No categories created. ')}}<a class="d-inline" href="{{route('categories.create')}}">{{__("Create one")}}</a>
                            </div>
                        @endforelse
                        @error('productsCategories')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="row mb-3 text-center">
                        <h6 class="text-start @error('menus') is-invalid @enderror">{{__('Menus')}}</h6>
                        @forelse($menus as $menu)
                            <div class="text-center">

                                <input id="menu{{$menu->id}}" type="checkbox" class="form-check-input @error('menus') is-invalid @enderror" name="menus[]" value="{{$menu->id}}">
                                <label for="menu{{$menu->id}}" class="form-check-label">{{ $menu->name }}</label>
                            </div>
                        @empty
                            <div>
                                {{__('No menus created. ')}}<a class="d-inline" href="{{route('menus.create')}}">{{__("Create one")}}</a>
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
                            <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar" cols="30" rows="10">{{old('description_ar')}}</textarea>
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
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{old('description')}}</textarea>
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
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
