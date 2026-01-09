<?php

use App\Http\Controllers\EntidadController;
use Illuminate\Support\Facades\Route;
use App\Models\Entidad;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('entidades', EntidadController::class);

Route::get('/entidades-test', function () {
    return Entidad::all();
});