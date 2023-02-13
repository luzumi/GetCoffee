<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SendRequestToRasp;
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
Route::get('reset-user-id', [ApiController::class, 'resetUserId'])->name('reset-user-id');
Route::get('turn_on', [ApiController::class, 'turn_on'])->name('turn_on');
Route::get('turn_off', [ApiController::class, 'turn_off'])->name('turn_off');

Route::middleware(['cors'])->group(function () {
    Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu');
    Route::get('/rasp', [SendRequestToRasp::class, 'getUser'])->name('send-request-to-rasp');
});;



