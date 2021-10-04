<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Scholar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $applicants = Applicant::doesntHave('scholar')->count();
        $scholars = Scholar::count();

        return view('dashboard', [
            'applicants' => $applicants,
            'scholars' => $scholars
        ]);
    }
}
