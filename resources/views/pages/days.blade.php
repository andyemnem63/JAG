{{--Goes to acctLayout in the layouts folder--}}
@extends('layouts.dashboardLayout')

@section('content')
{{--Create Days--}}
    <h1>Trip Id {{$trip_id}}</h1>
    <form action="/days" method="post" role="form">
        <legend>Create New Days</legend>
        <div class="form-group">
            {{csrf_field()}}
            <input type="hidden" name="id" value={{$trip_id}}>
        </div>
        <button type="submit" class="btn btn-primary">New Days</button>
    </form>

    {{$dayCount = 1 }}
    @for($i=0; $i < count($allDays); $i++)
        @if($allDays[$i]->day_id== $trip_id)
            <h3>Day {{$dayCount++}}</h3>
            <hr><br>
        @endif
    @endfor
@endsection


