<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
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
}
