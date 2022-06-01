<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulos;
use App\Models\logarticulos;
use App\Models\Categorias;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ArticulosImport;

class ArticuloController extends Controller
{
    // ARTICULOS 

    // public function registro()
    // {
    //     $articulos = Articulos::where('precio', '>', 0)->get();
    //     $categorias = Categorias::all();
    //     return view('inventario', ['Articulos'=>$articulos])->with('categorias',$categorias);
    // }

    public function articuloExistente()
    {
        $articulos = Categorias::join('articulos', 'categorias.id', '=', 'articulos.categoria_id')
            ->select('articulos.*', 'categoria_id', 'categorias.nombreCategoria')
            ->get();
        // $articulos = Articulos::all();
        $categorias = Categorias::all();
        // dd($articulos);
        return view('inventario')->with('articulos', $articulos)->with('categorias', $categorias);
    }

    public function guardar(Request $request)
    {
        // new usuarios es por el MODELO
        $imagen = $request->nombre . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imagen);

        $articulo = new Articulos();
        $articulo->nombre = $request->nombre;
        $articulo->piezas = $request->piezas;
        $articulo->precio = $request->precio;
        $articulo->categoria_id = $request->categoria_id;
        $articulo->descripcion = $request->descripcion;
        $articulo->image_path = $imagen;
        $articulo->save();

        $log = new logarticulos();
        $log->idarticulo = $articulo->id;
        $log->nombreN = $articulo->nombre;
        $log->piezasN = $articulo->piezas;
        $log->precioN = $articulo->precio;
        $log->categoria_idN = $articulo->categoria_id;
        $log->descripcionN = $articulo->descripcionN;
        $log->image_pathN = $articulo->image_path;
        $log->save();


        return redirect()->back();
    }

    public function eliminar($id)
    {
        $articulo = Articulos::find($id);
        $articulo->forceDelete();
        return redirect()->back();
    }

    public function muestraeditar($id)
    {
        $articulo = Articulos::find($id);

        return view('editar')->with('articulo', $articulo);
    }

    public function guardarEdicion(Request $request)
    {
        $articulo = Articulos::find($request->id);

        $log = new logarticulos();
        $log->idarticulo = $articulo->id;

        $log->nombreO = $articulo->nombre;
        $log->piezasO = $articulo->piezas;
        $log->precioO = $articulo->precio;
        $log->categoria_idO = $articulo->categoria_id;
        $log->descripcionO = $articulo->descripcion;
        $log->image_pathO = $articulo->image_path;
        $log->nombreN = $request->nombre;
        $log->piezasN = $articulo->piezas;
        $log->precioN = $articulo->precio;
        $log->categoria_idN = $articulo->categoria_id;
        $log->descripcionN = $articulo->descripcion;
        $log->image_pathN = $articulo->image_path;


        $articulo->nombre = $request->nombre;
        $articulo->piezas = $request->piezas;
        $articulo->precio = $request->precio;
        $articulo->categoria_id = $request->categoria_id;
        $articulo->descripcion = $request->descripcion;
        $articulo->image_path = $request->image_path;
        $articulo->save();

        $log->save();
        return redirect('/inventario');
    }

    public function descargaPdf()
    {
        $categorias = Categorias::all();
        $articulos = Articulos::all();

        $pdf = PDF::loadView('archivoPdf', compact('categorias'), compact('articulos'));
        $pdf->setPaper('Letter');
        // return $pdf->download('articulos.pdf');
        return $pdf->stream('articulos.pdf');
    }

    public function importCsv()
    {
        $fileName = time() . '_' . request()->file->getClientOriginalName();
        request()->file('file')->storeAs('reports', $fileName, 'public');

        Excel::import(new ArticulosImport, request()->file('file'));
        return redirect()->back()->with('success', 'Data Imported Successfully');
    }

    // public function exportCsv()
    // {
    //     $export = Excel::download(new ArticulosExport, 'articulos.csv');
    //     return $export;
    // }
}
