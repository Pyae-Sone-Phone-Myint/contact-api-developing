<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ContactApiController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchRecordController;
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
        Route::prefix('contact')->controller(ContactApiController::class)->group(function () {
            Route::post('restore/{id}',  'restore');
            Route::post('restore-all',  'restoreAll');
            Route::post('bulk-delete',  'bulkDelete');
            Route::delete('force-delete/{id}',  'forceDelete');
            Route::post('force-delete-all',  'forceDeleteAll');
        });
        Route::get('contact-trash', [ContactApiController::class, 'getTrashedContacts']);



        Route::controller(ApiAuthController::class)->group(function () {
            Route::post("logout", 'logout');
            Route::post("logout-all", 'logoutAll');
            Route::post("devices", 'devices');
        });

        Route::controller(UserController::class)->group(function () {

            Route::get('favorites', 'getFavoriteContacts');
            Route::post('favorite/{id}', 'addFavoriteContact');
            // Route::post('favorite/remove/{id}','removeFavoriteContact');
        });

        Route::controller(SearchRecordController::class)->group(function () {
            Route::post('contact/get-records', 'getRecords');
            Route::delete('contact/delete-records', 'deleteRecords');
        });
    });

    Route::controller(ApiAuthController::class)->group(function () {
        Route::post("register", 'register');
        Route::post("login", 'login');
    });
});
