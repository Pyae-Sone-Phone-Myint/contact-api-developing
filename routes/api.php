<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ContactApiController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AcceptJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('v1')->middleware(AcceptJson::class)->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('contact', ContactApiController::class);
        Route::controller(ApiAuthController::class)->group(function () {
            Route::post("logout", 'logout');
            Route::post("logout-all", 'logoutAll');
            Route::post("devices", 'devices');
        });
        Route::get('favorites', [UserController::class, 'getFavoriteContacts']);
        Route::post('favorite/add/{id}', [UserController::class, 'addFavoriteContacts']);
    });

    Route::post("register", [ApiAuthController::class, 'register']);
    Route::post("login", [ApiAuthController::class, 'login']);
});
