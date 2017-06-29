@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Noticias <a href="noticia/create"><button class="btn btn-success">Publicar una Nueva Noticia</button></a></h3>
        @include('noticias.noticia.search')
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="table-responsive">
             <table class="table table-striped table-bordered table-condensed table-hover">
                 <thead>
                 <th>Fecha Publicación</th>
                 <th>Fecha Edición</th>
                 <th>Titulo</th>
                 <th>Categoría</th>
                 <th>Foto</th>
                 <th>Estado</th>
                 <th>modificado ultimo por</th>
                 <th></th>
                 </thead>
                 @foreach($noticias as $not)
                 <tr>
                     <td>{{$not->fecha_publicacion}}</td>
                     <td>{{$not->fecha_edicion}}</td>
                     <td>{{$not->titulo}}</td>
                     <td>{{$not->categoria}}</td>
                     <td>
                         <img src='{{asset('imagenes/'.$not->foto)}}' 
                              height="100px" width="100px" class="img-thumbnail"/>
                     </td>
                     <td>{{$not->estado}}</td>
                     <td>{{$not->nomb}}</td>
                     <td>
                         <a href="{{URL::action('NoticiaController@show', $not->idnoticia)}}"><button class="btn btn-info">Detalle</button></a>
                         <a href="{{URL::action('NoticiaController@edit', $not->idnoticia)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$not->idnoticia}}" data-toggle="modal">
                             <button class="btn btn-danger">Ocultar</button>
                         </a>
                     </td>
                     
                 </tr>
                 @include('noticias.noticia.modal')
                 @endforeach
             </table>
         </div>
        {{$noticias->render()}}
        </div>
</div>

@endsection