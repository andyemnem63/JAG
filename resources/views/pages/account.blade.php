@extends('layouts.account-layout')

@section('content')

    <div class="container">
        <div class="row">
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
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div style="padding:0 50px;">

                        <h1>Your Trips</h1>
                        {{--Creates New Trip--}}
                        <form action="{{route('account.store')}}" method="post" role="form">
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
                        </di                                                                                                                                                                                                                         v>


                        {{--Trips--}}
                        <div class="trips">
                            <div class="row">
                                @foreach($allInvites as $invites)
                                    {{--If the Current user id is equal to the user id .....--}}
                                    @if($currentUserId == $invites->user_id)
                                        <hr>
                                        <div class="col-sm-6">
                                            {{--Display trips that links to Uri with their invite id--}}
                                            <h4 style="display: inline"><strong>{{$invites->trip_name}}</strong></h4>
                                        </div>
                                        <div class="col-sm-6 text-right">

                                            {{--<span class="pull-right" style="position: relative; bottom: 7px;">--}}
                                            {{--<span class="" style="">--}}

                                            {{--Delete Trip--}}
                                            <form action="/account/{{$invites->invite_id}}" method="post" role="form"
                                                  style="position: relative; bottom: 7px;">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-default"><strong>Cancel</strong></button>
                                            </form>

                                            {{--Goes to days page--}}
                                            <a href="/days/{{$invites->invite_id}}">
                                                <button class="btn btn-primary"><strong>View <i
                                                                class="glyphicon glyphicon-chevron-right"></i></strong>
                                                </button>
                                            </a>
                                        </div>

                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


