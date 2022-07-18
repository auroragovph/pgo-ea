<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use mikehaertl\pdftk\Pdf;

class GeneratePDF extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate PDF';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $muns = ['BA', 'MA', 'SL', 'DP', 'CA', 'DN', 'DL', 'DG'];

        foreach($muns as $mun){

            $this->info('PDF started been generated for '.$mun);
            $this->newLine(2);


            $suffix = $mun."22-2S";
            $count = 500;
            $collection = new Pdf();
            $bar = $this->output->createProgressBar($count);

            $bar->start();

            for($x = 1; $x <= $count; $x++){
                $pdf =  new Pdf(base_path('pdf/form.pdf'));
                $pdf->tempDir = storage_path('temp');

                $pdf->fillForm([
                    'tracking' => $suffix.str_pad($x, 3, '0', STR_PAD_LEFT),
                ])->needAppearances()->flatten();

                $collection->addFile($pdf);

                $bar->advance();
            }

            $collection->saveAs(base_path('pdf/'.$suffix.'.pdf'));
            $bar->finish();

            $this->newLine(2);
            $this->info('PDF has been generated for '.$mun);
            $this->newLine(2);
        }

    }


}
