<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Libro;
use App\genero;
use App\tipo;
use App\idioma;
use App\Titulo;
use App\dibujante;
use App\autor;
use App\editorial;
use DB;
use Carbon\Carbon;
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $genero = genero::all();
        $tipo = tipo::all();
        $idioma = idioma::all();
        return view('NewLibro',compact('genero','tipo','idioma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'genero_id' => 'required|numeric',
            'titulo_id' => 'required|numeric',
            'autor_id' => 'required|numeric',
            'dibujante_id' => 'required|numeric',
            'tipo_id' => 'required|numeric',
            'editorial_id' => 'required|numeric',
            'idioma_id' => 'required|numeric',
            'ano_public' => 'required|date',
            'volumen' => 'required|numeric',
            'ejemplares' => 'required|numeric',
            'myFile' => 'required|file'
        ]);

        DB::table('autor_libro')->where('libro_id', '=', $request->input('id'))->delete();
        DB::table('dibujante_libro')->where('libro_id', '=', $request->input('id'))->delete();
        DB::table('genero_libro')->where('libro_id', '=', $request->input('id'))->where('genero_id', '=', $request->input('genero_id'))->delete();
        $titulo = $request->input('titulo_id');
        $autor= $request->input('autor_id');
        $dibujante= $request->input('dibujante_id');
        $tipo = $request->input('tipo_id');
        $genero= $request->input('genero_id');
        $editorial= $request->input('editorial_id');
        $idioma= $request->input('idioma_id');
        $ano= $request->input('ano_public');
        $volumen= $request->input('volumen');
        $ejemplar= $request->input('ejemplares');
        $titulo_id;
        if(Titulo::where('Nombre', 'LIKE', '%'.$titulo.'%')->count()>0){
            $titulos = Titulo::where('Nombre', 'LIKE', '%'.$titulo.'%')->get();
            foreach ($titulos as $query){
                    $titulo_id = $query->id;
            }
        }else{
            $tituloc = new Titulo();
            $tituloc->Nombre = $titulo;
            $tituloc->save();
            $titulo_id = $tituloc->id;
        }
        $editorial_id;
        if(editorial::where('Nombre', 'LIKE', '%'.$editorial.'%')->count()>0){
            $editoriales = editorial::where('Nombre', 'LIKE', '%'.$editorial.'%')->get();
            foreach ($editoriales as $query){
                $editorial_id = $query->id;
            }
        }else{
            $editorialC = new editorial();
            $editorialC->Nombre = $editorial;
            $editorialC->save();
            $editorial_id = $editorialC->id;
        }


        $dibujante_id;
        if(dibujante::where('Nombre', 'LIKE', '%'.$dibujante.'%')->count()>0){
            $dibujantes = dibujante::where('Nombre', 'LIKE', '%'.$dibujante.'%')->get();
            foreach ($dibujantes as $query){
                $dibujante_id = $query->id;
            }
        }else{
            $dibujanteC = new dibujante();
            $dibujanteC->Nombre = $dibujante;
            $dibujanteC->save();
            $dibujante_id = $dibujanteC->id;
        }

        $autor_id;
        if(autor::where('Nombre', 'LIKE', '%'.$autor.'%')->count()>0){
            $autors = autor::where('Nombre', 'LIKE', '%'.$autor.'%')->get();
            foreach ($autors as $query){
                    $autor_id = $query->id;
            }
        }else{
            $autorC = new autor();
            $autorC->Nombre = $autor;
            $autorC->save();
            $autor_id = $autorC->id;
        }


        $libro = Libro::findOrfail($request->input('id'));
        $libro->titulo_id = $titulo_id;
        $libro->idioma_id = $idioma;
        $libro->tipo_id = $tipo;
        $libro->editorial_id  =$editorial_id;
        $libro->ano_public = $ano;
        $libro->volumen = $volumen;
        $libro->ejemplares = $ejemplar;
        $libro->sinopsis = $request->input('sinopsis');
        if ($request->file('myFile')) {
            $path = Storage::disk('public')->put('image',$request->file('myFile'));
            $libro->img_path = asset($path);
        }
        $libro->save();
        $libro->autors()->attach($autor_id);
        $libro->generos()->attach($genero);
        $libro->dibujantes()->attach($dibujante_id);
        $respuesta_actualizacion = true;
        $libros= Libro::all();
        return view('admin_libros',compact('libros','respuesta_actualizacion'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->autors()->detach();
        $libro->dibujantes()->detach();
        $libro->generos()->detach();
        $libro->delete();
        $respuesta_eliminacion = true;
        $libros= Libro::all();
        return view('admin_libros',compact('libros','respuesta_eliminacion'));
    }


    function titulofetch(Request $request)
    {
      $posts = Titulo::where('Nombre', 'LIKE', '%'.$request->search.'%')->get();
      $results = array();
      foreach ($posts as $query){
	          $results[] = [ 'id' => $query->id, 'nombre' => $query->Nombre ];
      }
      return \Response::json($results);
    }

    function dibujantefetch(Request $request)
    {
        $posts = dibujante::where('Nombre', 'LIKE', '%'.$request->search.'%')->get();
        $results = array();
        foreach ($posts as $query){
                $results[] = [ 'id' => $query->id, 'nombre' => $query->Nombre ];
        }
        return \Response::json($results);
    }

    function autorfetch(Request $request)
    {
        $posts = autor::where('Nombre', 'LIKE', '%'.$request->search.'%')->get();
        $results = array();
        foreach ($posts as $query){
                $results[] = [ 'id' => $query->id, 'nombre' => $query->Nombre ];
        }
        return \Response::json($results);
    }

    function editorialfetch(Request $request)
    {
        $posts = editorial::where('Nombre', 'LIKE', '%'.$request->search.'%')->get();
        $results = array();
        foreach ($posts as $query){
                $results[] = [ 'id' => $query->id, 'nombre' => $query->Nombre ];
        }
        return \Response::json($results);
    }

    public function insertlibro(Request $request)
    {
        $request->validate([
            'genero_id' => 'required|numeric',
            'titulo_id' => 'required|numeric',
            'autor_id' => 'required|numeric',
            'dibujante_id' => 'required|numeric',
            'tipo_id' => 'required|numeric',
            'editorial_id' => 'required|numeric',
            'idioma_id' => 'required|numeric',
            'ano_public' => 'required|date',
            'volumen' => 'required|numeric',
            'ejemplares' => 'required|numeric',
            'myFile' => 'required|file'
        ]);
        $titulo = $request->input('titulo_id');
        $autor= $request->input('autor_id');
        $dibujante= $request->input('dibujante_id');
        $tipo = $request->input('tipo_id');
        $genero= $request->input('genero_id');
        $editorial= $request->input('editorial_id');
        $idioma= $request->input('idioma_id');
        $ano= $request->input('ano_public');
        $volumen= $request->input('volumen');
        $ejemplar= $request->input('ejemplares');
        $titulo_id;
        if(Titulo::where('Nombre', 'LIKE', '%'.$titulo.'%')->count()>0){
            $titulos = Titulo::where('Nombre', 'LIKE', '%'.$titulo.'%')->get();
            foreach ($titulos as $query){
                    $titulo_id = $query->id;
            }
        }else{
            $tituloc = new Titulo();
            $tituloc->Nombre = $titulo;
            $tituloc->save();
            $titulo_id = $tituloc->id;
        }
        $editorial_id;
        if(editorial::where('Nombre', 'LIKE', '%'.$editorial.'%')->count()>0){
            $editoriales = editorial::where('Nombre', 'LIKE', '%'.$editorial.'%')->get();
            foreach ($editoriales as $query){
                $editorial_id = $query->id;
            }
        }else{
            $editorialC = new editorial();
            $editorialC->Nombre = $editorial;
            $editorialC->save();
            $editorial_id = $editorialC->id;
        }


        $dibujante_id;
        if(dibujante::where('Nombre', 'LIKE', '%'.$dibujante.'%')->count()>0){
            $dibujantes = dibujante::where('Nombre', 'LIKE', '%'.$dibujante.'%')->get();
            foreach ($dibujantes as $query){
                $dibujante_id = $query->id;
            }
        }else{
            $dibujanteC = new dibujante();
            $dibujanteC->Nombre = $dibujante;
            $dibujanteC->save();
            $dibujante_id = $dibujanteC->id;
        }

        $autor_id;
        if(autor::where('Nombre', 'LIKE', '%'.$autor.'%')->count()>0){
            $autors = autor::where('Nombre', 'LIKE', '%'.$autor.'%')->get();
            foreach ($autors as $query){
                    $autor_id = $query->id;
            }
        }else{
            $autorC = new autor();
            $autorC->Nombre = $autor;
            $autorC->save();
            $autor_id = $autorC->id;
        }


        $libro = new Libro();
        $libro->titulo_id = $titulo_id;
        $libro->idioma_id = $idioma;
        $libro->tipo_id = $tipo;
        $libro->editorial_id  =$editorial_id;
        $libro->ano_public = $ano;
        $libro->volumen = $volumen;
        $libro->ejemplares = $ejemplar;
        $libro->sinopsis = $request->input('sinopsis');
        if ($request->file('myFile')) {
            $path = Storage::disk('public')->put('image',$request->file('myFile'));
            $libro->img_path = asset($path);
        }
        $libro->save();
        $libro->autors()->attach($autor_id);
        $libro->generos()->attach($genero);
        $libro->dibujantes()->attach($dibujante_id);
        $respuesta_resgistro = true;
        $libros= Libro::all();
        return view('admin_libros',compact('libros','respuesta_resgistro'));
    }


    public function showedit($id)
    {
        $datos = Libro::find($id);
        $genero = genero::all();
        $tipo = tipo::all();
        $idioma = idioma::all();
        return view('edit_libros',compact('genero','tipo','idioma','datos'));
    }




    public function showLibro($id)
    {
        $libro = Libro::findOrFail($id);
        if ($libro->count() > 0) {
            // $fecha = \Carbon\Carbon::parse($libro->ano_public);
            // $fecha_spanish = ucfirst($fecha->monthName).' De '.$fecha->year();
            return view('libros_view',compact('libro'));
        }
    }

}
