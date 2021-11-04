<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use Illuminate\Http\Request;
use App\Http\Resources\Scholar\DT;

class ScholarController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return response()->json($this->_dt());
        }

        return view('scholar.index');
    }

    public function _dt()
    {
        $scholars = Scholar::with('applicant')->get();

        $datas   = DT::collection($scholars);

        return [
            'heading' => ['#', 'Name', 'Municipality', 'Brgy.', 'School', 'Action'],
            'data'    => $datas,
        ];

    }
}
