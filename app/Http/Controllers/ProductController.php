<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Producto_tipo;
use App\Producto;
use App\Producto_imagen;

class ProductController extends Controller
{


    public function index()
    {
        $tipo = Producto_tipo::all();
        return view('New_producto',compact('tipo'));
    }
    public function insertproducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'myFile' => 'required',
            'tipo' => 'required|numeric',
            'desc' => 'required',
            'precio' => 'required|numeric'
        ]);
       $nombre = $request->input('nombre');
       $file = $request->file('myFile');
       $tipo = $request->input('tipo');
       $descripcion = $request->input('desc');
       $precio = $request->input('precio');
        $tipo_count  = Producto_tipo::findOrFail($tipo);
        if ($tipo_count->id >0) {
            $producto = new Producto();
            $producto->nombre = $nombre;
            $producto->descripcion = $descripcion;
            $producto->tipo_id = $tipo_count->id;
            $producto->precio = $precio;
            $id = $producto->save();
            foreach ($file as $f ) {
                $path = Storage::disk('public')->put('image',$f);
                $imagen = asset($path);
                $id= $producto->id;
                $imagen_producto = new Producto_imagen();
                $imagen_producto->path_img = $imagen;
                $imagen_producto->producto_id = $id;
                $imagen_producto->save();
            }
            $productos = Producto::all();
            $respuesta_resgistro = true;
            return view('admin_product',compact('productos','respuesta_resgistro'));

        }

    }

    public function destroy($id)
    {
       $producto = Producto::findOrFail($id);
       $producto->delete();
       $respuesta_eliminacion = true;
        $productos= Producto::all();
        return view('admin_product',compact('productos','respuesta_eliminacion'));
    }


    public function showedit($id)
    {
        $producto = Producto::findOrFail($id);
        $tipo = Producto_tipo::all();
        return view('edit_producto',compact('producto','tipo'));
    }


    public function updateproducto(Request $request)
    {
        $request->validate([
            'id'=> 'required|numeric',
            'nombre' => 'required',
            'myFile' => 'required|file',
            'tipo' => 'required|numeric',
            'desc' => 'required',
            'precio' => 'required|numeric'
        ]);
        $producto = Producto::findOrFail($request->input('id'));
        $producto->producto_imagenes()->delete();
        $nombre = $request->input('nombre');
        $file = $request->file('myFile');
        $tipo = $request->input('tipo');
        $descripcion = $request->input('desc');
        $precio = $request->input('precio');
        $producto->nombre = $nombre;
        $producto->descripcion = $descripcion;
        $tipo_count  = Producto_tipo::findOrFail($tipo);
        $producto->tipo_id = $tipo_count->id;
        $producto->precio = $precio;

        foreach ($file as $f ) {
            $path = Storage::disk('public')->put('image',$f);
            $imagen = asset($path);
            $imagen_producto = new Producto_imagen();
            $imagen_producto->path_img = $imagen;
            $imagen_producto->producto_id = $request->input('id');
            $imagen_producto->save();
        }
        $producto->save();
        $productos = Producto::all();
            $respuesta_actualizacion = true;
            return view('admin_product',compact('productos','respuesta_actualizacion'));

    }



    public function showproducto($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto_view',compact('producto'));
    }
}
