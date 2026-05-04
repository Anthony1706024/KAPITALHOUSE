<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

Route::get('/beneficios', function () {
    return view('beneficios');
})->name('beneficios');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');