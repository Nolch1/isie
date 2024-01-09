<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SelectedpeopleController;



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
/** User */
Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);
/** Votes */
Route::post('/addVotes', [AuthController::class, 'addVotes']);
/**  */


Route::post('/selectedpeople/{user_id}', [SelectedpeopleController::class, 'addSelectedPerson']);
Route::get('/selectedpeople/{user_id}', [SelectedpeopleController::class, 'getSelectedPeople']);

Route::post('/addNotes', [AuthController::class, 'addNotes']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
