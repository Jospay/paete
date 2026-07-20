<?php

use App\Enums\PermissionEnum;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Auth\RegistrationValidationController;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function (): void {
        // --- Staff ---
        Route::resource('staff', StaffController::class)
            ->only(['create', 'store'])
            ->parameters(['staff' => 'staff'])
            ->middleware('permission:' . PermissionEnum::STAFF_CREATE->value);

        Route::resource('staff', StaffController::class)
            ->only(['edit', 'update'])
            ->parameters(['staff' => 'staff'])
            ->middleware('permission:' . PermissionEnum::STAFF_UPDATE->value);

        Route::resource('staff', StaffController::class)
            ->only(['index', 'show'])
            ->parameters(['staff' => 'staff'])
            ->middleware('permission:' . PermissionEnum::STAFF_VIEW->value);

        Route::resource('staff', StaffController::class)
            ->only(['destroy'])
            ->parameters(['staff' => 'staff'])
            ->middleware('permission:' . PermissionEnum::STAFF_DEACTIVATE->value);


        // --- Customers ---
        Route::resource('customers', CustomerController::class)
            ->only(['index', 'show'])
            ->parameters(['customers' => 'customer'])
            ->middleware('permission:' . PermissionEnum::CUSTOMERS_VIEW->value);

        Route::resource('customers', CustomerController::class)
            ->only(['edit', 'update'])
            ->parameters(['customers' => 'customer'])
            ->middleware('permission:' . PermissionEnum::CUSTOMERS_UPDATE->value);


        Route::resource('customers', CustomerController::class)
            ->only(['destroy'])
            ->parameters(['customers' => 'customer'])
            ->middleware('permission:' . PermissionEnum::CUSTOMERS_BLACKLIST->value);
    });
});

Route::post('register/validate', RegistrationValidationController::class)
    ->middleware(['guest', HandlePrecognitiveRequests::class])
    ->name('register.validate');

require __DIR__ . '/settings.php';
