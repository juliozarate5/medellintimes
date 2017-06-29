@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Actualizar Noticia: {{$noticia->titulo}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!! Form::model($noticia, [
        'method' => 'PATCH', 
        'route' => ['noticia.update', $noticia->idnoticia],
        'files'=>'true'
        ]) !!}
        {{Form::token()}}      
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class='form-group'>
                    <label for='titulo'>Titulo</label>
                    <input type='text' name='titulo' required value="{{$noticia->titulo}}" class='form-control' />
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class='form-group'>
                    <label for='foto'>Imagen</label>
                    <input type='file' name='foto' class='form-control'/>
                    @if(($noticia->foto)!="")
                    <img src="{{asset('imagenes/'.$noticia->foto)}}" height="200px" width="200px"/>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for='contenido'>Contenido de la noticia</label>
                    <textarea class="form-control" rows="3" name="contenido" required>{{$noticia->contenido}}</textarea>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class='form-group'>
                    <label for='idcategoria_noticia'>Categoría Noticia</label>
                    <select name="idcategoria_noticia" class="form-control">
                        @foreach ($categorias as $cat)
                        @if($cat->idcategoria_noticia == $noticia->idcategoria_noticia)
                        <option value="{{$cat->idcategoria_noticia}}" selected>{{$cat->nombre}}</option>
                        @else
                        <option value="{{$cat->idcategoria_noticia}}">{{$cat->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="fecha_publicacion" value="{{$noticia->fecha_publicacion}}"/>
            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}"/>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class='form-group'>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
        {!! Form::close() !!}
        @endsection 

