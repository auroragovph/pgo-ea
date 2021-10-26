<?php

namespace App\Http\Controllers;

use App\Models\f;
use App\Models\Remark;
use App\Models\Scholar;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Resources\Applicant\DT;
use Carbon\Carbon;
use mikehaertl\pdftk\Pdf;

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
                'period' => [
                    'start' => $request->post('period_start'),
                    'end' => $request->post('period_end'),
                ],
                'amount' => $request->post('amount'),
                'status' => $request->post('status')
            ]);

        } else {
            $applicant->scholar()->update([
                'status' => $request->post('status')
            ]);
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
            'heading' => ['#', 'Name', 'Address', 'School', 'Action'],
            'data'    => $datas,
        ];

    }

    public function print($id)
    {
        $applicant = Applicant::with('scholar', 'remarks')->findOrFail($id);

        $pdf = new Pdf(base_path('pdf/form.pdf'));

        $pdf->fillForm([
            'tracking' => $applicant->tracking_number,

            'personal_lastName' => $applicant->name['last'] ?? '',
            'personal_firstName' => $applicant->name['first'] ?? '',
            'personal_middleName' => $applicant->name['middle'][0] ?? '',

            'personal_birthday' => $applicant->personal['birthday'] ?? '',
            'personal_age' => Carbon::parse($applicant->personal['birthday'])->age,
            'personal_sex' => $applicant->personal['sex'] ?? '',
            'personal_civilStatus' => $applicant->personal['civil_status'] ?? '',
            'personal_presentAddress' => $applicant->personal['address']['present'] ?? '',
            'personal_permanentAddress' => $applicant->personal['address']['permanent'] ?? '',
            'personal_contact' => $applicant->personal['contact_number'] ?? '',
            'personal_email' => $applicant->personal['email_address'] ?? '',


            'school_name' => $applicant->school['name'] ?? '',
            'school_address' => $applicant->school['address'] ?? '',
            'school_gwa' => $applicant->school['gwa'] ?? '',
            'school_year' => $applicant->school['year_level'] ?? '',


            'family_fatherName' => $applicant->family['father']['name'] ?? '',
            'family_fatherAddress' => $applicant->family['father']['address'] ?? '',
            'family_fatherContact' => $applicant->family['father']['contact_number'] ?? '',
            'family_fatherOccupation' => $applicant->family['father']['occupation'] ?? '',
            'family_fatherEmployer' => $applicant->family['father']['employer'] ?? '',

            'family_motherName' => $applicant->family['mother']['name'] ?? '',
            'family_motherAddress' => $applicant->family['mother']['address'] ?? '',
            'family_motherContact' => $applicant->family['mother']['contact_number'] ?? '',
            'family_motherOccupation' => $applicant->family['mother']['occupation'] ?? '',
            'family_motherEmployer' => $applicant->family['mother']['employer'] ?? '',

            'family_income' => $applicant->family['income'],
            'family_member' => $applicant->family['member'],
            'family_asset' => $applicant->family['assets'],
            'family_include' => $applicant->family['living'],
            'family_sibling' => $applicant->family['sibling'],
            'family_sponsor' => $applicant->family['sponsor'],

            'other_gadget' => $applicant->other['ol']['own']." | ".$applicant->other['ol']['type']." | ".$applicant->other['ol']['internet'],
            'other_apply1' => $applicant->other['apply']['sem'],
            'other_apply2' => $applicant->other['apply']['where'],
            'other_working' => $applicant->other['working'],

            'other_signature' => strtoupper(name($applicant->name)),

            'application_date' => $applicant->created_at->format('F d, Y')





            


        ]);


        $result = $pdf->needAppearances()->flatten()->send();

    }

    



}
