<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateApplicantFormRequest;
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

        if(request()->has('edit') && request()->get('edit') == true){
            return view('applicant.edit', compact('applicant'));
        }

        return view('applicant.show', [
            'applicant' => $applicant
        ]);
    }

    public function update(UpdateApplicantFormRequest $request, $id)
    {
        $applicant = Applicant::findOrFail($id);

        // check if the name already exists in the applicants

        $name = [
            'first'  => $request->post("first_name"),
            'last'   => $request->post("last_name"),
            'middle' => $request->post("middle_name"),
        ];

        $personal = [
            'civil_status'   => $request->post("civil_status"),
            'birthday'       => $request->post("birthday"),
            'birthplace'     => $request->post("birthplace"),
            'sex'            => $request->post("sex"),

            "address"        => [
                "present"   => $request->post("present_address"),
                "permanent" => $request->post("permanent_address"),
            ],

            'contact_number' => $request->post("contact_number"),
            'email_address'  => $request->post("email_address"),
        ];

        $school = [
            "name"       => $request->post("school_name"),
            "address"    => $request->post("school_address"),
            "year_level" => $request->post("school_year"),
            "gwa"        => $request->post("school_gwa"),
        ];

        $family = [
            'father'  => [
                "name"           => $request->post("father_name"),
                "occupation"     => $request->post("father_occupation"),
                "address"        => $request->post("father_address"),
                "contact_number" => $request->post("father_contact"),
                "employer"       => $request->post("father_employer"),
            ],

            'mother'  => [
                "name"           => $request->post("mother_name"),
                "occupation"     => $request->post("mother_occupation"),
                "address"        => $request->post("mother_address"),
                "contact_number" => $request->post("mother_contact"),
                "employer"       => $request->post("mother_employer"),
            ],

            'assets'  => $request->post("family_assets"),
            'member'  => $request->post("family_number"),
            'income'  => $request->post("family_income"),
            'living'  => $request->post("family_living"),
            'sibling' => $request->post("family_sibling"),
            'sponsor' => $request->post("family_sponsor"),
        ];

        $other = [
            "working" => $request->post("other_working"),

            "apply"   => [
                "sem"   => $request->post("other_apply_sem"),
                "where" => $request->post("other_apply_where"),
            ],
            "ol"      => [
                "own"      => $request->post("other_ol_own"),
                "type"     => $request->post("other_ol_type"),
                "internet" => $request->post("other_ol_internet"),
            ],
        ];

        $applicant->update([
            'name'     => $name,
            'personal' => $personal,
            'school'   => $school,
            'family'   => $family,
            'other'    => $other,
        ]);

        return response()->json([
            'message'  => "Applicant has been updated.", 
            'intended' => route('applicant.show', $applicant->id)
        ], 200);
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
