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


    {{--Trips--}}
    <div class="trips">
        <h1>Test Trips</h1>
            @foreach($allInvites as $invites)
            {{--If the Current user id is equal to the user id .....--}}
                @if($currentUserId == $invites->user_id)
                {{--Display trips that links to Uri with their invite id--}}
                    <a href="/days/{{$invites->invite_id}}">{{$invites->trip_name}}</a>
                    <br>
                    <hr>
                @endif
            @endforeach
    </div>

@endsection


