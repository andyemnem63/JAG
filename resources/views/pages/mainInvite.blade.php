{{--@extends('layouts.dashboardLayout')--}}
@extends('layouts.appdash')


{{--@section('content')--}}
@section('leftcontent')
    <h1>Invite</h1>
    {{--Search for user that exist--}}
    <form action="{{route('invite.store')}}" method="post" role="form">
        <div class="form-group">
            {{csrf_field()}}
            <label for="">Invite</label>
            <input type="text" name="name" id="myInput" onkeyup="userSearch()">
            <input type="hidden" name="id" value="{{$tripId}}">
            <input type="hidden" name="tripName" value="{{$tripName}}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    {{--Display All users--}}
    <ul id="userList">
        @foreach($allUsers as $users)
            <li style="display: none">
                <a>{{$users->name}}</a>
            </li>
            <hr><br>
        @endforeach
    </ul>
@endsection

@section('rightcontent')

    {{--Display users that are going--}}
    <div class="usersGoing">
        <h1>Users Going</h1>
        @foreach($allInvites as $invites)
        {{--If Invite Id == Trip Id--}}
            @if($invites->invite_id == $tripId)
                {{$invites->name}}
                <br>
                <hr>
            @endif
        @endforeach
    </div>

@endsection

