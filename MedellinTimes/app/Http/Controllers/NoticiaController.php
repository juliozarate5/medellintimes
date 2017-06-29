<?php
namespace MedellinTimes\Http\Controllers;
use Illuminate\Http\Request;
use MedellinTimes\Noticia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //para subir imagen desde el cliente al server
use MedellinTimes\Http\Requests\NoticiaFormRequest;
use DB;
use Carbon\Carbon; //utilizar fecha y hora segunb nuestra zona horaria
use Response;
use Illuminate\Support\Collection;

class NoticiaController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request) {
        if ($request) {
            $query = trim($request->get('searchText'));
            $noticias = DB::table('noticia as n')
                    ->join('categoria_noticia as c', 'n.idcategoria_noticia', '=', 'c.idcategoria_noticia')//porque esta relacionada con otra tabla
                    ->join('users as u', 'n.users_id', '=', 'u.id')
                    ->select('n.idnoticia', 'n.titulo', 'n.fecha_publicacion', 'n.fecha_edicion', 'c.nombre as categoria', 'n.foto', 'n.estado', 'u.name as nomb')
                    ->where('n.titulo', 'LIKE', '%' . $query . '%')->orderBy('n.fecha_publicacion', 'desc')->paginate(10);
            return view('noticias.noticia.index', array("noticias" => $noticias, "searchText" => $query));
        }
    }
    public function create() {
        $categorias = DB::table('categoria_noticia')
                ->where('estado', '=', '1')->get();
        return view("noticias.noticia.create", array("categorias" => $categorias));
    }

    public function store(NoticiaFormRequest $request) {
        $noticia = new Noticia;
        $noticia->idcategoria_noticia = $request->get('idcategoria_noticia');
        $noticia->titulo = $request->get('titulo');
        if (Input::hasFile('foto')) {
            $file = Input::file('foto');
            $file->move(public_path() . '/imagenes/', $file->getClientOriginalName());
            $noticia->foto = $file->getClientOriginalName();
        }
        $noticia->contenido = $request->get('contenido');
        $mytime = Carbon::now('America/Bogota');
        $noticia->fecha_publicacion = $mytime->toDateTimeString();
        $noticia->fecha_edicion = $mytime->toDateTimeString();
        $noticia->users_id = $request->get('users_id');
        $noticia->estado = 'activa';
        $noticia->save();
        return Redirect::to('noticias/noticia');
    }
    public function show($id) {
        $noticia = DB::table('noticia as n')
                ->join('categoria_noticia as c', 'n.idcategoria_noticia', '=', 'c.idcategoria_noticia')//porque esta relacionada con otra tabla
                ->join('users as u', 'n.users_id', '=', 'u.id')
                ->select('n.idnoticia', 'n.titulo', 'n.fecha_publicacion', 'n.fecha_edicion', 'c.nombre as categoria', 'n.foto', 'n.estado', 'u.name as nomb', 'n.contenido')
                ->where('n.idnoticia', '=', $id)->orderBy('n.fecha_publicacion', 'desc')->first();
        return view("noticias.noticia.show", ["noticia" => $noticia]);
    }
    public function edit($id) {
        $noticia = Noticia::findOrFail($id);
        $categorias = DB::table('categoria_noticia')
                ->where('estado', '=', '1')->get();
        return view("noticias.noticia.edit", array("noticia" => $noticia, "categorias" => $categorias));
    }
    public function update(NoticiaFormRequest $request, $id) {
        $noticia = Noticia::findOrFail($id);
        $noticia->idcategoria_noticia = $request->get('idcategoria_noticia');
        $noticia->titulo = $request->get('titulo');
        if (Input::hasFile('foto')) {
            $file = Input::file('foto');
            $file->move(public_path() . '/imagenes/', $file->getClientOriginalName());
            $noticia->foto = $file->getClientOriginalName();
        }
        $noticia->contenido = $request->get('contenido');
        $mytime = Carbon::now('America/Bogota');
        $noticia->fecha_publicacion = $request->get('fecha_publicacion');
        $noticia->fecha_edicion = $mytime->toDateTimeString();
        $noticia->users_id = $request->get('users_id');
        $noticia->estado = 'activa';
        $noticia->update();
        return Redirect::to('noticias/noticia');
    }
    public function destroy($id) {
        $noticia = Noticia::findOrFail($id);
        $noticia->Estado = 'inactiva';
        $noticia->update();
        return Redirect::to('noticias/noticia');
    }
}
