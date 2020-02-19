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
use App\Mail\Welcome as WelcomeEmail; // Asignamos alias a la clase Welcome
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;    

Route::get('/', function () {
    return view('welcome');
});


// Creamos una nueva ruta 
Route::get('welcome', function () {
    $user = new \App\User([
        'name'  => 'Juan Camilo Valdes B.',
        'email' => 'bolivar014@gmail.com',
    ]);

    Mail::to( $user->email, $user->name )   // destinatario del mensaje 
        ->cc('cc@example.com')              // Enviar copia del correo
        ->bcc('cc@example.com')             // Enviar copia oculta del correo
        ->send(new WelcomeEmail($user));
    // Ruta del mensaje a enviar
   
});