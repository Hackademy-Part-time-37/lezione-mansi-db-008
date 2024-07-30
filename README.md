# Step by Step
### Model e Migration
1. Creo un nuovo progetto con `laravel new nome-progetto`
2. Seleziono MySql e poi su NO
3. Lancio `php artisan serve` in un nuovo terminale
4. Apro un nuovo terminale, installo e lancio `npm i bootstrap` e successivamente `npm run dev`
5. Creo un componente Layout e ci importo Bootstrap dentro con`@vite([resources/css/app.css','resources/js/app.js`
6. Apro TablePlus e creo il database del progetto (Memorizzo il nome del DB);
7. Configuro il Database dentro il file `.env`

```

DB_CONNECTION=mysql 
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_del_DB (il nome usato al punto 6)
DB_USERNAME=tuo_username (solitamente root)
DB_PASSWORD=tua_password (solitamente rootroot)
```

8. Creo la migrazione per la tabella `books` con il comando `php artisan make:migration create_books_table` e vado ad aggiungere 2 colonne nel metodo `up()`:
    
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
### File Upload & Validation Rules

1. Crea una nuova migrazione, questa volta di modifica tabella con `php artisan make:migration add_to_books_table`
2. Aggiungi una colonna nuova relativa all'immagine di copertina  nel metodo `up()` e il `dropColumn` nel metodo `down()`:
    
    ```php
     public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
    ```
3. Aggiungi la nuova colonna negli attributi `$fillable` del Model Book    
4. Lancia la modifica della tabella con `php artisan migrate`
5. Definisci le rotte facendo attenzione ad utilizzare la nomenclatura corretta anteponendo il nome del model avanti al metodo (book.index ad esempio):

```php 
Route::get('/libri', [BookController::class, 'index'])
  ->name('books.index');

Route::get('/libri/create', [BookController::class, 'create'])
  ->name('books.create');

Route::post('/libri/store', [BookController::class, 'store'])
  ->name('books.store');

Route::get('/libri/{book}/show', [BookController::class, 'show'])
  ->name('books.show');
```
6. Se non lo hai ancora fatto, crea il controller `BookController` con il comando `php artisan make:controller BookController`
7. Scrivi i 4 metodi nel controller:
    - index: Recupera tutti i libri con Book::all();
    - create: Un semplice form;
    - store: L’azione da eseguire quando si clicca su salva;
    - show: una pagina di dettaglio per visualizzare il dato singolo
8. Crea le view relative utilizzando un layout ed eventualmente dei componenti per creare una struttura responsive con Bootstrap 5.
    - books/index
    - books/create
    - books/show
    - components/main
    - components/navbar
9. Crea una Request Class chiamata BookStoreRequest per validare i dati inseriti con il comando `php artisan make:request BookStoreRequest` (ricordati di autorizzare il metodo `authorize()`)
10. Inserisci le `rules()` nella classe appena dichiarata e iniettala nel metodo `store()` di `BookController`

```php
    public function store(BookRequest $request)
    {
        //
    }
```
11. Inserisci nel form  `create`  l’enctype e il campo input file
12. Gestisci l’immagine nel controller e utilizza lo `storeAs()` per salvarlo con un nome e un percorso personalizzato
13. Inserisci il path_name nel `Book::create([])`
14. Lancia il comando `php artisan storage:link` per creare il collegamento con la cartella storage
15. Nella view della card utilizza l’helper di Blade `{{Storage::url($book→image)}}` 
