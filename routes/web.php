<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return Redirect::to( '/login');
// });

Route::redirect('/', '/login');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/produtos', 'ProdutosController@list')->name('produtos');
Route::middleware(['auth:sanctum', 'verified'])->get('/produto', 'ProdutosController@create')->name('produto');
Route::middleware(['auth:sanctum', 'verified'])->post('/produto', 'ProdutosController@store')->name('produto');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-produto/{id}', 'ProdutosController@edit')->name('edit-produto');
Route::middleware(['auth:sanctum', 'verified'])->post('/edit-produto/{id}', 'ProdutosController@update')->name('edit-produto');

Route::middleware(['auth:sanctum', 'verified'])->get('/clientes', 'ClientesController@list')->name('clientes');
Route::middleware(['auth:sanctum', 'verified'])->get('/cliente', 'ClientesController@create')->name('cliente');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-cliente/{id}', 'ClientesController@edit')->name('edit-cliente');


