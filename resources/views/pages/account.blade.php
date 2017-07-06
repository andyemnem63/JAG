{{--Goes to acctLayout in the layouts folder--}}
@extends('layouts.accountLayout')

@section('content')
{{--Creates New Trip--}}
    <form action="{{route('account.store')}}" method="post" role="form">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Create New Trip">
        </div>
        <button type="submit" class="btn btn-primary">Create New Trip</button>
    </form>

    <a href="/invite"></a>

    {{--<div class="allTrips">--}}
        {{--<h1>Shows All the trips</h1>--}}
        {{--@foreach($allTrips as $trips)--}}
            {{--@if($trips->trip_id == $currentUserId)--}}
                {{--<a href="/invite/{{$trips->id}}">{{$trips->name}}</a>--}}
                {{--<br><hr>--}}
            {{--@endif--}}
        {{--@endforeach--}}
    {{--</div>--}}

    <div class="testTrips">
        <h1>Test Trips</h1>
            @foreach($allInvites as $invites)
                @if($currentUserId == $invites->user_id)
                    <a href="/invite/{{$invites->invite_id}}">{{$invites->trip_name}}</a>
                @endif
            @endforeach
    </div>


    {{--<div class="poll">--}}
        {{--<a href="/Polls/{{$id}}" class="btn btn-success">YES</a>--}}
        {{--<button id="no" class="btn btn-danger">No</button>--}}
    {{--</div>--}}
@endsection


