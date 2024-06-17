<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'register'])
        ->name('register');

    Route::post('register', [RegisterController::class, 'attempt']);

    Route::get('login', [LoginController::class, 'login'])
        ->name('login');

    Route::post('login', [LoginController::class, 'attempt']);

    Route::get('forgot-password', [ForgotPasswordController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [PasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [PasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware('verified')
        ->name('dashboard');

    Route::get('verify-email', [VerifyEmailController::class, 'verify'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, 'attempt'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])
        ->name('password.update');

    Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    //DO NOT REMOVE THIS LINE//
});
