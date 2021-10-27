<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Service\PDF;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Mail\Application\Approved;
use mikehaertl\pdftk\Pdf as Pdftk;
use Illuminate\Support\Facades\Mail;


class DevController extends Controller
{

    public function pdf()
    {
        $applicant = Applicant::find(2);

        $pdf = new PDF($applicant);
        $result = $pdf->raw();

        dd($result);

    }

    public function email()
    {
        $applicant = Applicant::with('scholar', 'remarks')->find(2);
        
        Mail::to('jp.pagapulan@gmail.com')->queue(new Approved($applicant));

        // return view('emails.application.approved');
    }

    public function school3()
    {

    }

    public function school()
    {
        $school = "%".strtolower('MCC')."%";
        $applicants =$applicants = Applicant::whereRaw('LOWER(school->"$.name") like ?', $school)
                                    ->whereNotIn('school->address', ['BALER, AURORA'])->get();
                                    // ->get();


        foreach($applicants as $applicant){


            // $applicant->update([
            //     'school->name' => 'Mount Carmel College of Baler - (MCC)',
            //     'school->address' => 'BALER, AURORA'
            // ]);


        }

        return view('dev', ['applicants' => $applicants]);
    }

    public function reds()
    {
        $applicants = Applicant::get();

        foreach($applicants->groupBy('name') as $groups){
            if($groups->count() !== 1){
                // removing the last item
                $groups->pop();
                $reds = collect($groups->all());
                $red_ids = $reds->pluck('id');
                // deleting the applicant
                $del = Applicant::whereIn('id', $red_ids)->delete();
            }
            continue;
        }


        echo 'Success';
    }
}
