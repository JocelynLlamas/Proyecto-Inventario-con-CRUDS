<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\logcategorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function categoriaExistente()
    {
        $categorias = Categorias::all();
        // dd($categorias);
        return view('categorias')->with('categorias', $categorias);
    }

    public function guardar(Request $request)
    {
        // new usuarios es por el MODELO
        $categoria = new Categorias();
        $categoria->nombreCategoria = $request->nombreCategoria;
        $categoria->save();

        $log = new logcategorias();
        $log->idcategoria = $categoria->id;
        $log->nombreCategoriaN = $categoria->nombreCategoria;
        $log->save();


        return redirect()->back();
    }

    public function eliminar($id)
    {
        $categoria = Categorias::find($id);
        $categoria->forceDelete();
        return redirect()->back();
    }

    public function muestraeditar($id)
    {
        $categoria = Categorias::find($id);

        return view('editar')->with('categoria', $categoria);
    }

    public function guardarEdicion(Request $request)
    {
        $categoria = Categorias::find($request->id);

        $log = new logcategorias();
        $log->idcategoria = $categoria->id;

        $log->nombreCategoriaO = $categoria->nombreCategoria;
        $log->nombreCategoriaN = $request->nombreCategoria;

        $categoria->nombreCategoria = $request->nombreCategoria;
        $categoria->save();

        $log->save();
        return redirect('/categorias');
    }

    public function categoriaObtenida($id)
    {
        $categoria = Categorias::find($id);
        dd($categoria);
        return view('verCategoria')->with('categorias', $categoria);
    }
}
