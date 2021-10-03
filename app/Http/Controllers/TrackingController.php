<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function __invoke(Request $request)
    {
        $id = $request->get('id');

        return view('apply.track');
    }
}
