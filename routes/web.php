<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SendRequestToRasp;
use App\Http\Controllers\SSEController;
use Illuminate\Http\Request;
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

Route::get('/', function ()
{
    return view('welcome');
});

Route::post('/receive-data', [ApiController::class, 'receiveData'])->name('receive-data');
Route::get('/menu/', [MenuController::class, 'show'])->name('menu');
Route::get('/rasp', [SendRequestToRasp::class, 'getUser'])->name('send-request-to-rasp');



