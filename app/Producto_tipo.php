<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_tipo extends Model
{
    
    protected $table = 'producto_tipos';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

    public function productos()
    {
        return $this->hasMany('App\Productos', 'tipo_id', 'id');
    }
}
