<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {

        return Socialite::driver('facebook')->redirect();


    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {


        /** @var \Laravel\Socialite\Two\User $userSocial */
        $userSocial = Socialite::driver('facebook')->user();

        /** @var \App\User $findUser */
        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser) {

            Auth::login($findUser);

            //TODO fixme to use routes ;-)
     return redirect(route('account.index'));


        } else {

            /* return $user->name;*/

            /** @var \App\User $user */
            $user = new User;
            $user->name = $userSocial->name;

            $user->email = $userSocial->email;

            $user->password = bcrypt(123456);

            $user->avatar = $userSocial->avatar;


            $user->save();

            Auth::login($user);

            return redirect ('/account');

        }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
