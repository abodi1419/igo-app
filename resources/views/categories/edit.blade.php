
@extends('layouts.app')
@section('title', __('Edit category'))

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header text-bg-success fw-bold">{{ __('Edit category') }}</div>

            <div class="card-body">
                <form action="{{route('categories.update',$productsCategory)}}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="row mb-3">
                        <label for="name_ar" class="col-md-4 col-form-label text-md-end">{{ __('Name Arabic') }}</label>

                        <div class="col-md-6">
                            <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ $productsCategory->name_ar }}" required autofocus>

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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $productsCategory->name }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="index" class="col-md-4 col-form-label text-md-end">{{ __('Category index (show for users)') }}</label>

                        <div class="col-md-6">
                            <input id="index" type="number" step="1" class="form-control @error('index') is-invalid @enderror" name="index" value="{{ $productsCategory->index }}" required autofocus>

                            @error('index')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description_ar" class="col-md-4 col-form-label text-md-end">{{ __('Description Arabic') }}</label>

                        <div class="col-md-6">
                            <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar" cols="30" rows="10">{{$productsCategory->description_ar }}</textarea>
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
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ $productsCategory->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection
