<?php

use App\Http\Controllers\Admin\Acl\PermissionCategories\AdminPermissionCategoriesController;
use App\Http\Controllers\Admin\Acl\Permissions\AdminPermissionsController;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Acl\Roles\AdminRolesController;
use App\Http\Controllers\Admin\Profile\AdminProfileController;
use App\Http\Controllers\Admin\Acl\Users\AdminUsersController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Front\FrontHomeController;
use Illuminate\Support\Facades\Route;


Route::get('', [FrontHomeController::class, 'index'])->name('front.home');

// Admin guest routes
Route::middleware('KS.Guest')->group(function () {
    Route::get('admin/login',  [AdminLoginController::class, 'loginView'])->name('admin.login.view');
    Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
});

// Logout - auth only, no permission check (user must always be able to log out)
Route::middleware('KS.Auth')->group(function () {
    Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

// Admin protected routes - auth + permission check
Route::middleware(['KS.Auth', 'KS.Admin', 'KS.XSS'])->group(function () {

    // Dashboard
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Users
    Route::get('admin/users',                [AdminUsersController::class, 'index'])->name('admin.users');
    Route::get('admin/users/form/add',       [AdminUsersController::class, 'formAdd'])->name('admin.users.form.add');
    Route::get('admin/users/form/edit/{id}', [AdminUsersController::class, 'formEdit'])->name('admin.users.form.edit');
    Route::post('admin/users/store',         [AdminUsersController::class, 'store'])->name('admin.users.store');
    Route::post('admin/users/update/{id}',   [AdminUsersController::class, 'update'])->name('admin.users.update');
    Route::post('admin/users/delete/{id}',        [AdminUsersController::class, 'delete'])->name('admin.users.delete');
    Route::post('admin/users/toggle-status/{id}', [AdminUsersController::class, 'toggleStatus'])->name('admin.users.toggle-status');

    // Roles
    Route::get('admin/roles',              [AdminRolesController::class, 'index'])->name('admin.roles');
    Route::get('admin/roles/create',       [AdminRolesController::class, 'create'])->name('admin.roles.create');
    Route::get('admin/roles/edit/{id}',    [AdminRolesController::class, 'edit'])->name('admin.roles.edit');
    Route::get('admin/roles/form/add',     [AdminRolesController::class, 'formAdd'])->name('admin.roles.form.add');
    Route::post('admin/roles/store',       [AdminRolesController::class, 'store'])->name('admin.roles.store');
    Route::post('admin/roles/update/{id}', [AdminRolesController::class, 'update'])->name('admin.roles.update');
    Route::post('admin/roles/delete/{id}', [AdminRolesController::class, 'delete'])->name('admin.roles.delete');

    // Permissions
    Route::get('admin/permissions',                [AdminPermissionsController::class, 'index'])->name('admin.permissions');
    Route::get('admin/permissions/create',         [AdminPermissionsController::class, 'create'])->name('admin.permissions.create');
    Route::get('admin/permissions/form/add',       [AdminPermissionsController::class, 'formAdd'])->name('admin.permissions.form.add');
    Route::get('admin/permissions/form/edit/{id}', [AdminPermissionsController::class, 'formEdit'])->name('admin.permissions.form.edit');
    Route::post('admin/permissions/store',         [AdminPermissionsController::class, 'store'])->name('admin.permissions.store');
    Route::post('admin/permissions/update/{id}',   [AdminPermissionsController::class, 'update'])->name('admin.permissions.update');
    Route::post('admin/permissions/delete/{id}',   [AdminPermissionsController::class, 'delete'])->name('admin.permissions.delete');

    // Permission Categories
    Route::get('admin/permission-categories',                [AdminPermissionCategoriesController::class, 'index'])->name('admin.permission-categories');
    Route::get('admin/permission-categories/create',         [AdminPermissionCategoriesController::class, 'create'])->name('admin.permission-categories.create');
    Route::get('admin/permission-categories/form/add',       [AdminPermissionCategoriesController::class, 'formAdd'])->name('admin.permission-categories.form.add');
    Route::get('admin/permission-categories/form/edit/{id}', [AdminPermissionCategoriesController::class, 'formEdit'])->name('admin.permission-categories.form.edit');
    Route::post('admin/permission-categories/store',         [AdminPermissionCategoriesController::class, 'store'])->name('admin.permission-categories.store');
    Route::post('admin/permission-categories/update/{id}',   [AdminPermissionCategoriesController::class, 'update'])->name('admin.permission-categories.update');
    Route::post('admin/permission-categories/delete/{id}',   [AdminPermissionCategoriesController::class, 'delete'])->name('admin.permission-categories.delete');
    Route::post('admin/permission-categories/order/{id}',    [AdminPermissionCategoriesController::class, 'updateOrder'])->name('admin.permission-categories.order');

    // Profile
    Route::get('admin/profile',                  [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('admin/profile/update',          [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::post('admin/profile/change-password', [AdminProfileController::class, 'changePassword'])->name('admin.profile.change-password');
});
