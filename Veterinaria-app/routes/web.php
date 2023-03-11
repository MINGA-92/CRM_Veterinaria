
<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('ListadoClientes');
});

Route::get('/NuevoCliente', function () {
    return view('CrearCliente');
});

Route::get('/Mascotas', function () {
    return view('ListadoMascotas');
});

Route::get('/Cerrar', function () {
    return view('Logout');
});

Route::post('/', function () {
    return view('ListadoClientes');
});

/*
Route::match(['get', 'post'], 'ListadoClientes', function () {
    return request('search');
});*/

?>