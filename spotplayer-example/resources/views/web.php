<?php

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


use App\Http\Controllers\SpotPlayerController;
 
Route::controller(SpotPlayerController::class)->group(function () {
    Route::get('/','play');
});
// use SajedZarinpour\Spotplayer\Facades\SpotPlayer;
// Route::get('/', function () {
//     return SpotPlayer::testSpotPlayerFacadeHealth();
//     // return view('welcome');
// });
