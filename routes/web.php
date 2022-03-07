<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->middleware(['auth'])->name('tasks.index');

Route::post('tasks', [\App\Http\Controllers\TaskController::class, 'store'])->middleware(['auth'])->name('tasks.store');

Route::delete('/tasks/{task}', [\App\Http\Controllers\TaskController::class, 'destroy'])->middleware(['auth'])->name('tasks.destroy');

require __DIR__.'/auth.php';
