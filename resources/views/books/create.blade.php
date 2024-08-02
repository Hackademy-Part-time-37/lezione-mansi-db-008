<x-main>
    <div class="container">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" id="name" value="{{ old('name') }}" name="name" type="text">
                <label for="name">Nome</label>
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="pages" value="{{ old('pages') }}" name="pages" type="text">
                <label for="pages">Pagine</label>
                @error('pages')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="years" value="{{ old('years') }}" name="years" type="text">
                <label for="years">Anno di pubblicazione</label>
                @error('years')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-3">

                <input class="form-control" id="image" name="image" value type="file">

            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Salva</button>
            </div>
        </form>

    </div>

</x-main>
