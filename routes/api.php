<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::Get('contacts', [ContactController::class, 'contacts']);
Route::get('get_contact/{id}', [ContactController::class, 'getContact']);
Route::post('save_contact', [ContactController::class, 'SaveContact']);
Route::delete('delete_contact/{id}', [ContactController::class, 'deleteContact']);
Route::post('update_contact/{id}', [ContactController::class, 'updateContact']);
