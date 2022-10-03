<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResController;
use App\Mail\ConsultantMail;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if(Auth::check()){
        switch (Auth::user()->role_id) {
            case 1: return redirect('/admin');break;
            default: return redirect('/user'); break;
        }
    }
    return redirect('/login');
});

Route::middleware(['auth:web','checkadmin'])->group(function () {
    //Skills Part

    Route::get('/admin', [App\Http\Controllers\ResController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\ResController::class, 'data'])->name('data');
    Route::get('/consul', [App\Http\Controllers\ResController::class, 'listconsultant'])->name('listconsultant');
    Route::post('/save', [App\Http\Controllers\ResController::class, 'Save'])->name('Save');
    Route::get('/edit', [App\Http\Controllers\ResController::class, 'edit'])->name('edit');
    Route::post('/edit', [App\Http\Controllers\ResController::class, 'update'])->name('update');
    Route::get('/consultant', [App\Http\Controllers\ResController::class, 'cons'])->name('cons');
    Route::post('/consultant', [App\Http\Controllers\ResController::class, 'store'])->name('store');
    Route::post('/valide', [App\Http\Controllers\ResController::class, 'validation'])->name('validation');
    Route::post('/notification',[App\Http\Controllers\ResController::class, 'notification'])->name('notification');

    //Mailing
    Route::post('/email', [ResController::class, 'email'])->name('email');

    //Auth Part
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
Route::middleware(['auth:web','checkuser'])->group(function () {
 //Encg Part
    Route::get('/user', [App\Http\Controllers\EncgController::class, 'accueil'])->name('accueil');
    Route::get('/Ajoute', [App\Http\Controllers\EncgController::class, 'transfer'])->name('transfer');
    Route::get('/Modifier', [App\Http\Controllers\EncgController::class, 'modifier'])->name('modifier');
    Route::post('/Modifier', [App\Http\Controllers\EncgController::class, 'ajour'])->name('ajour');
    Route::post('/ajoute', [App\Http\Controllers\ResController::class, 'ajoute'])->name('ajoute');
});

Auth::routes();
