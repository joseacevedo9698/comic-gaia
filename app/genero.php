<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    protected $table = 'generos';
    protected $fillable = ['Nombre'];
    protected $guarded = ['id'];
    public function libros()
    {
        return $this->belongsToMany('App\Libros', 'genero_libro', 'genero_id', 'libro_id');
    }
}
