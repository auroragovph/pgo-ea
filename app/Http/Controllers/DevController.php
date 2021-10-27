<?php

namespace App\Http\Controllers;

use App\Mail\Application\Approved;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DevController extends Controller
{
    public function email()
    {
        $applicant = Applicant::with('scholar', 'remarks')->find(2);
        
        Mail::to('jp.pagapulan@gmail.com')->send(new Approved($applicant));

        // return view('emails.application.approved');
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
