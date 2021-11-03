<?php

namespace App\Exports\Scholar;

use App\Models\Scholar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ApprovedExport implements FromView
{
    public function view(): View
    {
        $scholars = Scholar::with('applicant')->where('status', 4)->get();
        return view('export.approved', compact('scholars'));
    }
}
