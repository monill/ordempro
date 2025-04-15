<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');//->middleware(['auth', 'verified']);


Route::resource('brands', BrandController::class)->except('show')->names('brands');
Route::resource('genders', GenderController::class)->except('show')->names('genders');
Route::resource('languages', LanguageController::class)->except('show')->names('languages');
Route::resource('units', UnitController::class)->except('show')->names('units');
Route::resource('warehouses', WarehouseController::class)->except('show')->names('warehouses');


// Clientes
Route::prefix('customers')->name('customers.')->group(function () {
    Route::get('/', [PartnerController::class, 'index'])->name('index')->defaults('type', 'customer');
    Route::get('/create', [PartnerController::class, 'create'])->name('create')->defaults('type', 'customer');
    Route::post('/', [PartnerController::class, 'store'])->name('store')->defaults('type', 'customer');
    Route::get('/{partner}/edit', [PartnerController::class, 'edit'])->name('edit')->defaults('type', 'customer');
    Route::put('/{partner}', [PartnerController::class, 'update'])->name('update')->defaults('type', 'customer');
    Route::delete('/{partner}', [PartnerController::class, 'destroy'])->name('destroy')->defaults('type', 'customer');
});

// Fornecedores
Route::prefix('suppliers')->name('suppliers.')->group(function () {
    Route::get('/', [PartnerController::class, 'index'])->name('index')->defaults('type', 'supplier');
    Route::get('/create', [PartnerController::class, 'create'])->name('create')->defaults('type', 'supplier');
    Route::post('/', [PartnerController::class, 'store'])->name('store')->defaults('type', 'supplier');
    Route::get('/{partner}/edit', [PartnerController::class, 'edit'])->name('edit')->defaults('type', 'supplier');
    Route::put('/{partner}', [PartnerController::class, 'update'])->name('update')->defaults('type', 'supplier');
    Route::delete('/{partner}', [PartnerController::class, 'destroy'])->name('destroy')->defaults('type', 'supplier');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
