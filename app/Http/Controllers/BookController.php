<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
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

        return view('books.index', ['books' => $books]);
    }
    public function create()
    {
        return view('books.create');
    }

    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    public function show(Book $book)
    //public function show($book)
    {

        //Primo livello
        // $book = Book::find($book);
        // if (!$book) {
        //     abort(404);
        // }
        //Secondo livello
        //$book = Book::findOrFail($book);
        return view('books.show', ['book' => $book]);
    }
    public function update(BookUpdateRequest $request, Book $book)
    {

        $path_image = $book->image; //Di default è vuota
        if ($request->hasFile('image')) {
            //qui cancelliamo immagine vecchia
            $name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $name);
            //$path_image = $request->file('image')->store('public/images');
        }



        $book->update([
            'name' => $request->name,
            'years' => $request->years,
            'pages' => $request->pages,
            'image' => $path_image
        ]);

        return redirect()->route('books.index')->with('success', 'Libro modificato con successo');;
    }
    public function store(BookStoreRequest $request)
    {

        $path_image = ''; //Di default è vuota
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $name);
            //$path_image = $request->file('image')->store('public/images');
        }
        // //$books = ['dafsd', 'fsfsd','dfffd']; 
        //nemmeno ci arriva
        Book::create([
            'name' => $request->name,
            'pages' => $request->pages,
            'years' => $request->years,
            'image' =>  $path_image,
        ]); //Inserisce nella tabella i dati

        return redirect()->route('books.index')->with('success', 'Libro creato con successo');
        //return to_route('books.index')->with('success', 'Libro creato con successo');
    }

    public function destroy(Book $book)
    {
        //$book->image; cancellare immagine
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminato con successo');;
    }

    // protected function deleteImage(Book $book){

    // }
}
