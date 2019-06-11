<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        return view("index.index_principal");
    }


    public function libros()
    {
        $datos = Libro::all();
        return view("index.index_libros",compact('datos'));
    }

    public function Search_libro(Request $request)
    {
        $libro_notfound = false;
        $datos = DB::table('libros')
        ->join('titulos', 'libros.titulo_id', '=', 'titulos.id')
        ->where('titulos.Nombre','LIKE', '%'.$request->input('nombre').'%')->get();
        if ($datos->isEmpty()) {
           $libro_notfound = true;
           return view("index.index_libros",compact('libro_notfound'));
        }else{
            $datos =  Libro::where('titulo_id',$datos[0]->id)->get();
            return view("index.index_libros",compact('datos'));
        }

    }
}
