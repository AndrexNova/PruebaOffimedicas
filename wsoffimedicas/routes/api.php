<?php

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//Route::apiResource("usuarios","UsuariosController");

Route::get('usuarios/getLogin', 'UsuariosController@getLogin')->name("usuarios.getLogin");
Route::get('usuarios', 'UsuariosController@index')->name("usuarios.index");
Route::get('usuarios/{id}', 'UsuariosController@show')->name("usuarios.show");
Route::post('usuarios', 'UsuariosController@store')->name("usuarios.store");
Route::put('usuarios/{id}', 'UsuariosController@update')->name("usuarios.update");
Route::delete('usuarios/{id}', 'UsuariosController@destroy')->name("usuarios.destroy");
Route::get('usuarios/email/{email}', 'UsuariosController@showWithEmail')->name("usuarios.showWithEmail");

Route::get('parentescos', 'ParentescosController@index')->name("parentescos.index");
Route::get('parentescos/{id}', 'ParentescosController@show')->name("parentescos.show");
Route::post('parentescos', 'ParentescosController@store')->name("parentescos.store");
Route::put('parentescos/{id}', 'ParentescosController@update')->name("parentescos.update");
Route::delete('parentescos/{id}', 'ParentescosController@destroy')->name("parentescos.destroy");


Route::get('nucleos', 'NucleosController@index')->name("nucleos.index");
Route::get('nucleos/{id}', 'NucleosController@show')->name("nucleos.show");
Route::post('nucleos', 'NucleosController@store')->name("nucleos.store");
Route::put('nucleos/{id}', 'NucleosController@update')->name("nucleos.update");
Route::delete('nucleos/{id}', 'NucleosController@destroy')->name("nucleos.destroy");


Route::get('usuariosnucleaos/{id}', 'UsuariosController@getNucleo')->name("usuarios.getNucleo");
Route::get('usuariosnucleaos/{idusuarioppal}/{idusuarionucleo}', 'UsuariosController@getUsuarioNucleo')->name("usuarios.getUsuarioNucleo");
