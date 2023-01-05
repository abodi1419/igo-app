<h4>{{__('Restaurant information')}}</h4>
<table class="table table-responsive">
    <tr>
        <th>{{__('Name Arabic')}}</th>
        <td>{{$restaurant->name_ar}}</td>
    </tr>
    <tr>
        <th>{{__('Name English')}}</th>
        <td>{{$restaurant->name}}</td>
    </tr>
    <tr>
        <th>{{__('# of branches')}}</th>
        <td>{{$restaurant->num_of_branches}}</td>
    </tr>
    <tr>
        <th>{{__('Commercial register')}}</th>
        <td>{{$restaurant->commercial_register}}</td>
    </tr>
    <tr>
        <th>{{__('Join date')}}</th>
        <td>{{$restaurant->created_at}}</td>
    </tr>


</table>
<hr>
