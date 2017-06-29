<?php

namespace MedellinTimes\Http\Controllers;

use Illuminate\Http\Request;
//se agrega modelo y las demas
use MedellinTimes\CategoriaNoticia;
use Illuminate\Support\Facades\Redirect;
use MedellinTimes\Http\Requests\CategoriaNoticiaFormRequest;
use DB;

class CategoriaNoticiaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        if($request){
            $query = trim($request->get('searchText'));
            $categorias_noticias = DB::table('categoria_noticia')
             ->where('nombre','LIKE','%'.$query.'%')
             ->where('estado','=','1')
             ->orderBy('idcategoria_noticia', 'desc')
             ->paginate(10);
            return view('noticias.categoria.index',array("categorias_noticias"=>$categorias_noticias, "searchText"=>$query));
        }
    }
    
    public function create(){
        return view("noticias.categoria.create");
    }
    
    public function store(CategoriaNoticiaFormRequest $request){
        $categoria_noticia = new CategoriaNoticia;
        $categoria_noticia->nombre=$request->get('nombre');
        $categoria_noticia->descripcion = $request->get('descripcion');
        $categoria_noticia->estado='1';
        $categoria_noticia->save();
        return Redirect::to('noticias/categoria');
    }
    
    public function show($id){
        return view("noticias.categoria.show", array("categoria_noticia"=>CategoriaNoticia::findOrFail($id)));
    }
    
    public function edit($id){
        return view("noticias.categoria.edit", array("categoria_noticia"=>CategoriaNoticia::findOrFail($id)));
    }
    
    public function update(CategoriaNoticiaFormRequest $request, $id){
        $categoria_noticia = CategoriaNoticia::findOrFail($id);
        $categoria_noticia->nombre=$request->get('nombre');
        $categoria_noticia->descripcion=$request->get('descripcion');
        $categoria_noticia->update();
        return Redirect::to('noticias/categoria');
    }
    
    public function destroy($id){
        $categoria_noticia = CategoriaNoticia::findOrFail($id);
        $categoria_noticia->estado='0';
        $categoria_noticia->update();
        return Redirect::to('noticias/categoria');
    }
}
