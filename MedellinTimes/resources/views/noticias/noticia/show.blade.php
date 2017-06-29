@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
        <div class='form-group'>
            <label for='titulo'>Titulo Noticia</label>
            <p>{{$noticia->titulo}}</p>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class='form-group'>
            <label>Fecha publicación</label>
            <p>{{$noticia->fecha_publicacion}}</p>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class='form-group'>
            <label for='fecha_edicion'>Fecha Edición</label>
            <p>{{$noticia->fecha_edicion}}</p>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class='form-group'>
            <label for='categoria'>Categoria</label>
            <p>{{$noticia->categoria}}</p>
        </div>
    </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class='form-group'>
            <label for='nomb'>Ultimo editor</label>
            <p>{{$noticia->nomb}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="panel panel-primary">
        <div class='panel-body'>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <label for='num_comprobante'>Contenido</label>
                <p>{{$noticia->contenido}}</p>
            </div>
        </div>
    </div>
</div>
@endsection 
