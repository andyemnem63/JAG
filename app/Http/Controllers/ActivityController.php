<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Act;

class ActivityController extends Controller
{
    public function post(Request $request)
    {
        $activityTable = new Act;
        $activityTable->activity_name= $request->activity_name;
        $activityTable->url= $request->url;
        $activityTable->imgUrl= $request->imgUrl;
        $activityTable->address = $request->address;
        $activityTable->save();

       return redirect('/days');

    }

}
