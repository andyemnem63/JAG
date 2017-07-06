<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\User;
use App\Invite;
use App\Trip;
use Auth;


class InvitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers = User::all();
        return view('pages.invite', ['allUsers' => $allUsers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $userId = DB::select('select ID FROM users WHERE name=?', [$name]);

        $inviteTable = new Invite;
        $inviteTable->invite_id = $request->id;
        $inviteTable->user_id = $userId[0]->ID;
        $inviteTable->name = $request->name;
        $inviteTable->trip_name = $request->tripName;
        $inviteTable->save();

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tripName = DB::select('select NAME FROM trips WHERE id=?', [$id]);
        $allUsers = User::all();
        $allInvites = Invite::all();

        return view('pages.invite', ['allUsers' => $allUsers])->with(['tripId' => $id])->with(['allInvites' => $allInvites])->with                      (['tripName' => $tripName[0]->NAME]);
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
