<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    protected $table = 'autors';
    protected $fillable = ['id','Nombre'];
    protected $guarded = [];
    public function libros()
    {
        return $this->belongsToMany('App\Libros', 'autor_libro', 'autor_id', 'libro_id');
    }
}
