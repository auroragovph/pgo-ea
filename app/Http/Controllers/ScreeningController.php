<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use Illuminate\Http\Request;
use App\Http\Resources\Scholar\DT;

class ScreeningController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $type)
    {
        if (request()->ajax()) {
            return response()->json($this->_dt($type));
        }

        return view('screening.index', [
            'status' => $type
        ]);
    }

    public function _dt($type)
    {
        $scholars = Scholar::with('applicant')->where('status', $type)->get();

        $datas   = DT::collection($scholars);

        return [
            'heading' => ['#', 'Name', 'Address', 'School', 'Action'],
            'data'    => $datas,
        ];

    }
}
