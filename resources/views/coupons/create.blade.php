
@extends('layouts.app')
@section('title', __('Create coupon'))

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header text-bg-success fw-bold">{{ __('Create coupon') }}</div>

            <div class="card-body">
                <form action="{{route('coupons.store')}}" method="post">
{{--                <form action="" method="post">--}}
                    @csrf

                    <div class="row mb-3">
                        <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>

                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autofocus>

                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="discount" class="col-md-4 col-form-label text-md-end">{{ __('Discount').' (%)' }}</label>

                        <div class="col-md-6">
                            <input id="discount" type="number" lang="en" max="100" min="1" placeholder="10" step="1" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount') }}" required autofocus>

                            @error('discount')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <input id="has_max" type="checkbox" onchange="hasMaxChanged(this)" class="form-check-input @error('discount') is-invalid @enderror" name="has_max" value="has_max" @if(old('has_max')) checked @endif autofocus>
                        <label for="has_max" class="form-check-label">{{ __('Discount has max value?') }}</label>
                    </div>
                    <div class="row mb-3" id="has_max_div" style="display: none" disabled>
                        <label for="max_value" class="col-md-4 col-form-label text-md-end">{{ __('Max value') }}</label>

                        <div class="col-md-6">
                            <input id="max_value" type="number" lang="en" min="0" placeholder="10" step="0.01" class="form-control @error('max_value') is-invalid @enderror" name="max_value" value="{{ old('max_value') }}" disabled autofocus>

                            @error('max_value')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3" id="has_max_div">
                        <label for="total_required" class="col-md-4 col-form-label text-md-end">{{ __('Order minimum value') }}</label>

                        <div class="col-md-6">
                            <input id="total_required" lang="en" type="number" min="0" placeholder="10" step="0.01" class="form-control @error('total_required') is-invalid @enderror" name="total_required" value="{{ old('total_required')?old('total_required'):0 }}" required autofocus>

                            @error('total_required')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3" id="has_max_div">
                        <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('Start date') }}</label>

                        <div class="col-md-6">
                            <input id="start_date" min="{{today('Asia/Riyadh')}}" type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required autofocus>

                            @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3" id="has_max_div">
                        <label for="end_date" class="col-md-4 col-form-label text-md-end">{{ __('End date') }}</label>

                        <div class="col-md-6">
                            <input id="end_date" min="{{today('Asia/Riyadh')}}" type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" required autofocus>

                            @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>




                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

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
                            <button type="submit" class="btn btn-success">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        let hasMax= document.getElementById('has_max');
        if(hasMax.checked){
            showMaxValueDiv()
        }else {
            hideMaxValueDiv()
        }
        function hasMaxChanged(e){
            if(e.checked==true) {
                showMaxValueDiv()
            }else {
                hideMaxValueDiv()
            }
        }

        function showMaxValueDiv(){
            $('#has_max_div').show()
            $('#max_value').prop( "disabled", false );
            $('#max_value').prop( "required", true );
        }

        function hideMaxValueDiv(){
            $('#has_max_div').hide()
            $('#max_value').prop( "disabled", true );
            $('#max_value').prop( "required", false );
        }
    </script>
@endsection
