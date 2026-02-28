<?php
use Illuminate\Support\Facades\Route;
use Acme\B2BAccount\Http\Controllers\Shop\UserController;
use Acme\B2BAccount\Http\Controllers\Shop\RoleController;

Route::group(['middleware' => ['web', 'theme', 'customer']], function () {
    Route::prefix('customer/account')->group(function () {
        Route::get('company-users', [UserController::class, 'index'])->name('b2baccount.users.index');
        Route::get('company-users/create', [UserController::class, 'create'])->name('b2baccount.users.create');
        Route::get('company-roles', [RoleController::class, 'index'])->name('b2baccount.roles.index');
        Route::get('company-roles/create', [RoleController::class, 'create'])->name('b2baccount.roles.create');
    });
});