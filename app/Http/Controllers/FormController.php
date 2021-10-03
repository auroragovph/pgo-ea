<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormApplicationRequest;
use App\Models\Applicant;

class FormController extends Controller
{
    public function index()
    {
        return view('apply.form');
    }

    public function submit(FormApplicationRequest $request)
    {

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
            "address"    => $request->post("school_name"),
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

        $applicant = Applicant::create([
            'name'     => $name,
            'personal' => $personal,
            'school'   => $school,
            'family'   => $family,
            'other'    => $other,
        ]);

        if(auth()->check()){
            $intended = route('apply.form');
        }else{
            $intended = route('homepage');
        }

        return response()->json([
            'message'  => "Your application has been recorded. Your tracking number is: " . generate_tracking_number($applicant->id),
            'intended' => $intended,
        ], 200);
    }
}
