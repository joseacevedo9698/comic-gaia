<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galerias';
    protected $fillable = ['Nombre', 'Description','Fecha_publicacion'];
    protected $guarded = ['id'];

    public function galeria_imagenes()
    {
        return $this->hasMany('App\Galeria_img', 'galeria_id', 'id');
    }
}
