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
        <form method="GET" action="{{ route('route.form') }}">
            @csrf
            <input name="url" id="url" placeholder="url" type="text">
            <input name="email" id="email"  placeholder="email" type="text">
            <input name="password" id="password"  placeholder="password" type="password">
            <input type="submit" value="send">
        </form>

        @if(!empty($response))
            <p>{{ $response }}</p>
        @endif
    </body>
</html>
