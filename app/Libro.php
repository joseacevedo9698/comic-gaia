<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $fillable = ['titulo_id', 'idioma_id','ano_public','tipo_id','editorial_id','ejemplares','volumen','img_path','sinopsis'];
    protected $guarded = ['id'];

    public function titulo()
    {
        return $this->belongsTo('App\Titulo', 'titulo_id');
    }
    public function editorial(){
        return $this->belongsTo('App\editorial', 'editorial_id');
    }
    public function genero()
    {
        return $this->belongsTo('App\genero', 'genero_id');
    }
    public function idioma()
    {
        return $this->belongsTo('App\idioma', 'idioma_id');
    }
    public function tipo()
    {
        return $this->belongsTo('App\tipo', 'tipo_id');
    }
    public function autors()
    {
        return $this->belongsToMany('App\autor', 'autor_libro', 'libro_id', 'autor_id');
    }

    public function generos()
    {
        return $this->belongsToMany('App\genero', 'genero_libro', 'libro_id', 'genero_id');
    }

    
    public function dibujantes()
    {
        return $this->belongsToMany('App\dibujante', 'dibujante_libro', 'libro_id', 'dibujante_id');
    }
    
}
