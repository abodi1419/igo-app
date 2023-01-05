@extends('admin.layouts.app')
@section('title',__('Create restaurants category'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> /
                <a class="text-dark" href="{{route('admin.categories.index')}}">{{__("Restaurants categories")}}</a> /
                {{__("Create restaurants category")}}
            </h6>

        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="card border-dark">
            <div class="card-header text-bg-dark">{{ __('Create restaurants category') }}</div>

            <div class="card-body">
                <form action="{{route('admin.categories.store')}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="name_ar" class="col-md-4 col-form-label text-md-end">{{ __('Name Arabic') }}</label>

                        <div class="col-md-6">
                            <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name_ar')}}" required autofocus>

                            @error('name_ar')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name English') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description_ar" class="col-md-4 col-form-label text-md-end">{{ __('Description Arabic') }}</label>

                        <div class="col-md-6">
                            <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar" cols="30" rows="10">{{ old('description_ar') }}</textarea>
                            @error('description_ar')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description English') }}</label>

                        <div class="col-md-6">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
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
