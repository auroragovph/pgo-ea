<?php

namespace App\Service;

use Carbon\Carbon;
use App\Models\Applicant;
use mikehaertl\pdftk\Pdf as Pdftk;


class Generate {

    public $pdf;

    public function __construct()
    {
        $collection = new Pdftk();
        $suffix = 'BA22-2S-';

        for($x = 1; $x <= 500; $x++){
            $this->pdf = new Pdftk(base_path('pdf/form.pdf'));
            $this->pdf->tempDir = storage_path('temp');
            $this->fill($suffix.str_pad($x, 4, '0', STR_PAD_LEFT));
            $collection->addFile($this->pdf);
        }

        $collection->saveAs(base_path('pdf/BA22-2S'));


    }

    public function fill($tracking)
    {
        return $this->pdf->fillForm([
            'tracking' => $tracking,
        ])->needAppearances()->flatten();
    }

    public function send($name = null)
    {
        return $this->pdf->send($name);
    }

    public function raw()
    {
        return $this->pdf->toString();
    }
}
