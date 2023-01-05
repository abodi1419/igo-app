@extends('admin.layouts.app')
@section('title',__('Restaurant edit menu'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> /
                <a class="text-dark" href="{{route('admin.restaurant.menus.index',$restaurant)}}">{{__("Restaurant menus")}}</a> /
                {{__("Restaurant edit menu")}}
            </h6>

        </div>
    </div>
@endsection
@section('content')
    @include('admin.restaurants.__restaurant_info')
    <div class="container">
        <div class="card border-dark">
            <div class="card-header text-bg-dark">{{ __('Edit menu') }}</div>

            <div class="card-body">
                <form action="{{route('admin.restaurant.menus.update',[$menu,$restaurant])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $menu->name}}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ $menu->description }}</textarea>
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


@endsection
