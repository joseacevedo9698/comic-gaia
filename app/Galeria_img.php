<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria_img extends Model
{
    protected $table = 'galeria_imgs';
    protected $fillable = ['path_img', 'galeria_id'];
    protected $guarded = ['id'];


    public function galeria()
    {
        return $this->belongsTo('App\Galeria', 'galeria_id');
    }
}
