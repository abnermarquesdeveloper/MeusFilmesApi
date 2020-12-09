<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function(Request $request){
    return "TESTE OK...!!!";
});

Route::get('/filmes', [FilmesController::class, 'all']);

Route::get('/filme/{id}', [FilmesController::class, 'findOne']);

Route::post('/filme', [FilmesController::class, 'new']);

Route::put('/filme/{id}', [FilmesController::class, 'edit']);


