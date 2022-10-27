<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\UsuariosController;
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

Auth::routes();

// Route::get("/", function () {
//     return view("home");
// });

// Route::get("/planos", function () {
//     return view("planos");
// });
Route::get("/", [HomeController::class, "index"])->name("home.index");
Route::get("/planos", [HomeController::class, "planos"])->name("home.planos");
Route::get("/mudar/plano/{role}", [HomeController::class, "mudarPlano"])->name("home.mudar.plano");

Route::get("/livro/{livro}", [HomeController::class, "livro"])->name("home.livro");  // ESSE EU IREI FAZER AGORA 

Route::get("/ler/{livro}", [HomeController::class, "showPdf"])->middleware(["auth"])->name("home.showPdf");


Route::prefix("admin")
    ->middleware(["auth"])
    ->group(function(){
        Route::prefix("usuarios")
            ->group(function(){
            Route::get("list", [UsuariosController::class, "index"])->name("admin.usuarios.list");
            Route::get("create", [UsuariosController::class, "internalCreate"])->name("admin.usuarios.create");
            Route::post("create", [UsuariosController::class, "store"])->name("admin.usuarios.store");
            Route::get("edit/{user}", [UsuariosController::class, "edit"])->name("admin.usuarios.edit");
            Route::post("edit/{user}", [UsuariosController::class, "update"])->name("admin.usuarios.update"); // aqui fica update user
            Route::get("delete/{user}", [UsuariosController::class, "destroy"])->name("admin.usuarios.delete");
        });
        Route::prefix("livros")
            ->group(function() {
                Route::get("list", [LivrosController::class, "index"])->name("admin.livros.list");
                Route::get("create", [LivrosController::class, "create"])->name("admin.livros.create");
                Route::post("create", [LivrosController::class, "store"])->name("admin.livros.store");
                Route::get("edit/{livro}", [LivrosController::class, "edit"])->name("admin.livros.edit");

                Route::post("edit/{livro}", [LivrosController::class, "update"])->name("admin.livros.update"); // AQUI UPDATE LIVROS

                Route::get("delete/{livro}", [LivrosController::class, "destroy"])->name("admin.livros.delete");
            });
    });