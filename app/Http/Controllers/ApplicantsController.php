<?php

namespace App\Http\Controllers;

use App\Service\PDF;
use App\Models\Remark;
use App\Models\Scholar;
use App\Models\Applicant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\Application\Approved;
use App\Http\Resources\Applicant\DT;
use App\Mail\Application\Disapproved;
use Illuminate\Support\Facades\Mail;

class ApplicantsController extends Controller
{
    
    public function index()
    {

        if (request()->ajax()) {
            return response()->json($this->_dt());
        }

        return view('applicant.index');
    }

    public function show($id)
    {
        $applicant = Applicant::with('scholar', 'remarks')->find($id);

        return view('applicant.show', [
            'applicant' => $applicant
        ]);
    }


    public function assess(Request $request, $id)
    {
        $applicant = Applicant::with('scholar')->find($id);

        if($applicant->scholar == null){
            $scholar = Scholar::create([
                'applicant_id' => $applicant->id,
                'status' => $request->post('status')
            ]);
        } else {
            $applicant->scholar()->update([
                'status' => $request->post('status')
            ]);
        }

        // sending emails
        switch($request->post('status')){
            case 4: //APPROVED
                $class_type = new Approved($applicant);
                break;
            case 3: //DISAPPROVED
                $class_type = new Disapproved($applicant);
                break;
            default: 
                $class_type = null; 
                break;
        }

        // sending email
        if($class_type !== null){

            if(!isset($applicant->props['email'])){
                $applicant->update([
                    'props->email' => Str::uuid()->toString(),
                    'props->email_send_at' => now()
                ]);
            }

            Mail::to($applicant->personal['email_address'])->send($class_type);
        }

        $remark = Remark::create([
            'applicant_id' => $applicant->id,
            'remark' => $request->post('remarks'),
            'status' => $request->post('status'),
            'user_id' => auth()->user()->id
        ]);


        return response()->json([
            'message'  => "Remark has been added.",
            'intended' => route('applicant.show', $id)
        ], 200);
    }

    public function _dt()
    {
        $applicants = Applicant::doesntHave('scholar')->get();

        $datas   = DT::collection($applicants);

        return [
            'heading' => ['#', 'Name', 'Municipality','Brgy.', 'School', 'Action'],
            'data'    => $datas,
        ];

    }

    public function print($id)
    {
        $applicant = Applicant::with('scholar', 'remarks')->findOrFail($id);
        $pdf = new PDF($applicant);
        $result = $pdf->send();
    }

    



}
