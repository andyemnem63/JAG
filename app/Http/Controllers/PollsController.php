<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewPoll;
use App\PollResults;
use App\Days;
use Auth;
use Illuminate\Support\Facades\DB;


class PollsController extends Controller
{
//Goes to Polls Page
    public function index($tripId, $pollId)
    {
        $allPolls = NewPoll::all();
        $allDays = Days::all();
        $pollResults = PollResults::all();
        $currentUserId = Auth::id();
        $currentUser = Auth::user()->name;
        return view('pages.pollResults', ['trip_id' => $tripId])
                    ->with(['allDays' => $allDays])
                    ->with(['allPolls' => $allPolls])
                    ->with(['pollId' => $pollId])
                    ->with(['currentUserId' => $currentUserId])
                    ->with(['pollResults' => $pollResults])
                    ->with(['currentUser' => $currentUser]);
    }

//Post New Poll to database
    public function store(Request $request)
    {
        $newPoll = new NewPoll;
        $newPoll->poll_message = $request->createPoll;
        $newPoll->invite_id = $request->id;
        $newPoll->save();

        return back()->withInput();
    }


    public function resultsPost(Request $request, $tripId, $pollId)
    {
        $currentUserId = Auth::id();

    //Gets Poll Yes/No poll results
        $pollResults = $request->result;
        if ($pollResults === 'yes') {
            $resultsTable = new PollResults;
            $resultsTable->results = 1;
            $resultsTable->user_id = $currentUserId;
            $resultsTable->poll_id = $pollId;
            $resultsTable->invite_id = $tripId;
            $resultsTable->save();


            return back()->withInput();
        }
        else {
            $resultsTable = new PollResults;
            $resultsTable->results = 0;
            $resultsTable->user_id = $currentUserId;
            $resultsTable->poll_id = $pollId;
            $resultsTable->invite_id = $tripId;
            $resultsTable->save();

            return back()->withInput();
        }
    }

}
