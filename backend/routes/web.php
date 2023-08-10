<?php

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
Route::get('/stories', function () {
    $pagesRouteController = new PagesRouteController(new PagesRouteRepository());
    return $pagesRouteController->stories();
});
Route::get('/account', function () {
    $pagesRouteController = new PagesRouteController(new PagesRouteRepository());
    return $pagesRouteController->account();
});

Route::resource('/users', UserController::class, [
    'only' => ['index', 'create', 'store', 'show', 'edit', 'destroy'],
    'method' => ['POST', 'GET', 'HEAD', 'PUT', 'PATCH', 'DELETE'],
]);
