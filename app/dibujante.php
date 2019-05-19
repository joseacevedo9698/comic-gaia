<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dibujante extends Model
{
    protected $table = 'dibujantes';
    protected $fillable = ['id','Nombre'];
    protected $guarded = [];
    public function libros()
    {
        return $this->belongsToMany('App\Libros', 'dibujante_libro', 'dibujante_id', 'libro_id');
    }
}
