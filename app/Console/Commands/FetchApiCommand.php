<?php

namespace App\Console\Commands;

use App\Models\WMI;
use App\Models\make;
use App\Models\Part;
use App\Models\DecodeVin;
use App\Models\Evento;
use App\Models\Manufacture;
use App\Models\WmiManufacture;
use App\Models\ManufactureMake;
use App\service\VehicleService;
use Illuminate\Console\Command;
use App\Models\ManufactureDetail;

class FetchApiCommand extends Command
{
    const ROOT_URL = "https://vpic.nhtsa.dot.gov/api/";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grupomas:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Llenando la base de datos con la Vehicle API';
    CONST fetches = [
        DecodeVin::class,
    ];

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
        $evento = new Evento();
        $evento->nombre = 'cargar FetchApiCommand';
        $evento->descripcion = 'Se ha ejecutado FetchApiCommand';
        $evento->save();
        if ($this->confirm('cargar informacion de la API?')) {
            $this->info('Se esta cargado los datos la API');
            make::fetch();
            WmiManufacture::fetch();
            DecodeVin::fetchFlat();
            DecodeVin::fetch();
            Part::fetch();
            Manufacture::fetch();
            ManufactureDetail::fetch();
            WMI::fetch();
            ManufactureMake::fetch();
            $this->info('Termine de cargar los datos de la API');
            $evento = new Evento();
            $evento->nombre = 'Se solicito a la API';
            $evento->descripcion = 'Se ha ejecutado FetchApiCommand y cargado la informacion de la API';
            $evento->save();
        }

        return 0;
    }
}
