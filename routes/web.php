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
Route::get('/registro/libro','LibroController@index');
Route::get('/registro/titulo', 'LibroController@titulofetch')->name('titulo.fetch');
Route::get('/registro/autor', 'LibroController@autorfetch')->name('autor.fetch');
Route::get('/registro/editorial', 'LibroController@editorialfetch')->name('editorial.fetch');
Route::get('/registro/dibujante', 'LibroController@dibujantefetch')->name('dibujante.fetch');
Route::post('/registro_libro', 'LibroController@insertlibro');
Route::post('/registro_product', 'ProductController@insertproducto');
Route::get('/registro/producto','ProductController@index');

Route::get('admin/libros','AdminHomeController@index')->name('home');
Route::get('admin/products','AdminHomeController@index_product')->name('product_index');

Route::get('editar_libro/{id}','LibroController@showedit');
Route::get('eliminar_libro/{id}','LibroController@destroy');
Route::get('eliminar_producto/{id}','ProductController@destroy');
Route::post('/actualizar/update', 'LibroController@update');

Route::get('/view_libro/{id}','LibroController@showlibro');

Route::get('editar_producto/{id}','ProductController@showedit');

Route::post('/actualizar_product', 'ProductController@updateproducto');
Route::get('/view_producto/{id}','ProductController@showproducto');

Route::get('/admin/gallery','AdminHomeController@index_gallery')->name('gallery_index');

Route::get('/registro/gallery','GaleriaController@index');

Route::post('/registro_gallery', 'GaleriaController@insertgaleria');





