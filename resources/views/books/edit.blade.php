<x-main>
    <div class="container">
        <form action="{{ route('books.update', ['book' => $book]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">

                <input class="form-control" id="name" value="{{ $book->name }}" name="name" type="text">
                <label for="name">Nome</label>
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="pages" value="{{ $book->pages }}" name="pages" type="text">
                <label for="pages">Pagine</label>
                @error('pages')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="years" value="{{ $book->years }}" name="years" type="text">
                <label for="years">Anno di pubblicazione</label>
                @error('years')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-3">
                <img height="100" src="{{ Storage::url($book->image) }}" />
                <input class="form-control" id="image" name="image" value type="file">

            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Aggiorna</button>
            </div>
        </form>

    </div>

</x-main>
