<?php

namespace App\Console\Commands;

use App\Models\Establishment;
use App\Models\Feature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExtractEstablishmentsFeatures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'estsfeats:fromcsv {--clearFirst}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extracts data from csv and loads into db';

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
     * @return mixed
     */
    public function handle()
    {
    }
}