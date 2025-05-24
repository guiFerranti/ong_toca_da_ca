<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AuthController;
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
    return view('welcome');
});

Route::get('/', [\App\Http\Controllers\Publics\HomeController::class, 'show'])->name('home.show');


Route::get('/adocao/cadastro/{id_pet}', [\App\Http\Controllers\Publics\AdocaoController::class, 'create'])->name('adocao.create');
Route::post('/adocao', [\App\Http\Controllers\Publics\AdocaoController::class, 'store'])->name('adocao.store');

Route::get('/adocao', [\App\Http\Controllers\Publics\AdocaoController::class, 'show'])->name('adocao.show');

Route::get('/apadrinhamento/cadastro/{id_pet}', [\App\Http\Controllers\Publics\ApadrinhamentoController::class, 'create'])->name('apadrinhamento.create');
Route::post('/apadrinhamento', [\App\Http\Controllers\Publics\ApadrinhamentoController::class, 'store'])->name('apadrinhamento.store');

Route::get('/apadrinhamento', [\App\Http\Controllers\Publics\ApadrinhamentoController::class, 'show'])->name('apadrinhamento.show');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);

    Route::middleware(['auth:admin'])->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::prefix('animals')->name('animals.')->group(function () {
            Route::get('/', [AnimalController::class, 'index'])->name('index');
            Route::get('/create', [AnimalController::class, 'create'])->name('create');
            Route::post('/create', [AnimalController::class, 'store'])->name('store');

            Route::get('{animal}/edit', [AnimalController::class, 'edit'])->name('edit');

            Route::put('{animal}', [AnimalController::class, 'update'])->name('update');

            Route::delete('{animal}', [AnimalController::class, 'destroy'])->name('destroy');
        });
    });
});
