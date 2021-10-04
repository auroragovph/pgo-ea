<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use Illuminate\Http\Request;

class ScholarController extends Controller
{
    public function index()
    {
        $scholars = Scholar::with('applicant')->get();

        return view('scholar.index', [
            'scholars' => $scholars
        ]);
    }
}
