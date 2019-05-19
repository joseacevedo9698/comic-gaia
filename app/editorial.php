<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class editorial extends Model
{
    protected $table = 'editorials';
    protected $fillable = ['id','Nombre'];
    protected $guarded = [];
    public function libros()
    {
        return $this->hasMany('App\Libro','editorial_id', 'id');
    }
    
}
