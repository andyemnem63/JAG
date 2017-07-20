@extends('layouts.splash-layout')


@section('content')

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Your Email</label>

                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">
                                    <strong>Sign In</strong>
                                </button>
                                <a class="btn btn-block btn-default" href="{{ route('password.request') }}">
                                    <strong>Forgot Password?</strong>
                                </a>
                                <br>
                                    <div class="text-center">
                                        <h6g>OR SIGN IN WITH</h6g>
                                    </div>
                                <br>
                                <a class="btn btn-block btn-facebook" href="{{ url('login/facebook') }}" id="btn-fblogin">
                                    <strong><i class="fa fa-facebook"></i>&nbsp;&nbsp;Facebook</strong>
                                </a>
                                <br>
                                <div class="text-center">
                                    <a href="{{ route('register') }}"><strong>
                                            No Account? Sign Up for trvlrs
                                        </strong>
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
