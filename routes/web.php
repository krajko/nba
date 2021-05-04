<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamsController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TeamsController::class, 'index'])->middleware('verified');
Route::get('/teams/{team}', [TeamsController::class, 'show'])->name('team')->middleware('verified');

Route::post('/teams/{team}/comment', [CommentsController::class, 'store'])->name('comment')->middleware('verified')->middleware('bad');

Route::get('/players', [PlayersController::class, 'index'])->middleware('verified');
Route::get('/players/{player}', [PlayersController::class, 'show'])->name('player')->middleware('verified');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'getRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handle'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/news', [NewsController::class, 'index']);

Route::get('/news/create', [NewsController::class, 'getForm'])->middleware('verified');
Route::post('/news/create', [NewsController::class, 'store'])->middleware('verified');

Route::get('/news/team/{team_name}', [NewsController::class, 'team_news'])->name('team_news');

Route::get('/news/{article}', [NewsController::class, 'show']);


