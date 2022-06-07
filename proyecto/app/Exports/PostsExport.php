<?php

namespace App\Exports;

use App\Models\Articulos;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Articulos::all();
    }
}
