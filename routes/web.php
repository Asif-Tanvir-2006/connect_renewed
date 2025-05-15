<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomTableController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/custom-table', [CustomTableController::class, 'store']);
Route::post('/loginvalidate', [CustomTableController::class, 'login']);
Route::get('send-mail', function () {
    $details = [
        'title' => 'Success',
        'content' => 'This is an email testing using Laravel-Brevo',
    ];
   
    \Mail::to('asiftanvir2006@gmail.com')->send(new \App\Mail\TestMail($details));
   
    return 'Email sent at ' . now();
});