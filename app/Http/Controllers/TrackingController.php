<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function __invoke(Request $request)
    {
        $id = tracking_to_id($request->get('id'));

        $applicant = Applicant::with('scholar', 'remarks.user')->find($id);

        return view('apply.track', [
            'applicant' => $applicant
        ]);
    }
}
