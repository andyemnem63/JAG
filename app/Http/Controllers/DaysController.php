<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Days;

class DaysController extends Controller
{

    public function index()
    {
        return view('pages.days');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $newDays = new Days;
        $newDays->day_id = $request->id;
        $newDays->save();

//        return redirect()->route('days',[$request->id]);
        return back()->withInput();
    }

    public function show($id)
    {
        $allDays = Days::all();
        return view('pages.days', ['trip_id' => $id])->with(['allDays' => $allDays]);
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
