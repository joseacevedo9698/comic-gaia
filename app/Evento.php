<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = ['Nombre', 'Fecha_inicio','Fecha_final','Lugar','img_path','Hora_inicio','Hora_cierre'];
    protected $guarded = ['id'];
}
