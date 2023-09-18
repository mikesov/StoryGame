<?php

use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoryController;
use \App\Http\Controllers\ReadHistoryController;
use \App\Http\Controllers\WordController;
use \App\Http\Controllers\AudioController;
use \App\Http\Controllers\TouchableController;
use \App\Http\Controllers\ImageController;
use \App\Http\Controllers\MovementController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('stories', [StoryController::class, 'index']);
Route::post('stories', [StoryController::class, 'store']);
Route::get('stories/{id}', [StoryController::class, 'show']);
Route::put('stories/{id}/edit', [StoryController::class, 'update']);
Route::delete('stories/{id}/delete', [StoryController::class, 'destroy']);

Route::get('pages', [PageController::class, 'index']);
Route::post('pages', [PageController::class, 'store']);
Route::get('pages/{id}', [PageController::class, 'show']);
Route::put('pages/{id}/edit', [PageController::class, 'update']);
Route::delete('pages/{id}/delete', [PageController::class, 'destroy']);

Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::put('users/{id}/edit', [UserController::class, 'update']);
Route::delete('users/{id}/delete', [UserController::class, 'destroy']);

Route::get('readHistories', [ReadHistoryController::class, 'index']);
Route::post('readHistories', [ReadHistoryController::class, 'store']);
Route::get('readHistories/{id}', [ReadHistoryController::class, 'show']);
Route::put('readHistories/{id}/edit', [ReadHistoryController::class, 'update']);
Route::delete('readHistories/{id}/delete', [ReadHistoryController::class, 'destroy']);

Route::get('words', [WordController::class, 'index']);
Route::post('words', [WordController::class, 'store']);
Route::get('words/{id}', [WordController::class, 'show']);
Route::put('words/{id}/edit', [WordController::class, 'update']);
Route::delete('words/{id}/delete', [WordController::class, 'destroy']);

Route::get('audios', [AudioController::class, 'index']);
Route::post('audios', [AudioController::class, 'store']);
Route::get('audios/{id}', [AudioController::class, 'show']);
Route::put('audios/{id}/edit', [AudioController::class, 'update']);
Route::delete('audios/{id}/delete', [AudioController::class, 'destroy']);

Route::get('touchables', [TouchableController::class, 'index']);
Route::post('touchables', [TouchableController::class, 'store']);
Route::get('touchables/{id}', [TouchableController::class, 'show']);
Route::put('touchables/{id}/edit', [TouchableController::class, 'update']);
Route::delete('touchables/{id}/delete', [TouchableController::class, 'destroy']);

Route::get('audio', [AudioController::class, 'index']);
Route::post('audio', [AudioController::class, 'store']);
Route::get('audio/{id}', [AudioController::class, 'show']);
Route::put('audio/{id}/edit', [AudioController::class, 'update']);
Route::delete('audio/{id}/delete', [AudioController::class, 'destroy']);

Route::get('images', [ImageController::class, 'index']);
Route::post('images', [ImageController::class, 'store']);
Route::get('images/{id}', [ImageController::class, 'show']);
Route::put('images/{id}/edit', [ImageController::class, 'update']);
Route::delete('images/{id}/delete', [ImageController::class, 'destroy']);

Route::get('movements', [MovementController::class, 'index']);
Route::post('movements', [MovementController::class, 'store']);
Route::get('movements/{id}', [MovementController::class, 'show']);
Route::put('movements/{id}/edit', [MovementController::class, 'update']);
Route::delete('movements/{id}/delete', [MovementController::class, 'destroy']);

