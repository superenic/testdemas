<?php
namespace App\Models;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAll implements FromCollection
{
    private $clase;

    /**
     * @param strint $clase
     */
    public function __construct($clase)
    {
        $this->clase = $clase;
    }

    public function collection()
    {
        return $this->clase::all();
    }
}