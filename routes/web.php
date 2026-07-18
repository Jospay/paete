<?php

use App\Enums\PermissionEnum;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegistrationValidationController;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function (): void {
        Route::resource('users', UserController::class)
            ->only(['index', 'show'])
            ->middleware('permission:' . PermissionEnum::STAFF_VIEW->value);

        Route::resource('users', UserController::class)
            ->only(['create', 'store'])
            ->middleware('permission:' . PermissionEnum::STAFF_CREATE->value);

        Route::resource('users', UserController::class)
            ->only(['edit', 'update'])
            ->middleware('permission:' . PermissionEnum::STAFF_UPDATE->value);

        Route::resource('users', UserController::class)
            ->only(['destroy'])
            ->middleware('permission:' . PermissionEnum::STAFF_DEACTIVATE->value);
    });
});

Route::post('register/validate', RegistrationValidationController::class)
    ->middleware(['guest', HandlePrecognitiveRequests::class])
    ->name('register.validate');

require __DIR__ . '/settings.php';
