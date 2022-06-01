<?php

namespace App\Exports;

use App\Models\Articulos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArticulosExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ["nombre", "piezas", "precio"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Articulos::select('nombre','piezas', 'precio')->get();
    }
} 