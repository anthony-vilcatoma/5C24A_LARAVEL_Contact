<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name("index");


Route::post('/login', [LoginController::class, 'login'])->name("login.index");
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


Route::get('/contactos', [ContactoController::class, 'index'])->name("contactos.index");
Route::get('/contacto/añadir',[ContactoController::class,'create'])->name("contact.create");
Route::get('contactos/{id}',[ContactoController::class, 'edit'])->name("contact.edit");

Route::post('/contact',[ContactoController::class, 'store'])->name("contact.store");
Route::patch('contactos/{id}',[ContactoController::class, 'update'])->name("contact.update");
Route::delete('contactos/{id}',[ContactoController::class, 'destroy'])->name("contact.destroy");
