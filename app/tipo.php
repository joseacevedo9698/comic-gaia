<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    protected $table = 'tipos';
    protected $fillable = ['Nombre'];
    protected $guarded = ['id'];
    public function libros()
    {
        return $this->hasMany('App\Libros', 'tipo_id', 'id');
    }
}
