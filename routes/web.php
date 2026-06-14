<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

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




// Ruta para mostrar el formulario de contacto
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

// Ruta para procesar el envío del formulario a WhatsApp
Route::post('/contacto/enviar-whatsapp', [ContactoController::class, 'enviarWhatsApp'])->name('contacto.whatsapp');