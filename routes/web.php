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

Route::get('admin/login', [AdminLoginController::class, 'loginView'])->name('admin.login.view');

Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::get('admin/users', [AdminUsersController::class, 'index'])->name('admin.users');
Route::get('admin/users/form/add', [AdminUsersController::class, 'formAdd'])->name('admin.users.form.add');
Route::get('admin/users/form/edit/{id}', [AdminUsersController::class, 'formEdit'])->name('admin.users.form.edit');

Route::get('admin/roles', [AdminRolesController::class, 'index'])->name('admin.roles');
Route::get('admin/roles/create', [AdminRolesController::class, 'create'])->name('admin.roles.create');
Route::get('admin/roles/{id}/edit', [AdminRolesController::class, 'edit'])->name('admin.roles.edit');
Route::get('admin/roles/form/add', [AdminRolesController::class, 'formAdd'])->name('admin.roles.form.add');

Route::get('admin/permissions', [AdminPermissionsController::class, 'index'])->name('admin.permissions');
Route::get('admin/permissions/create', [AdminPermissionsController::class, 'create'])->name('admin.permissions.create');
Route::get('admin/permissions/form/add', [AdminPermissionsController::class, 'formAdd'])->name('admin.permissions.form.add');
Route::get('admin/permissions/form/edit/{id}', [AdminPermissionsController::class, 'formEdit'])->name('admin.permissions.form.edit');

Route::get('admin/permission-categories', [AdminPermissionCategoriesController::class, 'index'])->name('admin.permission-categories');
Route::get('admin/permission-categories/create', [AdminPermissionCategoriesController::class, 'create'])->name('admin.permission-categories.create');
Route::get('admin/permission-categories/form/add', [AdminPermissionCategoriesController::class, 'formAdd'])->name('admin.permission-categories.form.add');
Route::get('admin/permission-categories/form/edit/{id}', [AdminPermissionCategoriesController::class, 'formEdit'])->name('admin.permission-categories.form.edit');

Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');

