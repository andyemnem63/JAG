<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Days;
use App\NewPoll;
use App\PollResults;
use App\Invite;
use Auth;
use Illuminate\Validation\Rules\In;

class DaysController extends Controller
{

    public function store(Request $request)
    {
        $newDays = new Days;
        $newDays->day_id = $request->id;
        $newDays->save();

        return back()->withInput();
    }

//$id is the invite_id in invite Table which comes from account.blade
    public function show($id)
    {
        $totalUsers = 0;
        $usersVoted = 0;
        $inviteTable = Invite::all();
        $currentUser = Auth::user()->name;
        $allPolls = NewPoll::all();
        $pollResults = PollResults::all();
        $allDays = Days::all();
//    Show total amount of users
        foreach($inviteTable as $invite) {
            if($invite->invite_id == $id) {
                $totalUsers+= 1;
            }
        }
//    Show Users that voted
        foreach ($pollResults as $results) {
            if($results->invite_id == $id)
                $usersVoted+= 1;
        }
        return view('pages.days', ['trip_id' => $id])
                        ->with(['allDays' => $allDays])
                        ->with(['allPolls' => $allPolls])
                        ->with(['currentUser' => $currentUser])
                        ->with(['totalUsers' => $totalUsers])
                        ->with(['usersVoted' => $usersVoted]);
    }
}
