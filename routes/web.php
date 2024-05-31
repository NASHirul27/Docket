<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;    

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('admin/home', [HomeController::class, 'index'])->middleware(['auth', 'admin'])->name('home');

Route::resource('/task', \App\Http\Controllers\TaskController::class)->names([
    'index' => 'task.index',
    'create' => 'task.create',
    'store' => 'task.store',
    'edit' => 'task.edit',
    'update' => 'task.update',
    'destroy' => 'task.destroy',
    'markAsDone' => 'task.markAsDone',
    'history' => 'task.history',
]);

Route::get('/task', [TaskController::class, 'history'])->name('task.history');

Route::post('/task/{id}', [TaskController::class, 'markAsDone'])->name('task.markAsDone');


Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
