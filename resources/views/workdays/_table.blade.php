<h3 class="mb-3">{{__('Current workdays')}}</h3>
<table class="table table-success">
    <thead>
        <tr>
            <th>{{__('Branch')}}</th>
            <th>{{__('Days')}}</th>
            <th>{{__('Work hours')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($branches as $branch)
            <tr>
                <td rowspan="8">
                    {{$branch->username}}
                    <br>
                    <small>
                        {{$branch->city}}
                        <br>
                        {{$branch->street_ar.' - '.$branch->street}}
                    </small>

                </td>

            </tr>
            <tr>
                <td>{{__("Sun")}}</td>
                @php
                    $workday = $branch->workdays()->where('day','=','sunday')->first()
                @endphp
                @if($workday->status == 2)
                    <td>{{__('24 Hours')}}</td>
                @elseif($workday->status == 0)
                    <td>{{__('Closed')}}</td>
                @else
                <td>
                    @foreach($workday->workHours as $workHour)
                        {{substr($workHour->from,0,5).' - '.substr($workHour->to,0,5)}}
                        <br>
                    @endforeach
                </td>
                @endif
            </tr>
            <tr>
                <td>{{__("Mon")}}</td>
                @php
                    $workday = $branch->workdays()->where('day','=','monday')->first()
                @endphp
                @if($workday->status == 2)
                    <td>{{__('24 Hours')}}</td>
                @elseif($workday->status == 0)
                    <td>{{__('Closed')}}</td>
                @else
                    <td>
                        @foreach($workday->workHours as $workHour)
                            {{substr($workHour->from,0,5).' - '.substr($workHour->to,0,5)}}
                            <br>
                        @endforeach
                    </td>
                @endif
            </tr>
            <tr>
                <td>{{__("Tue")}}</td>
                @php
                    $workday = $branch->workdays()->where('day','=','tuesday')->first()
                @endphp
                @if($workday->status == 2)
                    <td>{{__('24 Hours')}}</td>
                @elseif($workday->status == 0)
                    <td>{{__('Closed')}}</td>
                @else
                    <td>
                        @foreach($workday->workHours as $workHour)
                            {{substr($workHour->from,0,5).' - '.substr($workHour->to,0,5)}}
                            <br>
                        @endforeach
                    </td>
                @endif
            </tr>
            <tr>
                <td>{{__("Wed")}}</td>
                @php
                    $workday = $branch->workdays()->where('day','=','wednesday')->first()
                @endphp
                @if($workday->status == 2)
                    <td>{{__('24 Hours')}}</td>
                @elseif($workday->status == 0)
                    <td>{{__('Closed')}}</td>
                @else
                    <td>
                        @foreach($workday->workHours as $workHour)
                            {{substr($workHour->from,0,5).' - '.substr($workHour->to,0,5)}}
                            <br>
                        @endforeach
                    </td>
                @endif
            </tr>
            <tr>
                <td>{{__("Thu")}}</td>
                @php
                    $workday = $branch->workdays()->where('day','=','thursday')->first()
                @endphp
                @if($workday->status == 2)
                    <td>{{__('24 Hours')}}</td>
                @elseif($workday->status == 0)
                    <td>{{__('Closed')}}</td>
                @else
                    <td>
                        @foreach($workday->workHours as $workHour)
                            {{substr($workHour->from,0,5).' - '.substr($workHour->to,0,5)}}
                            <br>
                        @endforeach
                    </td>
                @endif
            </tr>
            <tr>
                <td>{{__("Fri")}}</td>
                @php
                    $workday = $branch->workdays()->where('day','=','friday')->first()
                @endphp
                @if($workday->status == 2)
                    <td>{{__('24 Hours')}}</td>
                @elseif($workday->status == 0)
                    <td>{{__('Closed')}}</td>
                @else
                    <td>
                        @foreach($workday->workHours as $workHour)
                            {{substr($workHour->from,0,5).' - '.substr($workHour->to,0,5)}}
                            <br>
                        @endforeach
                    </td>
                @endif
            </tr>
            <tr>
                <td>{{__("Sat")}}</td>
                @php
                    $workday = $branch->workdays()->where('day','=','saturday')->first()
                @endphp
                @if($workday->status == 2)
                    <td>{{__('24 Hours')}}</td>
                @elseif($workday->status == 0)
                    <td>{{__('Closed')}}</td>
                @else
                    <td>
                        @foreach($workday->workHours as $workHour)
                            {{substr($workHour->from,0,5).' - '.substr($workHour->to,0,5)}}
                            <br>
                        @endforeach
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
