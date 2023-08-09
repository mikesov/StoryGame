<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\PagesRouteController;

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
    $pagesRouteController = new PagesRouteController();
    return $pagesRouteController->index();
});
Route::get('/stories', function () {
    $pagesRouteController = new PagesRouteController();
    return $pagesRouteController->stories();
});
Route::get('/account.blade.php', function () {
    $pagesRouteController = new PagesRouteController();
    return $pagesRouteController->account();
});

Route::resource('/users', UserController::class);
