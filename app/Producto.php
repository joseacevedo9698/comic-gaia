<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion','tipo_id','precio'];
    protected $guarded = ['id'];

    public function tipo()
    {
        return $this->belongsTo('App\Producto_tipo', 'tipo_id');
    }


    public function producto_imagenes()
    {
        return $this->hasMany('App\Producto_imagen', 'producto_id', 'id');
    }


}
