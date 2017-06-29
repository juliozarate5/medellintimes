<?php
/*esto se puede omitir con una extensión para google chrome*/
date_default_timezone_set('America/Bogota');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
if(isset($_SERVER['HTTP_ORIGIN'])){
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Max-Age: 86400");
}

if($_SERVER['REQUEST_METHOD']=='OPTIONS'){
    if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    
    if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        
    exit(0);
}
/*fin*/
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*Route::get('contenido/{tipo?}', function ($tipo = null) {
    return $tipo;
});*/

Route::get('contenido', 'ApiController@index');

Route::get('contenido/{id?}', 'ApiController@show',function (Request $request, $id= null) {
    return $request->show($id);
});