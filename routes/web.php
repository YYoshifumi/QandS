<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AuthController::class, 'idName'])->name('idName');
    Route::get('/forget', [AuthController::class, 'forget'])->name('forget');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/entry', [AuthController::class, 'entry'])->name('entry');
    Route::post('/create', [AuthController::class, 'create'])->name('create');
    Route::post('/', [AuthController::class, 'good'])->name('good');



    Route::group(['prefix' => 'list'], function () {
        Route::get('/', [AuthController::class, 'list'])->name('list');
        Route::get('/{id}', [AuthController::class, 'edit'])->name('edit');
        Route::post('/update', [AuthController::class, 'update'])->name('update');
        Route::post('/delete', [AuthController::class, 'delete'])->name('delete');
    });

    Route::post('/question', [QuestionController::class, 'question'])->name('question');
    Route::post('/Qentry', [QuestionController::class, 'Qentry'])->name('Qentry');
    Route::post('/Qedit', [QuestionController::class, 'Qedit'])->name('Qedit');
    Route::post('/Qupdate', [QuestionController::class, 'Qupdate'])->name('Qupdate');
    Route::post('/Qdelete', [QuestionController::class, 'Qdelete'])->name('Qdelete');


    Route::group(['prefix' => 'response'], function () {
        Route::post('/Rdelete', [ResponseController::class, 'Rdelete'])->name('Rdelete');
        Route::post('/', [ResponseController::class, 'response'])->name('response');
        Route::post('/solution', [AuthController::class, 'solution'])->name('solution');
    });
});
