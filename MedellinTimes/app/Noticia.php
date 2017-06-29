<?php

namespace MedellinTimes;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table='noticia';
    protected $primaryKey = 'idnoticia';
    
    public $timestamps = false;
    
    protected $fillable = [
        'idcategoria_noticia',
        'titulo',
        'foto',
        'contenido',
        'fecha_publicacion',
        'fecha_edicion',
        'users_id',
        'estado'
    ];
    
    protected $guarded = [
        
    ];
}
