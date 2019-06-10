<?php

namespace App\Http\Controllers;

use App\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Galeria_img;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('new_gallery');
    }

    public function insertgaleria(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'desc' => 'required',
            'myFile' => 'required|file',
        ]);
        $fecha = Carbon::now();
        $nombre = $request->input('nombre');
        $descripcion = $request->input('desc');
        $file = $request->file('myFile');
        $galeria = new Galeria();
        $galeria->Nombre = $nombre;
        $galeria->Description = $descripcion;
        $galeria->Fecha_publicacion = $fecha;
        $galeria->save();
        foreach ($file as $f) {
            $path = Storage::disk('public')->put('image', $f);
            $imagen = asset($path);
            $id = $galeria->id;
            $imagen_galeria = new Galeria_img();
            $imagen_galeria->path_img = $imagen;
            $imagen_galeria->galeria_id = $id;
            $imagen_galeria->save();
        }
        $galeria = Galeria::orderBy('id', 'desc')->get();

        $respuesta_resgistro = true;
        return redirect('admin/gallery');
    }

    public function showedit($id)
    {
        $datos = Galeria::findOrFail($id);
        return view('edit_gallery', compact('datos'));
    }

    public function editar_gallery(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nombre' => 'required',
            'desc' => 'required',
        ]);
        $fecha = Carbon::now();
        $nombre = $request->input('nombre');
        $id = $request->input('id');
        $descripcion = $request->input('desc');
        $file = $request->file('myFile');
        $galeria = Galeria::findOrFail($id);
        $galeria->Nombre = $nombre;
        $galeria->Description = $descripcion;
        $galeria->Fecha_publicacion = $fecha;
        if ($request->file('myFile')) {
            $galeria->galeria_imagenes->delete();
            foreach ($file as $f) {
                $path = Storage::disk('public')->put('image', $f);
                $imagen = asset($path);
                $id = $galeria->id;
                $imagen_galeria = new Galeria_img();
                $imagen_galeria->path_img = $imagen;
                $imagen_galeria->galeria_id = $id;
                $imagen_galeria->save();
            }
        }
        $galeria->save();
        $galeria = Galeria::orderBy('id', 'desc')->get();

        $respuesta_resgistro = true;
        return redirect('admin/gallery');
    }


    public function eliminar($id)
    {
        $galeria = Galeria::findOrFail($id);
        $galeria->delete();
        $respuesta_eliminacion = true;
        $galeria = Galeria::orderBy('id', 'desc')->get();
        $galeria_count = Galeria::count();
        return redirect('/admin/gallery');
    }
}
