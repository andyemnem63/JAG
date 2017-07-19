<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewPoll;
class PollsController extends Controller
{
//Goes to Polls Page
    public function index($tripId, $pollId)
    {
        dd($pollId);
    }

    public function create()
    {
        //
    }
//Post New Poll to database
    public function store(Request $request)
    {
        $newPoll = new NewPoll;
        $newPoll->poll_message = $request->createPoll;
        $newPoll->save();

        return back()->withInput();
    }


    public function show($id)
    {

    }

}
