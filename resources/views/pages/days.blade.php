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

{{--Create a counter variable to show the day number--}}
    <?php $dayCount = 1; ?>
    @for($i=0; $i < count($allDays); $i++)
        @if($allDays[$i]->day_id== $trip_id)
            <h3>Day {{$dayCount++}}</h3>
            <hr><br>
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


