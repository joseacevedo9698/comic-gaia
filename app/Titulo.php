<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $table = 'titulos';
    protected $fillable = ['id','Nombre'];
    protected $guarded = [];
    public function libros()
    {
        return $this->hasMany('App\Libro', 'titulo_id', 'id');
    }
}
