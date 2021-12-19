<?php

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

Route::get('/', [\App\Http\Controllers\TestPsychicController::class, 'index'])->name('home');
Route::group(['middleware' =>['new-session']], function (){
    Route::get('/confirm', [\App\Http\Controllers\TestPsychicController::class, 'confirmThoughtNumber'])->name('confirm.thought.number');
    Route::post('/send-number', [\App\Http\Controllers\TestPsychicController::class, 'sendNumber'])->name('send.number');
});
