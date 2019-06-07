<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\Producto;
use App\Galeria;

class AdminHomeController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $libros= Libro::all();
        return view('admin_libros',compact('libros'));
    }

    public function index_product()
    {
        $productos = Producto::all();
        return view('admin_product',compact('productos'));
    }

    public function index_gallery()
    {
        $galeria = Galeria::orderBy('id','desc')->get();
        $galeria_count = Galeria::count();
        return view('gallery_admin',compact('galeria','galeria_count'));
    }
}
