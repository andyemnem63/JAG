@extends('layouts.dashboardLayout')

    @section('content')
       {{--Search--}}
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
       <h1>ALL Users</h1>
       @foreach($allUsers as $users)
            {{$users->name}}
            <hr><br>
       @endforeach
       <hr>
       <div class="usersGoing">
            <h1>Users Going </h1>
            @foreach($allInvites as $invites)
               @if($invites->invite_id == $tripId)
                   {{$invites->name}}
                   <br>
                   <hr>
               @endif
            @endforeach
       </div>

    @endsection

