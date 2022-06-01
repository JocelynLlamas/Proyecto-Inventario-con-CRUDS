<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table='categorias';
    protected $fillable=[
        'nombreCategoria'
    ];
}
