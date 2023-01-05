@extends('layouts.app')
@section('title', __('Workdays'))
@section('content')
    <div class="container-fluids">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card m-1 border-success">

                    <div class="card-header text-bg-success fw-bold">{{ __('Branches work hours') }}</div>

                    <div class="card-body">
                        @if(!count($branches))
                            <div class="p-5 ">
                                {{__("You can not add workdays before adding branches. ")}} <a class="fw-bold text-success" href="{{route('branches.create')}}">{{__('Create branches')}}</a>
                            </div>
                        @else
                        <form action="{{route('workdays.update')}}" method="post">
                            @csrf
                            <div class="mb-3 text-start">
                                <h4 class="text-start">{{__('Branches')}}</h4>
                                @foreach($branches as $branch)
                                    <div class="mb-3">
                                        <input id="{{$branch['id']}}" onchange="oneBoxCheckedBranches()" type="checkbox" class="form-check-input @error($branch['id']) is-invalid @enderror" name="branches[]" value="{{$branch['id']}}" checked required>
                                        <label for="{{$branch['id']}}" class="form-check-label">
                                            {{ $branch->username}}
                                            <br>
                                            <small>
                                                {{$branch->city}}
                                                <br>
                                                {{$branch->street_ar.' - '.$branch->street}}
                                            </small>

                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mb-3 text-center">
                                <h4 class="text-start">{{__('Days')}}</h4>
                                <input id="sunday" onchange="oneBoxChecked()" type="checkbox" class="form-check-input @error('sunday') is-invalid @enderror" name="days[]" value="sunday" required>
                                <label for="sunday" class="form-check-label">{{ __('Sun') }}</label>

                                <input id="monday" onchange="oneBoxChecked()" type="checkbox" class="form-check-input @error('monday') is-invalid @enderror" name="days[]" value="monday" required>
                                <label for="monday" class="form-check-label">{{ __('Mon') }}</label>

                                <input id="tuesday" onchange="oneBoxChecked()" type="checkbox" class="form-check-input @error('tuesday') is-invalid @enderror" name="days[]" value="tuesday" required>
                                <label for="tuesday" class="form-check-label">{{ __('Tue') }}</label>

                                <input id="wednesday" onchange="oneBoxChecked()" type="checkbox" class="form-check-input @error('wednesday') is-invalid @enderror" name="days[]" value="wednesday" required>
                                <label for="wednesday" class="form-check-label">{{ __('Wed') }}</label>

                                <input id="thursday" onchange="oneBoxChecked()" type="checkbox" class="form-check-input @error('thursday') is-invalid @enderror" name="days[]" value="thursday" required>
                                <label for="thursday" class="form-check-label">{{ __('Thu') }}</label>
                                <br>

                                <input id="friday" onchange="oneBoxChecked()" type="checkbox" class="form-check-input @error('friday') is-invalid @enderror" name="days[]" value="friday" required>
                                <label for="friday" class="form-check-label">{{ __('Fri') }}</label>

                                <input id="saturday" onchange="oneBoxChecked()" type="checkbox" class="form-check-input @error('saturday') is-invalid @enderror" name="days[]" value="saturday" required>
                                <label for="saturday" class="form-check-label">{{ __('Sat') }}</label>

                            </div>
                            <div class="row mb-3" >
                                <h4 class="text-start">{{__('Shifts')}}</h4>
                                <div class="col-6 text-center">
                                    <input id="opened" onchange="openedChanged(this)" type="checkbox" class="form-check-input @error('status[]') is-invalid @enderror" name="status[]" value="opened" >
                                    <label for="opened" class="form-check-label">{{ __('24 Hours') }}</label>
                                </div>
                                <div class="col-6 text-center">
                                    <input id="closed" onchange="closedChanged(this)" type="checkbox" class="form-check-input @error('status[]') is-invalid @enderror" name="status[]" value="closed" >
                                    <label for="closed" class="form-check-label">{{ __('Closed') }}</label>
                                </div>

                            </div >
                            <div class="mb-3" id="hoursDiv">

                                <div class="row mb-3 justify-content-center align-items-center">
                                    <label for="from1" class="col-md-2 col-form-label text-md-center">{{ __('From') }}</label>
                                    <div class="col-md-3">
                                        <input id="from1" type="time" class="form-control @error('phone') is-invalid @enderror" name="from[]" required>
                                    </div>
                                    <label for="to1" class="col-md-2 col-form-label text-md-center">{{ __('To') }}</label>

                                    <div class="col-md-3">
                                        <input id="to1" type="time" class="form-control @error('to[]') is-invalid @enderror" name="to[]" required>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>


                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 text-center">
                                    <button type="button" onclick="addHour()" class="btn btn-success">
                                        {{ __('Add hours') }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Save') }}
                                    </button>
                                </div>

                            </div>
                        </form>
                        @endif

                    </div>
                    @if(count($branches))
                    <div class="card-footer text-bg-success">
                        <div>
                            @include('workdays._table')
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <script>
        @if(count($branches))
        document.getElementById('opened').checked =false
        document.getElementById('closed').checked =false
        oneBoxChecked();
        oneBoxCheckedBranches()
        let counter = 2;

        function addHour(){
            let ownerDiv = document.createElement('div');
            ownerDiv.setAttribute('class','row mb-3 justify-content-center align-items-center')
            ownerDiv.setAttribute('id','hour'+counter);
            let label1 = document.createElement('label');
            let label2 = document.createElement('label');
            let timeInput1 = document.createElement('input');
            let timeInput2 = document.createElement('input');
            let timeDiv1 = document.createElement('div');
            let timeDiv2 = document.createElement('div');
            let actionDiv = document.createElement('div')
            actionDiv.setAttribute('class','col-md-2')
            let deleteButton = document.createElement('button');
            deleteButton.setAttribute('class','btn btn-light text-danger')
            let trashIcon = document.createElement('i')
            trashIcon.setAttribute('class','fa fa-trash')
            deleteButton.appendChild(trashIcon)
            deleteButton.onclick = function (){
                this.parentElement.parentElement.remove();
            }
            actionDiv.appendChild(deleteButton)

            setTimeProperties(label1,timeInput1,timeDiv1,ownerDiv,'from');
            setTimeProperties(label2,timeInput2,timeDiv2,ownerDiv,'to');
            ownerDiv.appendChild(actionDiv);
            document.getElementById('hoursDiv').appendChild(ownerDiv);
            counter++
        }

        function setTimeProperties(label,timeInput,timeDiv,ownerDiv,id){
            timeDiv.setAttribute('class','col-md-3');
            timeInput.setAttribute('class','form-control')
            timeInput.required = true
            timeInput.setAttribute('id',id+counter)
            timeInput.setAttribute('type','time');
            timeInput.setAttribute('name',id+'[]');
            label.setAttribute('class','col-md-2 col-form-label text-md-center');
            label.setAttribute('for',id+counter);
            if(id=='from') {
                label.innerText = '{{__('From')}}'
            }
            else
            {
                label.innerText = '{{__('To')}}'
            }
            timeDiv.appendChild(timeInput)
            ownerDiv.appendChild(label)
            ownerDiv.appendChild(timeDiv)
        }
        function openedChanged(e){
            let froms = document.getElementsByName('from[]')
            let tos = document.getElementsByName('to[]')
            if(e.checked){
                document.getElementById('closed').checked = false
                document.getElementById('hoursDiv').hidden = true;
                document.getElementById('hoursDiv').disabled = true;
                froms.forEach(function (value,index){
                    value.disabled = true;
                    tos[index].disabled = true;
                })
            }else {
                document.getElementById('hoursDiv').disabled = false;
                document.getElementById('hoursDiv').hidden = false;
                froms.forEach(function (value,index){
                    value.disabled = false;
                    tos[index].disabled = false;
                })
            }
        }
        function closedChanged(e){
            let froms = document.getElementsByName('from[]')
            let tos = document.getElementsByName('to[]')
            if(e.checked){
                document.getElementById('opened').checked = false
                document.getElementById('hoursDiv').hidden = true;
                document.getElementById('hoursDiv').disabled = true;

                froms.forEach(function (value,index){
                    value.disabled = true;
                    tos[index].disabled = true;
                })


            }else {
                document.getElementById('hoursDiv').disabled = false;
                document.getElementById('hoursDiv').hidden = false;
                froms.forEach(function (value,index){
                    value.disabled = false;
                    tos[index].disabled = false;
                })
            }
        }
        function oneBoxChecked(){
            let days = document.getElementsByName('days[]')
            let flag = false
            days.forEach(function (value){
                value.required = true
                if(value.checked){
                    flag=true;
                }
            })
            if(flag) {
                days.forEach(function (value) {
                    value.required = false;
                })
            }
        }

        function oneBoxCheckedBranches(){
            let branches = document.getElementsByName('branches[]')
            let flag = false
            branches.forEach(function (value){
                value.required = true
                if(value.checked){
                    flag=true;
                }
            })
            if(flag) {
                branches.forEach(function (value) {
                    value.required = false;
                })
            }
        }
        @endif
    </script>
@endsection
