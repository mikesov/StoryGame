<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesRouteController;
use App\Repositories\PagesRouteRepository;

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
    $pagesRouteController = new PagesRouteController(new PagesRouteRepository());
    return $pagesRouteController->index();
});

Route::resource('/stories', StoryController::class);

Route::resource('/users', UserController::class);
