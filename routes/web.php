<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'getRegister'])->name('get.register');

    Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');

    Route::get('/generate-temp-password', function () {
        return Hash::make(12345678);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('get.dashboard');

    Route::get('/user/add', [DashboardController::class, 'getAddUser'])->name('get.add.user');
    Route::get('/users/list', [DashboardController::class, 'getListUser'])->name('get.list.users');

    Route::get('/add-project', [ProjectController::class, 'getAddProject'])->name('get.add.project');
    Route::get('/edit-project/{id}', [ProjectController::class, 'getEditProject'])->name('get.edit.project');
    Route::get('/add-task/{id}', [TaskController::class, 'addTask'])->name('add.task');
    Route::get('/show-tasks/{id}', [TaskController::class, 'showTask'])->name('show.task');
    Route::get('/tasks-logs/{id}', [TaskController::class, 'showTaskActivityLog'])->name('show.task.activity.log');

    Route::get('/logout', [AuthController::class, 'getLogout'])->name('get.logout');
});
