<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\adduserController;
use App\Http\Controllers\expensesController;
use App\Http\Controllers\addSiteController;
use App\Http\Controllers\addDataController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';







Route::resource('admin/user', addUserController::class);
Route::resource('admin/expenses', expensesController::class);
Route::resource('admin/site', addSiteController::class);
Route::resource('admin/data', addDataController::class);
Route::resource('admin/transaction', TransactionController::class);
Route::get('/export-transactions', [TransactionController::class, 'export'])->name('export.transactions');

