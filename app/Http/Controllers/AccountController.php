<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Trip;
use App\Invite;
use Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $tripId = Trip::all()->last()[0];
//        dd($tripId);

        $allInvites = Invite::all();
        $currentUserId = Auth::id();
        $allTrips = Trip::all();

        return view('pages.account', ['allTrips' => $allTrips])->with(['currentUserId' => $currentUserId])->with(['allInvites' => $allInvites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
//Store to trip table
    public function store(Request $request)
    {
        $userId = Auth::id();
        $currentUserName = Auth::user()->name;
//        $tripId = Trip::all()->first()->id;


        $newTrip = new trip;
        $newTrip->name = $request->name;
        $newTrip->trip_id = $userId;
        $newTrip->save();

        $tripId = DB::select('SELECT id FROM trips ORDER BY id DESC LIMIT 1');

        $inviteTable = new Invite;
        $inviteTable->name = $currentUserName;
        $inviteTable->user_id = $userId;
        $inviteTable->trip_name = $request->name;
        $inviteTable->invite_id = $tripId[0]->id;
        $inviteTable->save();


        return redirect()->route('account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
