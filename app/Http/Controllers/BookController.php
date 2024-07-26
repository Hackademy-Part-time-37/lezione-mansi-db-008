<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        //$books = ['dafsd', 'fsfsd'];
        $books = Book::all(); //Ottiene tutto i dati della collezione

        return view('index', ['books' => $books]);
    }

    public function store()
    {
        //$books = ['dafsd', 'fsfsd','dfffd'];
        Book::create(['name' => 'Aulab d']); //Inserisce nella tabella i dati

        return redirect()->route('index');
    }
}
