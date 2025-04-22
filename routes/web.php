<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('email-form');
});

Route::post('/send-email', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('send.email');

Route::get('/history', [App\Http\Controllers\EmailController::class, 'history'])->name('message.history');

Route::post('/history/delete/{index}', [App\Http\Controllers\EmailController::class, 'deleteMessage'])->name('message.delete');
