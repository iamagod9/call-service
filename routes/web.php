<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('users')->as('users.')->group(function () {
    Route::get('/list', [UserController::class, 'index'])
        ->name('index')
        ->middleware(CheckRole::class);
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/create', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth')->prefix('profile')->as('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
});

Route::middleware('auth')->prefix('records')->as('records.')->group(function () {
    Route::get('/', [RecordController::class, 'index'])->name('index');
    Route::get('/list', [RecordController::class, 'show'])->name('show');
    Route::get('/stream', [RecordController::class, 'stream'])->name('stream');
    Route::post('/download', [RecordController::class, 'download'])->name('download');
});

Route::middleware('auth')->prefix('divisions')->as('divisions.')->group(function () {
    Route::get('/list', [DivisionController::class, 'index'])->name('index');
    Route::get('/create', [DivisionController::class, 'create'])->name('create');
    Route::post('/create', [DivisionController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DivisionController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [DivisionController::class, 'update'])->name('update');
    Route::delete('/{id}', [DivisionController::class, 'destroy'])->name('destroy');
});

require __DIR__ . '/auth.php';
