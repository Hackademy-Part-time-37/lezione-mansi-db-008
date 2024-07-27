# Step by Step
### Model e Migration
1. Creo un nuovo progetto con `laravel new nome-progetto`
2. Seleziono MySql e poi su NO
2. Lancio `php artisan serve` in un nuovo terminale
3. Apro un nuovo terminale, installo e lancio `npm i bootstrap` e successivamente `npm run dev`
4. Creo un componente Layout e ci importo Bootstrap dentro con`@vite([resources/css/app.css','resources/js/app.js`
5. Apro TablePlus e creo il database del progetto (Memorizzo il nome del DB);
6. Configuro il Database dentro il file `.env`

```

DB_CONNECTION=mysql 
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_del_DB (il nome usato al punto 5)
DB_USERNAME=tuo_username (solitamente root)
DB_PASSWORD=tua_password (solitamente rootroot)
```

7. Creo la migrazione per la tabella `books` con il comando `php artisan make:migration create_books_table`
8. Vado ad aggiungere 2 colonne nel metodo `up()`:
    
    ```php
    $table->string('name');
    $table->integer('years')->nullable();
    ```
    
9. Lancio la creazione della tabella con `php artisan migrate`
10. Ho dimenticato di aggiungere la colonna `pages`, quindi lancio il comando: `php artisan make:migration add_to_books_table` e aggiungo la colonna nel metodo `up()`

```php
$table->integer('pages')->nullable();
```

E nel metodo `down()`;
```php
$table->dropColumn('pages');
```
11. Lancio la creazione della tabella con `php artisan migrate`


12. Creo il controller `BookController` con il comando `php artisan make:controller BookController`
13. Definisco 2 metodi cosi dichiarati:
    - index(): Per visualizzare la lista di tutti i libri con Book::all();
    - store(): Il metodo per salvare momentaneamente i dati in GET
14. Definisco il metodo `index` 

```php
public function index()
{ 
    $books = Book::all(); 
    return view('index', ['books' => $books]);
}
```
15. Definisco il metodo `store` 

```php
public function store()
{ 
    Book::create(['name' => 'Aulab']); 
    return redirect()->route('index');
}
```
16. Definisco le rotte in `web.php`:

```php
  Route::get('/books', [BookController::class, 'index'])->name('books.index');
  Route::get('/books/store', [BookController::class, 'store'])->name('books.store');
``` 

17. Crea la view relative utilizzando un layout ed eventualmente dei componenti per creare una struttura responsive con Bootstrap 5.
    - books/index
    - components/layout (Dovresti averlo gia creato nel punto 5)
    - components/navbar 

18. Aggiungo le nuova colonna negli attributi `$fillable` del Model appena creato Book
```php artisan make:model Book ```

```php
  protected $fillable = [
        'name',  'pages', 'years'
    ];
```