
@extends('layouts.app')
@section('title', __('Edit option'))
@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header text-bg-success fw-bold">{{ __('Edit option') }}</div>

            <div class="card-body">
                <form action="{{route('options.update',$option)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label for="option_ar" class="col-md-4 col-form-label text-md-end">{{ __('Option in Arabic') }}</label>

                        <div class="col-md-6">
                            <input id="option_ar" type="text" class="form-control @error('option_ar') is-invalid @enderror" name="option_ar" value="{{ $option->option_ar }}" required autofocus>

                            @error('option_ar')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="option" class="col-md-4 col-form-label text-md-end">{{ __('Option in English') }}</label>

                        <div class="col-md-6">
                            <input id="option" type="text" class="form-control @error('option') is-invalid @enderror" name="option" value="{{ $option->option }}" required autofocus>

                            @error('option')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="number" step=".01" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$option->price }}" required autofocus>

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description_ar" class="col-md-4 col-form-label text-md-end">{{ __('Description in Arabic') }}</label>

                        <div class="col-md-6">
                            <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar" cols="30" rows="10">{{ $option->description_ar }}</textarea>
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
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ $option->description }}</textarea>
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
