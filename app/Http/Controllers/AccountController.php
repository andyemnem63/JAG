<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Trip;
use App\Invite;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class AccountController extends Controller
{

    public function index()
    {
    //Grabs All Data from INVITE and Trips table, Also grabs Current users Id
        $allInvites = Invite::all();
        $currentUserId = Auth::id();
        $allTrips = Trip::all();

        return view('pages.account', ['allTrips' => $allTrips])
                    ->with(['currentUserId' => $currentUserId])
                    ->with(['allInvites' => $allInvites]);

    }

//Store to trip table and Invites Table
    public function store(Request $request)
    {
        $userId = Auth::id();
        $currentUserName = Auth::user()->name;
    //Adds to database
        $newTrip = new trip;
        $newTrip->name = $request->name;
        $newTrip->trip_id = $userId;
        $newTrip->save();
    //Gets Most Recent Id from trips table
        $tripId = DB::select('SELECT id FROM trips ORDER BY id DESC LIMIT 1');
    //Adds To Database
        $inviteTable = new Invite;
        $inviteTable->name = $currentUserName;
        $inviteTable->user_id = $userId;
        $inviteTable->trip_name = $request->name;
        $inviteTable->invite_id = $tripId[0]->id;
        $inviteTable->save();

        return redirect()->route('account.index');
    }

//Deletes trips from Trips table and Invites Table
    public function destroy($id)
    {
    // Deletes from the trips table
       Db::delete("DELETE FROM trips WHERE id = $id");
       Db::delete("DELETE FROM invites WHERE invite_id = $id");

        return redirect('account');
    }
}
