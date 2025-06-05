<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AgentAIController;
use App\Http\Controllers\OllamaAIController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\GuestReservationController;
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

Route::resource('hotels', HotelController::class);
Route::resource('rooms', RoomController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/bookings/create/{room}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});

Route::post('/ai/ask', [AgentAIController::class, 'ask'])->name('ai.ask');
Route::view('/ai', 'ai');
Route::post('/ask-ollama', [OllamaAIController::class, 'ask'])->name('ollama.ask');

Route::get('/reserve', [ReservationController::class, 'create'])->name('reserve.create');
Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store');
Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::resource('reservations', ReservationController::class)->except(['create', 'store', 'show']);

Route::get('/reserve', [GuestReservationController::class, 'create'])->name('reservations.create');
Route::post('/reserve', [GuestReservationController::class, 'store'])->name('reservations.store');

Route::get('/admin/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
Route::put('/admin/reservations/{id}', [ReservationController::class, 'update'])->name('admin.reservations.update');
Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::put('/admin/reservations/{id}', [ReservationController::class, 'update'])->name('admin.reservations.update');
    Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::put('/admin/reservations/{id}', [ReservationController::class, 'update'])->name('admin.reservations.update');
    Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware(['auth', 'admin']);

require __DIR__.'/auth.php';
