<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

//Lista Libri
Route::get('/libri', [BookController::class, 'index'])->name('books.index');
//Form di creazione con create & store
Route::get('/libri/crea', [BookController::class, 'create'])->name('books.create');
Route::post('/libri/salva', [BookController::class, 'store'])->name('books.store');
//Rotta di dettaglio (Parametrica)
Route::get('/libri/{book}/dettagli', [BookController::class, 'show'])->name('books.show');
