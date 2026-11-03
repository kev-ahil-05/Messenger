<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PdsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Database\Schema\PostgresSchemaState;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




});

Route::resource('message', MessageController::class);
Route::resource('dashboard',DashboardController::class);
Route::resource('posts',PostController::class);

 
Route::resource('print-file',PdsController::class);

require __DIR__.'/auth.php';

