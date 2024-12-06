<?php

use App\Http\Controllers\PruebaController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\CatalogController;

use App\Http\Controllers\TrainerController;

use App\Http\Controllers\PDFController;

use App\Http\Controllers\Api\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mi_primer_ruta',function(){
    return 'Hola Michelle';
});

Route::get('/name/{name}', function($name){
    return 'hola soy ' .$name;
});

Route::get('/name/{name}/lastname/{apellido?}', function($name, $apellido = '') {
    return 'Hola soy ' . $name . ' ' . $apellido;
});


Route::get('/name/{name}/lastname/{apellido?}', function($name, $apellido = null) {
    return 'Hola soy ' . $name . ' ' . $apellido;
});

Route::get('/name/{name}/lastname/{apellido?}', function($name, $apellido = 'apellido') {
    return 'Hola soy ' . $name . ' ' . $apellido;
});

Route::get('/sumar/{a}/{b}', function($a, $b) {
    $resultado = $a + $b;
    return 'La suma de ' . $a . ' y ' . $b . ' es: ' . $resultado;
});

Route::get('/name/{name}/lastname/{apellido?}', function($name, $apellido = 'apellido') {
    return 'Hola soy ' . $name . ' ' . $apellido;
});

//LOGIN
Route::get('/login', function() {
    return 'Login usuario';
});

//LOGOUT
Route::get('/logout', function() {
    return 'Logout usuario';
});

//CATALOG
Route::get('/catalog', function() {
    return 'Listado de peliculas';
});

// CATALOG CHIDO
Route::get('/catalog/show/{id}', function($id) {
    return 'Vista detalle película ' . $id;
});

//Crear
Route::get('/catalog/create', function() {
    return 'Añadir película';
});

//mostrar
Route::get('/catalog/edit/{id}', function($id) {
    return 'Modificar película: ' . $id;
});

//Ejercicio

Route::get('/login', function () {
    return view('login');
});

//Route::get('rutaprueba','PruebaController@prueba2');
 
Route::get('/rutaprueba',[PruebaController::class , 'prueba2']);

//-----------------------------------------Ejercicio 2----------------------------------------------------------

//Crear

Route::get('/', [HomeController::class, 'index']);


Route::get('/catalog/show/{id}', [CatalogController::class, 'show']);

Route::get('/catalog/create', [CatalogController::class, '']);

Route::get('/catalog/edit/{id}', [CatalogController::class, '']);


// Ejercicio

Route::resource('trainers', 'App\Http\Controllers\TrainerController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('delete/{id}', [TrainerController::class, 'destroy']);
Route::get('edit/{id}', [TrainerController::class, 'edit']);
Route::put('/trainers/{id}', [TrainerController::class, 'update'])->name('trainers.update');

Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate.pdf');


Route::get('/', [SearchController::class, 'search'])->name('trainers.search');
Route::get('api/search', [SearchController::class, 'search']);

