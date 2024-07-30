<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


</head>

<body>
    <div class="container">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Nome" />
            @error('name')
                {{ $message }}
            @enderror
            <input type="text" name="pages" placeholder="Pagine" />
            <input type="text" name="years" placeholder="Anno" />
            <input name="image" type="file" />

            <button type="submit">Salva</button>
        </form>
    </div>
</body>

</html>
