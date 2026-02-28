<?php
use Illuminate\Support\Facades\Route;
use Acme\B2BAccount\Http\Controllers\Shop\UserController;
use Acme\B2BAccount\Http\Controllers\Shop\RoleController;

Route::group(['middleware' => ['web', 'theme', 'customer']], function () {
    Route::prefix('customer/account')->group(function () {
        
        // --- Company Users Routes ---
        Route::get('company-users', [UserController::class, 'index'])->name('b2baccount.users.index');
        Route::get('company-users/create', [UserController::class, 'create'])->name('b2baccount.users.create');
        Route::post('company-users/create', [UserController::class, 'store'])->name('b2baccount.users.store'); // <-- This was missing
        Route::get('company-users/edit/{id}', [UserController::class, 'edit'])->name('b2baccount.users.edit');
        Route::put('company-users/edit/{id}', [UserController::class, 'update'])->name('b2baccount.users.update');
        Route::delete('company-users/{id}', [UserController::class, 'destroy'])->name('b2baccount.users.delete');

        // --- Company Roles Routes ---
        Route::get('company-roles', [RoleController::class, 'index'])->name('b2baccount.roles.index');
        Route::get('company-roles/create', [RoleController::class, 'create'])->name('b2baccount.roles.create');
        Route::post('company-roles/create', [RoleController::class, 'store'])->name('b2baccount.roles.store'); // <-- This was missing
        Route::get('company-roles/edit/{id}', [RoleController::class, 'edit'])->name('b2baccount.roles.edit');
        Route::put('company-roles/edit/{id}', [RoleController::class, 'update'])->name('b2baccount.roles.update');
        Route::delete('company-roles/{id}', [RoleController::class, 'destroy'])->name('b2baccount.roles.delete');
        
    });
});