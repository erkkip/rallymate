<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rally Mate</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/js/app.js'])
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('rallies.list') }}" wire:navigate>
                <img src="/assets/img/logo.jpg" alt="RallyMate" class="rounded" width="75" height="75">
            </a>
        </div>
    </nav>
    <div class="container my-5">
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <x-toaster-hub />
</body>
</html>
