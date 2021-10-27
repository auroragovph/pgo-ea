<?php

namespace App\Mail\Application;

use App\Service\PDF;
use App\Models\Applicant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Approved extends Mailable
{
    use Queueable, SerializesModels;


    public $applicant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Applicant $applicant)
    {
        $this->applicant = $applicant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = new PDF($this->applicant);
        $filename = $this->applicant->tracking_number.".pdf";

        return $this->subject('Scholarship Status')
                    ->view('emails.application.approved')
                    ->attachData($pdf->raw(), $filename, [
                        'mime' => 'application/pdf',
                    ]);
    }
}
