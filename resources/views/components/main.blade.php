<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column h-100">
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <x-navbar />
        </header>
    </div>
    <main>
        <div class="container mt-5">
            {{ $slot }}
        </div>
    </main>
</body>

</html>
