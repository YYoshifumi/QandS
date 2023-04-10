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

Route::get('/', [AuthController::class, 'ShowLogin'])->name('ShowLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/forget', [AuthController::class, 'forget'])->name('forget');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/Top', [AuthController::class, 'top'])->name('Top');
Route::get('/Question', [QuestionController::class, 'question'])->name('Question');
Route::get('/Entry', [UserController::class, 'entry'])->name('Entry');
Route::get('/List', [UserController::class, 'list'])->name('List');