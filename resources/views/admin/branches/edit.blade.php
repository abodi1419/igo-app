@extends('admin.layouts.app')
@section('title',__('Restaurant edit branch'))
@section('title_bar')
    <div style="margin-right: 60px">
        <div class="row">
            <h6 class="col-8"><a class="text-dark" href="{{route('admin.restaurant.index')}}">{{__("Restaurants")}}</a> /
                <a class="text-dark" href="{{route('admin.restaurant.branches.index',$restaurant)}}">{{__("Restaurant branches")}}</a> /
                {{__("Restaurant edit branch")}}
            </h6>

        </div>
    </div>
@endsection
@section('content')
    @include('admin.restaurants.__restaurant_info')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-dark">
                    <div class="card-header text-bg-dark fw-bold">{{ __('Edit branch') }}</div>

                    <div class="card-body">
                        <form action="{{route('admin.restaurant.branches.update',[$branch,$restaurant])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $branch->username }}" required autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name_ar" class="col-md-4 col-form-label text-md-end">{{ __('Name in Arabic') }}</label>

                                <div class="col-md-6">
                                    <input id="name_ar" placeholder="?????? ????????????" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ $branch->name_ar }}" required autofocus>

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
                                    <input id="name" placeholder="Almarwah branch" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $branch->name }}" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" pattern="[0-9]{10}" placeholder="05xxxxxxxx" class="form-control text-center @error('phone') is-invalid @enderror" name="phone" value="{{ $branch->phone }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="url" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$branch->location}}" required>

                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    {{--                                    <input id="city" type="text" placeholder="Jeddah" class="form-control @error('city') is-invalid @enderror" name="city" required>--}}
                                    <input class="form-control" onfocusout="grepDistricts(this)" name="city" list="citiesDataList" value="{{$branch->city}}" id="city"  placeholder="{{__("Select city")}}">
                                    <datalist id="citiesDataList" ></datalist>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">

                                <label for="district" class="col-md-4 col-form-label text-md-end">{{ __('District') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" name="district" list="districtsDataList" id="district" placeholder="{{__("Select district")}}" value="{{$branch->district}}" required>
                                    <datalist id="districtsDataList" ></datalist>

                                    @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="street_ar" class="col-md-4 col-form-label text-md-end">{{ __('Street in Arabic') }}</label>

                                <div class="col-md-6">
                                    <input id="street_ar" type="text" placeholder="???????? ????????" class="form-control @error('street_ar') is-invalid @enderror" value="{{$branch->street_ar}}" name="street_ar" required>

                                    @error('street_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="street" class="col-md-4 col-form-label text-md-end">{{ __('Street in English') }}</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" placeholder="Hera'a street" class="form-control @error('street') is-invalid @enderror" value="{{$branch->street}}" name="street" required>

                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="menu_id" class="col-md-4 col-form-label text-md-end">{{ __('Menu') }}</label>

                                <div class="col-md-6">
                                    <select name="menu_id" class="form-control" id="menu_id">
                                        @foreach($menus as $menu)
                                            <option value="{{$menu->id}}" @if($menu->id==$branch->menu_id) {{'selected'}} @endif>{{$menu->name.' - '.$menu->products()->count().' '.__('product/s')}}</option>
                                        @endforeach
                                    </select>

                                    @error('menu_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$branch->description}}" required>

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
        </div>
    </div>
    <script>
        let xhttp = new XMLHttpRequest();
        xhttp.open('GET','{{asset('cities')}}',true)
        xhttp.onreadystatechange = (e) => {
            if(xhttp.readyState == 4) {
                if(xhttp.status == 200) {
                    let cities = JSON.parse(xhttp.response)
                    let dataList = document.getElementById('citiesDataList')
                    cities.forEach(function (value){
                        let option = document.createElement('option')
                        option.setAttribute('value',value['name_ar']+' - '+value['name_en'])
                        option.setAttribute('id',value['city_id']);
                        dataList.appendChild(option);
                    })
                }
                else {
                    console.log('something went wrong')
                }
            }

        }
        xhttp.send();
        grepDistricts(document.getElementById('city'));
        function grepDistricts(e) {
            let query = document.querySelectorAll('option[value="' + e.value + '"]');
            let id = query[0].id;
            xhttp.open('GET', '{{asset('district')}}/' + id);
            xhttp.onreadystatechange = (e) => {
                if (xhttp.readyState == 4) {
                    if (xhttp.status == 200) {
                        let districts = JSON.parse(xhttp.response)
                        let dataList = document.getElementById('districtsDataList')
                        districts.forEach(function (value) {
                            let option = document.createElement('option')
                            option.setAttribute('value', value['name_ar'] + ' - ' + value['name_en'])
                            dataList.appendChild(option);
                        })
                        document.getElementById('district').disabled = false;
                    } else {
                        console.log('something went wrong')
                    }
                }

            }
            xhttp.send();
        }
    </script>
@endsection
