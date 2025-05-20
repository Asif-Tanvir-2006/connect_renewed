<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomTableController;
use App\Http\Controllers\TestMail;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/resetpwd', function () {
    return view('resetpwd');
});
Route::get('/setpwd', [CustomTableController::class, 'showResetPwdForm']);
Route::post('/register/forgotpwd', [CustomTableController::class, 'forgotPwd']);
Route::post('/register/setnewpwd', [CustomTableController::class, 'setPwd']);

Route::get('/send-test-mail', [TestMail::class, 'sendMail']);
Route::post('/register/send-otp', [CustomTableController::class, 'sendOtp']);
Route::post('/register/verify-otp', [CustomTableController::class, 'verifyOtp']);
Route::post('/login', [CustomTableController::class, 'login']);