<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\HomeController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes protégées (b l'authentification)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('goals', GoalController::class);
});

Route::get('/profile', function () {
    return view('profile.edit');
})->middleware(['auth'])->name('profile.edit');

Route::middleware(['auth'])->group(function () {
    Route::resource('transactions', TransactionController::class);
});


Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

// Ajoute ces routes dans ton fichier web.php
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::view('/dashboard', 'dashboard')->name('dashboard');
use App\Models\Transaction;
Route::get('/dashboard', function() {

    $transactions = Transaction::with('category')
        ->orderBy('date', 'desc')
        ->paginate(10);
        
    return view('dashboard', ['transactions' => $transactions]);
})->name('dashboard');

use App\Http\Controllers\GraphiqueController;

Route::get('/graphique', [GraphiqueController::class, 'index'])->name('graphique');


use App\Http\Controllers\ProfileController;


// routes/web.php
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // Add this
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Auth (Breeze)
require __DIR__.'/auth.php';
