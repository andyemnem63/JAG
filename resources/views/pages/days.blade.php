@extends('layouts.dashboard-dual')

@section('leftcontent')
{{--Create Days--}}
    <h1>Welcome {{$currentUser}}</h1>
    <form action="/days" method="post" role="form">
        <legend>Create New Days</legend>
        <div class="form-group">
            {{csrf_field()}}
            <input type="hidden" name="id" value={{$trip_id}}>
        </div>
        <button type="submit" class="btn btn-primary">New Days</button>
    </form>

{{--Display Activity--}}
<div class="activity text-center">
    @foreach($act as $activity)
        <div>
            @php
            $activity_name = implode(' ', $activity->activity_name);
            @endphp
            <h4>{{$activity_name}}</h4>
            <img style="width: 200px; height: 125px;" src="{{$activity->imgUrl}}" alt="No Image Available">
            <a href="{{$activity->url}}">See Yelp Reviews</a>
        </div>
    @endforeach
</div>

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
            <a href="{{$trip_id}}/{{$polls->id}}/pollChoice" class="btn btn-default">{{$polls->poll_message}} {{$usersVoted}}/{{$totalUsers}}</a>
        @endif
    @endforeach


@endsection


