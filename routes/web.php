<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OAuthController;

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
    return view('welcome');
});
Route::get('/mypage', function () {
    return view('mypage.index');
});
Route::get('/login/{social}', [OAuthController::class, 'redirectToProvider'])->name('line.login');
Route::get('/login/{social}/callback', [OAuthController::class, 'handleProviderCallback']);
