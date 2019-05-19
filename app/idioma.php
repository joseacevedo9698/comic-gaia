<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class idioma extends Model
{
    protected $table = 'idiomas';
    protected $fillable = ['Nombre'];
    protected $guarded = ['id'];
    public function libros()
    {
        return $this->hasMany('App\Libros', 'idioma_id', 'id');
    }
}
