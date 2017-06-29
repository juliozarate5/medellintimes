@extends('layouts.admin')
@section('contenido')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Categorías de Noticias <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('noticias.categoria.search')
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="table-responsive">
             <table class="table table-striped table-bordered table-condensed table-hover">
                 <thead>
                 <th>Id</th>
                 <th>Nombre</th>
                 <th>Descripción</th>
                 <th></th>
                 </thead>
                 @foreach($categorias_noticias as $cat)
                 <tr>
                     <td>{{$cat->idcategoria_noticia}}</td>
                     <td>{{$cat->nombre}}</td>
                     <td>{{$cat->descripcion}}</td>
                     <td>
                         <a href="{{URL::action('CategoriaNoticiaController@edit', $cat->idcategoria_noticia)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idcategoria_noticia}}" data-toggle="modal">
                             <button class="btn btn-danger">Eliminar</button>
                         </a>
                     </td>
                 </tr>
                 @include('noticias.categoria.modal')
                 @endforeach
             </table>
         </div>
        {{$categorias_noticias->render()}}
        </div>
</div>

@endsection