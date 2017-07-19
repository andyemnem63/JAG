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
{{--Display Polls Topic--}}
    @foreach($allPolls as $polls)
        @if($polls->id == $pollId)
             <h2>Poll: {{$polls->poll_message}}</h2>
        @endif
    @endforeach

    @foreach($allPolls as $polls)
        @if($polls->id == $pollId)
            <h3>Poll ID: {{$polls->id}}</h3>
        @endif
    @endforeach

    @foreach($pollResults as $results)
        @if($currentUserId == $results->user_id && $results->poll_id == $pollId)
            <h1>You Voted </h1>
        @endif
    @endforeach

{{--Submit yes/no for poll--}}
    <form action="/days/{{$trip_id}}/{{$pollId}}/results" method="post">
        {{csrf_field()}}
        <input type="radio" name="result" value="yes">Yes<br>
        <input type="radio" name="result" value="no">No<br>
        <button type="submit" class="btn btn-primary">Done</button>
    </form>
@endsection


