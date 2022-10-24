<?php

use Illuminate\Support\Facades\App;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function(){
   
    Route::prefix('usuarios')->group(function(){
        

    });

    Route::prefix('livros')->group(
        function()
        {
            Route::get('list', [\App\Http\Controllers\LivrosController::class, 'index'])->name('admin.livros.list');
            Route::get('create', [\App\Http\Controllers\LivrosController::class, 'create'])->name('admin.livros.create');
            Route::post('create', [\App\Http\Controllers\LivrosController::class, 'store'])->name('admin.livros.store');
        }
    );

});