@extends('layouts.account-layout')

@section('content')

    <div class="container">
        <div class="row">
            {{--Account Page Options--}}
            <div class="col-sm-2">
                <ul>
                    <li class="account-tile-title">
                        <img src="{{ Auth::user()->avatar }}" alt="Facebook Avatar"
                             class="img-circle fb-profilepic"><strong>&nbsp;&nbsp;Your Account</strong></li>
                    <li class="account-tile"><span class="fa fa-map-marker tile-icon"></span><strong>Trips</strong></li>
                    <li class="account-tile"><span class="fa fa-user-circle-o tile-icon"></span><strong>Profile</strong>
                    </li>
                    <li class="account-tile"><span class="fa fa-unlock-alt tile-icon"></span><strong>Password</strong>
                    </li>
                </ul>
            </div>
            {{--Trips Panel--}}
            <div class="col-sm-10">
                <div class="panel panel-default account-trips">
                    <div class="panel-body">
                        <h1>Your Trips</h1>
                        {{--Creates New Trip--}}
                        <form action="{{route('account.store')}}" method="post" role="form" style="margin-bottom: 20px;">
                            {{csrf_field()}}
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-9 input-group-lg">
                                        <input type="text" class="form-control" name="name" placeholder="Trip Name"
                                               required>
                                    </div>
                                    <div class="col-sm-2 input-group-lg">
                                        <button type="submit" class="btn btn-lg btn-primary"><strong><i
                                                        class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Create New Trip&nbsp;&nbsp;</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{--Trips--}}
                        @foreach($allInvites as $invites)
                            {{--If the Current user id is equal to the user id .....--}}
                            @if($currentUserId == $invites->user_id)
                                <div class="row">
                                    <hr style="margin: 0 -15px;">
                                    <div class="col-sm-6" style="margin: 15px 0;">
                                        <h4><strong>{{$invites->trip_name}}</strong></h4>
                                    </div>
                                    <div class="col-sm-6 text-right" style="margin: 15px 0;">
                                        <form action="/account/{{$invites->invite_id}}" method="post" role="form"
                                              style="display:inline; margin-right: 10px">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-default"><strong>Cancel</strong></button>
                                        </form>

                                        <a href="/days/{{$invites->invite_id}}">
                                            <button class="btn btn-primary" style="display:inline"><strong>View <i
                                                            class="glyphicon glyphicon-chevron-right"></i></strong>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


