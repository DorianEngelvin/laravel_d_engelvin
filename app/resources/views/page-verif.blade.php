<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        @foreach (Session::get('jsonData') as $data)
            <p>{{ $data["url"] }}</p>
            <p>{{ $data["email"] }}</p>
            <p>{{ $data["password"] }}</p>
        @endforeach
    </body>
</html>