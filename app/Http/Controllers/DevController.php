<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class DevController extends Controller
{
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
