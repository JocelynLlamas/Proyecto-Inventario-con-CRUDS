<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriasController;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ArticulosImport;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::post('/archivoPdf', function () {
    // return view('invoice');

    $pdf = PDF::loadView('archivoPdf');
    return $pdf->download('reciclaBazar.pdf');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    // INVENTARIO
    Route::get('/inventario', [ArticuloController::class, 'articuloExistente'])->name('inventario');
    Route::post('/crearArticulo', [ArticuloController::class, 'guardar']);

    Route::get('/eliminar/{id}', [ArticuloController::class, 'eliminar']);
    Route::get('/editar/{id}', [ArticuloController::class, 'muestraeditar']);

    Route::post('/guardaedicion', [ArticuloController::class, 'guardarEdicion']);

    // CATEGORIAS
    Route::get('/categorias', [CategoriasController::class, 'categoriaExistente'])->name('categorias');
    Route::post('/crearCategoria', [CategoriasController::class, 'guardar']);

    Route::get('/eliminarCat/{id}', [CategoriasController::class, 'eliminar']);
    Route::get('/editarCat/{id}', [CategoriasController::class, 'muestraeditar']);

    Route::post('/guardaedicionCat', [CategoriasController::class, 'guardarEdicion']);
    Route::post('/articuloPorCategoria/{id}', [CategoriasController::class, 'categoriaObtenida']);

    // PDF
    Route::post('/descargaPdf', [ArticuloController::class, 'descargaPdf']);

    //.CSV
    Route::get('/inventario/export', [ArticuloController::class, 'exportCsv'])->name('post.export');
});
