<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\AppointmentController;


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



Route::get('/appointment', function () {
    return view('appointment');
})->name('appointment');

Route::get('/product', function () {
    return view('product');
})->name('product');




// Frontend routes
Route::get('/brokers', [BrokerController::class, 'index'])->name('brokers.index');




Route::get('/appointment/add/{id}', function ($id) {
    $appointments = session()->get('appointments', []);
    $appointments[] = $id;
    session()->put('appointments', $appointments);
    return redirect()->route('appointment');
})->name('appointment.add');



// Frontend routes
Route::get('/rent', [PropertyController::class, 'index'])->name('rent');

// Admin routes
Route::middleware('auth')->prefix('admin')->group(function () {
    
    Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');



    Route::get('/properties', [PropertyController::class, 'admin'])->name('properties.admin');
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::get('/brokers', [BrokerController::class, 'adminIndex'])->name('brokers.admin');
    Route::get('/brokers/create', [BrokerController::class, 'create'])->name('brokers.create');
    Route::post('/brokers', [BrokerController::class, 'store'])->name('brokers.store');
    Route::get('/brokers/{id}/edit', [BrokerController::class, 'edit'])->name('brokers.edit');
    Route::put('/brokers/{id}', [BrokerController::class, 'update'])->name('brokers.update');
    Route::delete('/brokers/{id}', [BrokerController::class, 'destroy'])->name('brokers.destroy');
});


// Frontend property listing routes
Route::get('/sell', [PropertyController::class, 'createFromFrontend'])->name('properties.sell');
Route::post('/sell', [PropertyController::class, 'storeFromFrontend'])->name('properties.store.frontend');

Route::get('/properties/search', [PropertyController::class, 'search'])->name('api.properties.search');

// Checkout routes
Route::get('/appointment/book', [AppointmentController::class, 'checkout'])->name('appointment.checkout');
Route::post('/appointment/book', [AppointmentController::class, 'processCheckout'])->name('appointment.process');
Route::get('/appointment/thank-you', [AppointmentController::class, 'thankYou'])->name('appointment.thankyou');



