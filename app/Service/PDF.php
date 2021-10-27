<?php 

namespace App\Service;

use Carbon\Carbon;
use App\Models\Applicant;
use mikehaertl\pdftk\Pdf as Pdftk;


class PDF {

    public $pdf;
    public $applicant;

    public function __construct(Applicant $applicant)
    {
        $this->pdf = new Pdftk(base_path('pdf/form.pdf'));
        $this->applicant = $applicant;
        $this->fill();
    }

    public function fill()
    {
        $applicant = $this->applicant;

        return $this->pdf->fillForm([
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
        ])->needAppearances()->flatten();
    }

    public function send($name = null)
    {
        return $this->pdf->send($name);
    }

    public function raw()
    {
        return $this->pdf->getTmpFile()->getFileName();
        // return file_get_contents( (string) $this->pdf->getTmpFile() );
    }
}