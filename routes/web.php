<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VipController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/vips', [VipController::class, 'index'])->name('vips');
    Route::get('/vips/create', [VipController::class, 'create'])->name('vips.create');
    Route::post('/vips', [VipController::class, 'store'])->name('vip.store');
    Route::get('/vips/{vip}', [VipController::class, 'show'])->name('vips.show');
    Route::get('/vips/search/{searchKey}', [VipController::class, 'search'])->name('vips.search');
    Route::post('/vips/toggle/{vip}', [VipController::class, 'toggleEnable'])->name('vips.toggleEnable');
});

require __DIR__.'/auth.php';
