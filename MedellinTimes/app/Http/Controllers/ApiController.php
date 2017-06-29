<?php

namespace MedellinTimes\Http\Controllers;

use Illuminate\Http\Request;
use MedellinTimes\Noticia;
use Illuminate\Support\Facades\Redirect;
use MedellinTimes\Http\Requests\NoticiaFormRequest;
use DB;
use Carbon\Carbon; //utilizar fecha y hora segunb nuestra zona horaria
use Response;
use Illuminate\Support\Collection;

class ApiController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request) {
            $query = trim($request->get('searchText'));
            $noticias = DB::table('noticia as n')
                    ->join('categoria_noticia as c', 'n.idcategoria_noticia', '=', 'c.idcategoria_noticia')//porque esta relacionada con otra tabla
                    ->select('n.idnoticia', 'n.titulo', 'n.fecha_publicacion', 'n.fecha_edicion','c.nombre as categoria', 'n.foto', 'n.estado')
                    ->where('n.titulo', 'LIKE', '%' . $query . '%')
                    ->where('n.estado','=','activa')
                    ->orderBy('n.fecha_publicacion', 'desc')
                    ->get();
            //return view('noticias.noticia.index', array("noticias" => $noticias, "searchText" => $query));
            /*foreach ($noticias as $key => $value) {
                
            }*/
            return json_encode($noticias);
        }
    }
    
        public function show($id) {
          $noticia = DB::table('noticia as n')
                    ->join('categoria_noticia as c', 'n.idcategoria_noticia', '=', 'c.idcategoria_noticia')//porque esta relacionada con otra tabla
                    ->join('users as u', 'n.users_id', '=', 'u.id')
                    ->select('n.idnoticia', 'n.titulo', 'n.fecha_publicacion', 'n.fecha_edicion',
                            'c.nombre as categoria', 'n.foto', 'n.estado', 'u.name as nomb', 'n.contenido')
                    ->where('n.idnoticia', '=', $id)
                    ->orderBy('n.fecha_publicacion', 'desc')
                    ->first();
          return json_encode($noticia);
    }

}
