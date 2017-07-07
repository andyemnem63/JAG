@extends('layouts.dashboardLayout')

    @section('content')
   {{--Search for user that exist--}}
       <form action="{{route('invite.store')}}" method="post" role="form">
           <div class="form-group">
               {{csrf_field()}}
               <label for="">Invite</label>
               <input type="text" class="form-control" name="name">
               <input type="hidden" name="id" value="{{$tripId}}">
               <input type="hidden" name="tripName" value="{{$tripName}}">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>

    {{--Display All users--}}
       <h1>ALL Users</h1>
       @foreach($allUsers as $users)
            <h2 class="hide">{{$users->name}}</h2>
            <hr><br>
       @endforeach
       <hr>

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

