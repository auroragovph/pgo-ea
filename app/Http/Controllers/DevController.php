<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Service\PDF;
use App\Models\Scholar;
use App\Models\Applicant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\Application\Approved;
use mikehaertl\pdftk\Pdf as Pdftk;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\Application\Disapproved;
use App\Exports\Scholar\ApprovedExport;
use App\Exports\Applicant\ScholarExport;
use App\Models\Remark;
use App\Service\Generate;

class DevController extends Controller
{
    public function __invoke()
    {
        $this->generate_pdf();
    }

    private function generate_pdf()
    {
        return new Generate();
    }

    public function disapproved()
    {
        $applicants = Applicant::doesntHave('scholar')->get();

        $scholars = array();
        $remarks = array();

        $current_user = auth()->user()->id;

        foreach($applicants as $applicant){

            $scholars[] = array(
                'applicant_id' => $applicant->id,
                'status' => 3
            );

            $remarks[] = array(
                'applicant_id' => $applicant->id,
                'remark' => 'Unsuccessful application due to limited slots available. Please check email for more information.',
                'status' => 3,
                'user_id' => $current_user
            );

        }

        Scholar::insert($scholars);
        Remark::insert($remarks);
    }

    public function excel()
    {
        dd(config('lists.status')[1] ?? false);
        // return Excel::download(new ScholarExport(3), 'scholars.xlsx');
    }

    public function pdf()
    {
        $applicant = Applicant::find(2);

        $pdf = new PDF($applicant);
        $result = $pdf->raw();

        dd($result);

    }

    public function app()
    {
        $applicant = Applicant::where('props->email', '221e5aeb-c51a-41e0-85d6-dc98e2a0012d')->firstorFail();

        // dd($applicant);

        return view('emails.application.approved', compact('applicant'));
    }

    public function email()
    {
        $applicant = Applicant::with('scholar', 'remarks')->find(2);

        if(!isset($applicant->props['email'])){
            $applicant->update([
                'props->email' => Str::uuid()->toString()
            ]);
        }

        Mail::to('jp.pagapulan@gmail.com')->send(new Approved($applicant));

        // return view('emails.application.disapproved', compact('applicant'));
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

    public function send_email_to_approved()
    {
        $scholars = Scholar::with('applicant')->where('status', 4)->get();

        $now = now();


        foreach($scholars as $scholar){
            $applicant = $scholar->applicant;

            if(!isset($applicant->props['email'])){
                $applicant->update([
                    'props->email' => Str::uuid()->toString(),
                    'props->email_send_at' => $now
                ]);
            }
            Mail::to($applicant->personal['email_address'])->queue(new Approved($applicant));
        }
    }

    public function send_email_to_disapproved()
    {
        $applicants = Applicant::doesntHave('scholar')->get();
        $now = now();

        foreach($applicants as $applicant){
            Mail::to($applicant->personal['email_address'])->queue(new Disapproved($applicant));
        }
    }
}
