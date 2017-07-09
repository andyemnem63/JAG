{{--@extends('layouts.dashboardLayout')--}}
@extends('layouts.appdash')


{{--@section('content')--}}
@section('rightcontent')

   {{--Search for user that exist--}}
       <form action="{{route('invite.store')}}" method="post" role="form">
           <div class="form-group">
               {{csrf_field()}}
               <label for="">Invite</label>
               <input type="text" id="myInput" onkeyup="userSearch()" name="name">
               <input type="hidden" name="id" value="{{$tripId}}">
               <input type="hidden" name="tripName" value="{{$tripName}}">
           <button type="submit" class="btn btn-primary">Submit</button>
           </div>
       </form>

       <a href="/days/{{$tripId}}">Link to Days</a>

    {{--Display All users--}}
           <ul id="userList">
               @foreach($allUsers as $users)
                 <li style="display: none">
                     <a>{{$users->name}}</a>
                 </li>
                <hr><br>
               @endforeach
           </ul>

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

