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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tickets', [TicketController::class, 'index']);

Route::get('tickets/{ticket}', [TicketController::class, 'show']);

Route::post('tickets/create', [TicketController::class, 'store']);

Route::put('tickets/{ticket}', [TicketController::class, 'update']);

Route::delete('tickets/{ticket}', [TicketController::class, 'delete']);

