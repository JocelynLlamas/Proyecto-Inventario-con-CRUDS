<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulos extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table='articulos';
    protected $fillable=[
        'nombre',
        'piezas',
        'precio',
        'categoria_id',
        'image_path'
    ];

}
