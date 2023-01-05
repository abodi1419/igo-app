
@extends('layouts.app')
@section('title', __('Edit categories'))
@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header text-bg-success fw-bold">{{ __('Edit categories') }}</div>

            <div class="card-body">
                <h5>{{__("Choose categories (Max:5)")}}</h5>
                <form action="{{route('categories.update',\Illuminate\Support\Facades\Auth::id())}}" method="post">
                    @csrf
                    @method('PATCH')
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>
                                    {{__("Check")}}
                                </th>
                                <th>
                                    {{__("Category name")}}
                                </th>
                                <th>
                                    {{__("Check")}}
                                </th>
                                <th>
                                    {{__("Category name")}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $ar = app()->getLocale()=='ar';
                        @endphp
                            @foreach($categories as $index=>$category)
                                @if($index%2==0)
                                    <tr>
                                        <td>
                                            <input id="check{{$category->id}}" value="{{$category->id}}" type="checkbox" class="form-check-input" name="categories[]">
                                        </td>
                                        <td>
                                            @if($ar)
                                                <label class="w-100" for="check{{$category->id}}">{{$category->name_ar}}</label>
                                            @else
                                                <label class="w-100" for="check{{$category->id}}">{{$category->name}}</label>
                                            @endif

                                        </td>
                                @else
                                        <td>
                                            <input id="check{{$category->id}}" value="{{$category->id}}" type="checkbox" class="form-check-input" name="categories[]" >
                                        </td>
                                        <td>
                                            @if($ar)
                                                <label class="w-100" for="check{{$category->id}}">{{$category->name_ar}}</label>
                                            @else
                                                <label class="w-100" for="check{{$category->id}}">{{$category->name}}</label>
                                            @endif

                                        </td>
                                @endif

                                @if($index%2!=0)
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
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
    <script>

        let selected =[];
        window.onload = ()=>{
            let selectedCats = '{{json_encode($selectedCats)}}';
            selectedCats = JSON.parse(selectedCats);
            $('.form-check-input').removeAttr('checked');
            for(let i in selectedCats){
                $('#check'+selectedCats[i]).attr('checked','true')
                selected.push(selectedCats[i]+'')
            }
            if(selected.length>4){
                $('.form-check-input').attr('disabled','true');
                for(let i in selected){
                    $('#check'+selected[i]).removeAttr('disabled')
                }
            }else {
                $('.form-check-input').removeAttr('disabled')
            }
        }
        $('.form-check-input').on('change',function (e){
            if(e.target.checked){
                selected.push(e.target.value);
            }else {
                let index = selected.indexOf(e.target.value)
                console.log(index)
                selected.pop(index);
            }
            if(selected.length>4){
                $('.form-check-input').attr('disabled','true');
                for(let i in selected){
                    $('#check'+selected[i]).removeAttr('disabled')
                }
            }else {
                $('.form-check-input').removeAttr('disabled')
            }
            console.log(selected);
        })
    </script>
@endsection
