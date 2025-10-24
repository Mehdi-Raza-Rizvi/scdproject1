<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/rent', function () {
    return view('rent');
})->name('rent');

Route::get('/sell', function () {
    return view('sell');
})->name('sell');

Route::get('/appointment', function () {
    return view('appointment');
})->name('appointment');

Route::get('/appointment/add/{id}', function ($id) {
    $appointments = session()->get('appointments', []);
    $appointments[] = $id;
    session()->put('appointments', $appointments);
    return redirect()->route('appointment');
})->name('appointment.add');
