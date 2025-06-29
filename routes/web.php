<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\FormsController;
use App\Http\Controllers\Publics\AdocaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountabilityController;
use App\Http\Controllers\Publics\AccountabilityController as AccountabilityControllerPublic;

;

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

Route::get('/', [\App\Http\Controllers\Publics\HomeController::class, 'show'])->name('home.show');


Route::get('/adocao/cadastro/{id_pet}', [AdocaoController::class, 'create'])->name('adocao.create');
Route::post('/adocao', [AdocaoController::class, 'store'])->name('adocao.store');

Route::get('/adocao', [AdocaoController::class, 'show'])->name('adocao.show');

Route::prefix('animais')->name('adocao.')->group(function () {
    Route::get('/gatos', [AdocaoController::class, 'showGatos'])->name('gatos.show');
    Route::get('/cachorros', [AdocaoController::class, 'showDogs'])->name('cachorros.show');
});

Route::get('/animal/{id}', [AdocaoController::class, 'index'])->name('adocao.index');

Route::name('public.accountability.')->group(function () {
    Route::get('/transparencia', [AccountabilityControllerPublic::class, 'index'])
        ->name('index');

    Route::get('/transparencia/{entry}', [AccountabilityControllerPublic::class, 'show'])
        ->name('show');
});


Route::get('/apadrinhamento/cadastro/{id_pet}', [\App\Http\Controllers\Publics\ApadrinhamentoController::class, 'create'])->name('apadrinhamento.create');
Route::post('/apadrinhamento', [\App\Http\Controllers\Publics\ApadrinhamentoController::class, 'store'])->name('apadrinhamento.store');

Route::get('/apadrinhamento', [\App\Http\Controllers\Publics\ApadrinhamentoController::class, 'show'])->name('apadrinhamento.show');

Route::view('/sobre-nos', 'publics.sobre-nos.index')->name('sobre-nos.index');
Route::view('/apoia-se', 'publics.apoia-se.index')->name('publics.apoia-se.index');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    //Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    //Route::post('register', [AuthController::class, 'register']);

    Route::middleware(['auth:admin'])->group(function () {

        Route::prefix('users')->name('users.')->middleware('auth:admin')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\UserAdminController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\UserAdminController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\UserAdminController::class, 'store'])->name('store');
            Route::get('/{type}/{id}/edit', [\App\Http\Controllers\Admin\UserAdminController::class, 'edit'])->name('edit');
            Route::put('/{type}/{id}', [\App\Http\Controllers\Admin\UserAdminController::class, 'update'])->name('update');
        });

        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::prefix('animals')->name('animals.')->group(function () {
            Route::get('/', [AnimalController::class, 'index'])->name('index');
            Route::get('/create', [AnimalController::class, 'create'])->name('create');
            Route::post('/create', [AnimalController::class, 'store'])->name('store');

            Route::get('{animal}/edit', [AnimalController::class, 'edit'])->name('edit');

            Route::put('{animal}', [AnimalController::class, 'update'])->name('update');

            Route::delete('{animal}', [AnimalController::class, 'destroy'])->name('destroy');
            Route::patch('{animal}/toggle-status', [AnimalController::class, 'toggleStatus'])->name('admin.animals.toggleStatus');


            Route::prefix('forms')->name('forms.')->group(function () {
                Route::get('/', [FormsController::class, 'index'])->name('index');
                Route::get('/{type}/{id}', [FormsController::class, 'show'])->name('show');
                Route::put('/{type}/{id}/status', [FormsController::class, 'updateStatus'])->name('update-status');
                Route::delete('/{type}/{id}', [FormsController::class, 'destroy'])
                    ->name('destroy');
            });
        });

        Route::get('/notifications', [\App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notifications.index');
        Route::post('/notifications/{notification}/read', [\App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
        Route::post('/notifications/mark-all-read', [\App\Http\Controllers\Admin\NotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');

        Route::prefix('contas')->name('accountability.')->group(function () {
            Route::get('/', [AccountabilityController::class, 'index'])->name('index');
            Route::get('/create', [AccountabilityController::class, 'create'])->name('create');
            Route::post('/', [AccountabilityController::class, 'store'])->name('store');
            Route::get('/{accountability}/edit', [AccountabilityController::class, 'edit'])->name('edit');
            Route::put('/{accountability}', [AccountabilityController::class, 'update'])->name('update');
            Route::delete('/{accountability}', [AccountabilityController::class, 'destroy'])
                ->name('destroy');
        });

        Route::resource('contents', \App\Http\Controllers\Admin\ManageableContentController::class)
            ->except(['create', 'store', 'destroy', 'show'])
            ->names('contents');


    });
});
