<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Front\FrontHomeController;
use Illuminate\Support\Facades\Route;

Route::get('', [FrontHomeController::class, 'index'])->name('front.home');

Route::get('admin/login', [AdminLoginController::class, 'loginView'])->name('admin.login.view');
