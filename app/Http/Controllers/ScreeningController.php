<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Scholar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\Scholar\DT;
use App\Exports\Applicant\ScholarExport;

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

        if(request()->get('export') == true){
            return $this->_export((int)request()->type);
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
            'heading' => ['#', 'Name', 'Municipality', 'Brgy.', 'School', 'Action'],
            'data'    => $datas,
        ];

    }

    public function _export($status)
    {
        $status_label = config('lists.status')[$status] ?? false;
        abort_if(!$status_label, 404);
        $label = Str::of($status_label)->kebab();
        return Excel::download(new ScholarExport($status), 'scholars-'.$label.'.xlsx');
    }
}
