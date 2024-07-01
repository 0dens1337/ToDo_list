<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.updateAvatar');
    Route::get('/change-password', [NewPasswordController::class, 'create'])->name('password.change');
    Route::post('/change-password', [NewPasswordController::class, 'store'])->name('password.change.post');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('folders', FolderController::class);
    Route::post('/folders/{folder}/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::resource('tasks', TaskController::class);
});


Route::get('/', function () {
    return view('main.home');
})->name('home');

Route::get('/about', function () {
    return view('main.about');
})->name('about');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


require __DIR__.'/auth.php';
