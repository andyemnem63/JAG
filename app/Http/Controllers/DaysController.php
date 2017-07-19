<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Days;
use App\NewPoll;

class DaysController extends Controller
{

    public function index()
    {
        return view('pages.days');
    }

    public function create()
    {

    }

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
        $allPolls = NewPoll::all();
        $allDays = Days::all();
        return view('pages.days', ['trip_id' => $id])
                        ->with(['allDays' => $allDays])
                        ->with(['allPolls' => $allPolls]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
