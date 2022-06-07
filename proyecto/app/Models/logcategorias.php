<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logcategorias extends Model
{
    use HasFactory;

    protected $table="--";

    protected $fillable=[
        'idcategoria',
        'nombreCategoriaO',
        'nombreCategoriaN'
    ];
}
