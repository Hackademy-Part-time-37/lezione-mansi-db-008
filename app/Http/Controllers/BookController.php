<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        //$books = ['dafsd', 'fsfsd'];
        $books = Book::all(); //Ottiene tutto i dati della collezione
        //$books = Book::latest()->get(); //Ottiene tutto i dati della collezione
        //$books = Book::orderBy('name', 'ASC')->get(); //Ottiene tutto i dati della collezione

        return view('index', ['books' => $books]);
    }
    public function create()
    {
        return view('create');
    }

    //public function show(Book $book) Injection
    public function show($book)
    {

        //Primo livello
        $book = Book::find($book);
        if (!$book) {
            abort(404);
        }
        //Secondo livello
        //$book = Book::findOrFail($book);
        return view('show', ['book' => $book]);
    }

    public function store(BookStoreRequest $request)
    {
        $path_image = ''; //Di default è vuota
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $name);
        }
        // //$books = ['dafsd', 'fsfsd','dfffd']; 
        //nemmeno ci arriva
        Book::create([
            'name' => $request->name,
            'pages' => $request->pages,
            'years' => $request->years,
            'image' =>  $path_image,
        ]); //Inserisce nella tabella i dati

        return redirect()->route('books.index');
    }
}
