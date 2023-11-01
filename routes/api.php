<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
  

// Passport
Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('register', [AuthController::class, 'register'])->name('api.register');
    Route::post('login', [AuthController::class, 'login'])->name('api.login');
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout.api');
        // // Contact
        Route::get('/contact', [ContactController::class, 'index'])->name('api.contact.index');
        Route::get('/contact/{id}', [ContactController::class, 'show'])->name('api.contact.show');
        Route::post('/contact', [ContactController::class, 'store'])->name('api.contact.store');
        Route::put('/contact/{id}', [ContactController::class, 'update'])->name('api.contact.update');
        Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('api.contact.destroy');
    });
});