<?php

use App\Http\Controllers\FriendListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserAllController;
use App\Models\FriendList;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [LoginController::class, 'store']);

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);

Route::get('/payment', [PaymentController::class, 'show']);
Route::put('/payment', [PaymentController::class, 'store']);

Route::get('/topup', [PaymentController::class, 'topupPage']);
Route::put('/topup', [PaymentController::class, 'topup']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [UserAllController::class, 'index']);

Route::get('/home/{locale?}', [UserAllController::class, 'index']);

Route::get('/list', [FriendListController::class, 'index']);

Route::get('/list/{locale?}', [FriendListController::class, 'index']);

Route::get('/add-friend/{friend_id}', [FriendListController::class, 'store'])->middleware('CheckUser');

Route::get('/delete-friend/{friend_id}', [FriendListController::class, 'delete'])->middleware('CheckUser');
