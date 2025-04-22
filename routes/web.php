<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('email-form');
});

Route::post('/send-email', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('send.email');
