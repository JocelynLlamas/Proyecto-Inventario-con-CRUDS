<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logarticulos extends Model
{
    use HasFactory;

    protected $table="logarticulos";

    protected $fillable=[
        'idarticulo',
        'nombreO',
        'piezasO',
        'precioO',
        'categoria_idO',
        'descripcionO',
        'image_pathO',
        'nombreN',
        'piezasN',
        'precioN',
        'categoria_idN',
        'descripcionN',
        'image_pathN',
    ];
}
