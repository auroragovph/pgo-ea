<?php

namespace App\Exports\Applicant;

use App\Models\Scholar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ScholarExport implements FromView
{
    public function __construct(
        public int $status
    ){}
    
    public function view(): View
    {
        $lists = $this->lists($this->status);
        return view('export.applicant.scholars', compact('lists'));
    }

    public function lists($status)
    {
        $scholars = Scholar::where('status', $status)->get();

        $lists = collect();

        foreach($scholars as $scholar){
            $applicant = $scholar->applicant;
            $address = explode(' - ', $applicant->personal['address']['present']);

            $lists->push(array(
                "tn" => $applicant->id,
                "name" => $applicant->full_name,
                "mun" => $address[1],
                "brgy" => $address[0],
                "school" => $applicant->school['address'],
                "contact" => $applicant->personal['contact_number']
            ));

        }

        return $grouped = $lists->sortBy('name')->groupBy('mun');
    }
}
