<?php

namespace MedellinTimes;

use Illuminate\Database\Eloquent\Model;

class CategoriaNoticia extends Model
{
    protected $table='categoria_noticia';
    protected $primaryKey = 'idcategoria_noticia';
    
    public $timestamps = false;
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];
    
    protected $guarded = [
        
    ];
}
