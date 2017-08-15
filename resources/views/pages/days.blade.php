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
{{--<div class="activity text-center">
    @foreach($act as $activity)
        <div>

            <h4>{{$activity->activity_name}}</h4>
            <img style="width: 200px; height: 125px;" src="{{$activity->imgUrl}}" alt="No Image Available">
            <a href="{{$activity->url}}" target="_blank">See Yelp Reviews</a>
        </div>
    @endforeach
</div>--}}

<div class="col-sm-6">
    @foreach($act as $activity)
    <div class="panel panel-default result-card">

    <div class="panel-heading result-card-head"
         style="background-image: url( {{ $activity->imgUrl}} );">
<style> .result-card {
        margin: 7px -5px;
        height: 235px;
    }

    .result-card-head {
        height: 185px;
        background-size: cover;
        background-repeat: no-repeat;
        border: none;
        position: relative;
        padding: 0;
    }

    .result-card-name {
        position: absolute;
        bottom: 0;
        width: 100%;
        display: block;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 0 15px;
    }

    .result-card-name:hover {
        background-color: rgba(69, 187, 255, 0.70);
    }

    .result-card-body {
        padding: 5px 15px 0 15px;
        color: $brand-primary;
    }

    .result-card-body:hover {
        background-color: rgba(69, 187, 255, 0.1);
        padding-bottom: 3px;
    }

    .star-rating {
        position: absolute;
        bottom: 41px;
        width: 100%;
        background: rgba(0, 0, 0, 0.0); /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.5)); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.5)); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.5)); /* For Firefox 3.6 to 15 */
        background: linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.5)); /* Standard syntax */
    }</style>
</div>

<div class="result-card-name">
    <h4 class="giveMeEllipsis"> {{$activity->activity_name}} </h4>

</div>

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


