<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

//Lista Libri
// Route::get('/libri', [BookController::class, 'index'])->name('books.index');
// //Rotta di dettaglio (Parametrica)
// Route::get('/libri/{book}/dettagli', [BookController::class, 'show'])->name('books.show');

// //Form di creazione con create & store
// Route::get('/libri/crea', [BookController::class, 'create'])->name('books.create');
// Route::post('/libri/salva', [BookController::class, 'store'])->name('books.store');
// //Rotte per modificare una risoras
// Route::get('/libri/{book}/modifica', [BookController::class, 'edit'])->name('books.edit');
// Route::put('/libri/{book}', [BookController::class, 'update'])->name('books.update');
// //Rotta di cancellazione
// Route::delete('/libri/{book}', [BookController::class, 'destroy'])->name('books.destroy');

//Route::resource('emanuele', BookController::class);
