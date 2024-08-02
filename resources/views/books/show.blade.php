<x-main>
    <div class="container">
        <h5>ID: {{ $book->id }}</h5>
        <h1>Nome: {{ $book->name }}</h1>
        <h3>Creato Il: {{ $book->created_at }}</h3>
        <h3>Modificato Il: {{ $book->updated_at }}</h3>
        <p>Pagine Totali: {{ $book->pages }}</p>
        <p>Anno di Scrittura: {{ $book->years }}</p>
        <img src="{{ Storage::url($book->image) }}" />
    </div>

</x-main>
