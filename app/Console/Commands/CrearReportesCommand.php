<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\WMI;
use App\Models\make;
use App\Models\Part;
use App\Models\User;
use App\Models\Evento;
use App\Models\DecodeVin;
use App\Models\ExportAll;
use App\Models\Manufacture;
use App\Models\WmiManufacture;
use App\Models\ManufactureMake;
use Illuminate\Console\Command;
use App\Models\ManufactureDetail;
use Maatwebsite\Excel\Facades\Excel;

class CrearReportesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grupomas:guardarrespaldos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '
        guarda los respaldos localmente (en este servidor)
    ';

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
        $opciones = ['vehicleAPI', 's3'];
        $almacen = $this->anticipate('En donde lo quieres guardar?', $opciones)??'vehicleAPI';
        if ($almacen == 'local') $almacen = 'vehicleAPI';
        if (!in_array($almacen, $opciones)){
            $this->error('Solo se puede elegir entre local o s3');
            return 1;
        }
        $clases = [
            DecodeVin::class,
            Evento::class,
            Manufacture::class,
            ManufactureDetail::class,
            ManufactureMake::class,
            Part::class,
            WMI::class,
            WmiManufacture::class,
            make::class,
        ];
        $this->info('Se guardara en el folder storage\app\vehicleAPI');
        foreach($clases as $index => $clase)
        {
            $exportAll =new ExportAll($clase);
            $name = Carbon::now(). ' - ' . $clase::TABLE_NAME.'.xlsx';
            Excel::store($exportAll, $name, $almacen);
        }
        $this->info('termine');

        return 0;
    }
}
