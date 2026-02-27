<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield(section: 'title')</title>
</head>
<body>
    <header>
        My site header
    </header>

    [Parent]
    <main>
        @yield(section: 'main')
    </main>
    [Parent]

    <footer>
        My site footer
    </footer>
</body>
</html>