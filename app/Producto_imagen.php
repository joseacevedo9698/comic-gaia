<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_imagen extends Model
{
    protected $table = 'producto_imagens';
    protected $fillable = ['path_img', 'producto_id'];
    protected $guarded = ['id'];

    public function producto()
    {
        return $this->belongsTo('App\Producto', 'producto_id');
    }
}
