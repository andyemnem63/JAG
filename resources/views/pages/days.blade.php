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

@php
    $count=1;
@endphp

<div class="col-sm-6">
    <div class="panel panel-default result-card">
        @foreach($businesses as $business)
        <a data-toggle="modal" data-target="#Modal{{$count}}" class="card-info">
            <div class="panel-heading result-card-head"
                 style="background-image: url( {{ $business->image_url }} );">
                <div class="star-rating">
                    <p class="fa">
                        @if ($business->rating === 5.0)
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                        @elseif ($business->rating === 4.5)
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star-half-o"></span>
                        @elseif ($business->rating === 4.0)
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star-o"></span>
                        @elseif ($business->rating === 3.5)
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star-half-o"></span>
                            <span class="fa-star-o"></span>
                        @elseif ($business->rating === 3.0)
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                        @elseif ($business->rating === 2.5)
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star-half-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                        @elseif ($business->rating === 2.0)
                            <span class="fa-star"></span>
                            <span class="fa-star"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                        @elseif ($business->rating === 1.5)
                            <span class="fa-star"></span>
                            <span class="fa-star-half-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                        @elseif ($business->rating === 1.0)
                            <span class="fa-star"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                        @elseif ($business->rating === 0.5)
                            <span class="fa-star-half-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                        @else
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                            <span class="fa-star-o"></span>
                        @endif
                    </p>
                </div>

                <div class="result-card-name">
                    <h4 class="giveMeEllipsis"> {{ $business->name }} </h4>
                </div>

            </div>
        </a>

        <a href="http://maps.google.com/?q={{ $address }}" target="_blank">
            <div class="panel-body result-card-body">
                <h4 class="giveMeEllipsis"><i class="fa fa-map-o"></i>&nbsp;&nbsp;{{ $address }} </h4>
            </div>
        </a>

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
            <a href="{{$trip_id}}/{{$polls->id}}/pollChoice" class="btn btn-default">{{$polls->poll_message}} {{$usersVoted}}/{{$totalUsers}}</a>
        @endif
    @endforeach


@endsection


