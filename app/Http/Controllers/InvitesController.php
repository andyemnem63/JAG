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

    public function index()
    {
        $allUsers = User::all();
        return view('pages.invite', ['allUsers' => $allUsers]);
    }

    public function create()
    {

    }

//Stores to Invite table
    public function store(Request $request)
    {
        $name = $request->name;
    //Gets Id from Users table based on Users input on form
        $userId = DB::select('select ID FROM users WHERE name=?', [$name]);

        $inviteTable = new Invite;
        $inviteTable->invite_id = $request->id;
        $inviteTable->user_id = $userId[0]->ID;
        $inviteTable->name = $request->name;
        $inviteTable->trip_name = $request->tripName;
        $inviteTable->save();

        return back()->withInput();
    }

    public function show($id)
    {
    //Get name from trips based on URI
        $tripName = DB::select('select NAME FROM trips WHERE id=?', [$id]);
        $allUsers = User::all();
        $allInvites = Invite::all();

        return view('pages.invite', ['allUsers' => $allUsers])->with(['tripId' => $id])->with(['allInvites' => $allInvites])->with                      (['tripName' => $tripName[0]->NAME]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
