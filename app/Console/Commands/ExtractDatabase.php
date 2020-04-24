<?php

namespace App\Console\Commands;

use App\Models\Establishment;
use App\Models\Images;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExtractDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ests:fromcsv {--clearFirst}';

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
        $fileUrl = Storage::disk('public')->url('db/establishments.csv');

        if ($this->option('clearFirst')) {
            DB::table('establishments')->delete();
            DB::table('images')->where('imageable_type', 'establishment')->delete();
            $this->info('Establishments Table Successfully Cleared');
        }

        $this->info('Reading CSV...');
        $actualArr = array_map('str_getcsv', file($fileUrl));
        $header = array_shift($actualArr);
        $this->info('Inserting Data to DB...');
        array_walk($actualArr, function($row, $key, $header) {
            $row = array_combine($header, $row);
            $establishment = new Establishment();
            $establishment->name = $row['title_x'];
            $establishment->description = $row['description'];
            $establishment->address = $row['addres'];
            $establishment->rating = 0;
            $establishment->city_id = $row['city_id'];
            $establishment->type_id = $row['type'];
            $establishment->ave_check_id = 1;
            $establishment->save();

            $image = new Images();
            $image->imageable_type = 'establishment';
            $image->imageable_id = $establishment->id;
            $image->path = $row['img1'];
            $image->save();

            $image = new Images();
            $image->imageable_type = 'establishment';
            $image->imageable_id = $establishment->id;
            $image->path = $row['img2'];
            $image->save();

            $image = new Images();
            $image->imageable_type = 'establishment';
            $image->imageable_id = $establishment->id;
            $image->path = $row['img3'];
            $image->save();

            $image = new Images();
            $image->imageable_type = 'establishment';
            $image->imageable_id = $establishment->id;
            $image->path = $row['img4'];
            $image->save();

        }, $header);
        $this->info('Success!');
    }
}
