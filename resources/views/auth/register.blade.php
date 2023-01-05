@extends('layouts.app')
@section('title', __('Restaurant register'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header text-bg-success fw-bold">{{ __('Restaurant register') }}</div>

                <div class="card-body">
                    <div class="text-center mb-2">
                        <img src="" alt="" height="60" id="blah">
                    </div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Restaurant logo') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name_ar" class="col-md-4 col-form-label text-md-end">{{ __('Arabic name') }}</label>

                            <div class="col-md-6">
                                <input id="name_ar" placeholder="{{__('Restaurant name in Arabic')}}" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name_ar') }}" required autocomplete="name_ar" autofocus>

                                @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('English name') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="{{__('Restaurant name in English')}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="someone@example.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" pattern="[0-9]{10}" placeholder="05xxxxxxxx" class="form-control text-center @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="commercial_register" class="col-md-4 col-form-label text-md-end">{{ __('Commercial register') }}</label>

                            <div class="col-md-6">
                                <input id="commercial_register" type="text" pattern="[0-9]{10}" placeholder="{{__('10 digits number')}}" class="form-control text-center @error('commercial_register') is-invalid @enderror" name="commercial_register" value="{{ old('commercial_register') }}" required autocomplete="commercial_register">
                                @error('commercial_register')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="num_of_branches" class="col-md-4 col-form-label text-md-end">{{ __('Number of branches') }}</label>

                            <div class="col-md-6">
                                <input id="num_of_branches" type="number" placeholder="{{__('Ex')}}: 4" min="1" class="form-control text-center @error('num_of_branches') is-invalid @enderror" name="num_of_branches" value="{{ old('num_of_branches') }}" required>

                                @error('num_of_branches')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="{{__("At least 8 characters")}}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="{{__('Retype password')}}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection
