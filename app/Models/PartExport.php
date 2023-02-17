<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\FromCollection;

class PartExport   implements FromCollection
{
    public function collection()
    {
        return Part::all();
    }
}
