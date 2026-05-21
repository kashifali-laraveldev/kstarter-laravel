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

Route::get('admin/permissions', [AdminPermissionsController::class, 'index'])->name('admin.permissions');

Route::get('admin/permission-categories', [AdminPermissionCategoriesController::class, 'index'])->name('admin.permission-categories');

Route::get('admin/roles', [AdminRolesController::class, 'index'])->name('admin.roles');

Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
