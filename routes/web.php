<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
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

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');




Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/siswa', [SiswaController::class, 'siswa'])->name('siswa.index');
Route::get('/kota', [SiswaController::class, 'kota'])->name('kota.index');

Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/store' ,[SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/delete/{id}', [SiswaController::class, 'delete']);
Route::get('/siswa/search', [SiswaController::class, 'search'])->name('siswa.search');


Route::get('/kota/create', [SiswaController::class, 'kotacreate'])->name('kota.create');
Route::post('/kota/store' ,[SiswaController::class, 'kotastore'])->name('kota.store');
Route::get('/kota/edit/{id}', [SiswaController::class, 'kotaedit'])->name('kota.edit');
Route::put('/kota/update/{id}', [SiswaController::class, 'kotaupdate'])->name('kota.update');
Route::get('/kota/delete/{id}', [SiswaController::class, 'kotadelete']);