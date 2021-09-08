<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/*
Route::middleware(['throttle:uploads', ''])->group(function () {
    Route::post('/tickets/{ticket}/images/{image}',[TicketController::class, '']);
});
*/

Route::middleware(['user'])->group(function () {
    Route::get('users', 'UserController@index');

    Route::get('users/{user}', 'UserController@show');

    Route::post('users/create', 'UserController@store');

    Route::put('users/{user}', 'UserController@update');

    Route::delete('users/{user}', 'UserController@delete');
});

Route::middleware(['ticket'])->group(function () {
    Route::get('tickets', 'TicketController@index');

    Route::get('tickets/{ticket}', 'TicketController@show');

    Route::post('tickets/create', 'TicketController@store');

    Route::put('tickets/{ticket}', 'TicketController@update');

    Route::delete('tickets/{ticket}', 'TicketController@delete');
});

/**
 * Note: User access tokens cann neither be directly created or deleted.
 * Instead, an access token is created "passively" by redeeming a single-use token.
 * The initial token is invalidated and a user token returned to the client.
 */
Route::middleware(['token'])->group(function () {
    # Get the token for the current session
    Route::get('tokens', 'TokenController@session');
    # Ask to redeem the initial token for a full user token (POST request due to sensitivity).
    Route::post('tokens/receive', 'TokenController@receive');
});

Route::get('testing', function () {
    return response("Test");
});
