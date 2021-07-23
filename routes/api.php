<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function (Router $router) {
    Route::group(['prefix' => 'admin'], function (Router $router) {
        $router->post('sign_in', [Controllers\Admin\AuthController::class, 'signIn']);
        $router->post('sign_up', [Controllers\Admin\AuthController::class, 'signUp']);
    });
});
