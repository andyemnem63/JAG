@extends('layouts.dashboard-dual')

{{--@section('leftcontent')--}}
{{--Create Days--}}
    <h1>Welcome {{$currentUser}}</h1>
    <form action="/days" method="post" role="form">
        <legend>Here's your Itinerary!</legend>
        <div class="form-group">
            {{csrf_field()}}
            <input type="hidden" name="id" value={{$trip_id}}>
        </div>
       {{-- <button type="submit" class="btn btn-primary">New Days</button>--}}
        <br><br>
    </form>




@foreach($act as $activity)
    <div class="col-sm-3" id="left-column">
<div class="card" style="width: 20em;">
    <img class="card-img-top" src="{{ $activity->imgUrl}}" alt="Card image cap" width="225" height="150">
    <a class="card-block">
        <h4 class="card-title">{{$activity->activity_name}}</h4>
        <a href="{{$activity->url}}" target="_blank"><p class="card-text">Click me for Yelp Reviews!</p></a>
        <a href="/activity/{{$activity->id}}"  class="btn btn-primary">Delete</a>
        <br><br>
    </div>
</div>
@endforeach


{{--Create a counter variable to show the day number--}}
    <?php $dayCount = 1; ?>
    @for($i=0; $i < count($allDays); $i++)
        @if($allDays[$i]->day_id== $trip_id)
            <a href="/days/{{$trip_id}}/days/{{$dayCount}}"><h3>Day {{$dayCount++}}</h3></a>
        @endif
    @endfor


@endsection

@section('rightcontent')
{{--Create Polls--}}
    <form action="/days/{{$trip_id}}/polls" method="post" role="form">
        <div class="form-group">
            {{csrf_field()}}
            <label for="">Create Poll</label>
            <input type="text" class="form-control" name="createPoll">
            <input type="hidden" name="id" value={{$trip_id}}>
        </div>
        <button type="submit" class="btn btn-primary">DONE</button>
    </form>

{{--Shows All Polls--}}
    <h3>Polls</h3>
    @foreach($allPolls as $polls)
        @if($polls->invite_id == $trip_id)
            <a href="/days/{{$trip_id}}/{{$polls->invite_id}}/results" class="btn btn-default">{{$polls->poll_message}} {{$usersVoted}}/{{$totalUsers}}</a>
        @endif
    @endforeach


@endsection


