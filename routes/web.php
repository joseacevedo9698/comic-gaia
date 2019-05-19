<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin','Auth\LoginController@showLoginForm')->middleware('guest');

Route::get('/', 'IndexController@index')->name('Index');

Route::get('admin/new_user', 'UsuarioController@register');

Route::post('login', 'Auth\LoginController@login' )->name('login');
Route::post('logout', 'Auth\LoginController@logout' )->name('logout');
Route::post('/signup', 'UsuarioController@signup')->name('create_user');
Route::get('/registro','LibroController@index');
Route::get('/registro/titulo', 'LibroController@titulofetch')->name('titulo.fetch');
Route::get('/registro/autor', 'LibroController@autorfetch')->name('autor.fetch');
Route::get('/registro/editorial', 'LibroController@editorialfetch')->name('editorial.fetch');
Route::get('/registro/dibujante', 'LibroController@dibujantefetch')->name('dibujante.fetch');
Route::post('/registro/insertion', 'LibroController@insertlibro');
Route::get('admin/libros','AdminHomeController@index')->name('home');
Route::get('editar_libro/{id}','LibroController@showedit');
Route::get('eliminar_libro/{id}','LibroController@destroy');
Route::post('/actualizar/update', 'LibroController@update');

Route::get('/view_libro', function() {
    return view('libros_view');
});

Route::get('/prueba', function() {
    return view('prueba_nuevo');
});





