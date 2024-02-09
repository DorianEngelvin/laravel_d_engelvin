<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Password</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        <form method="POST" action="{{ route('add-password') }}">
            @csrf
            <input name="url" id="url" placeholder="url" type="text">
            <input name="login" id="login"  placeholder="login" type="text">
            <input name="password" id="password"  placeholder="password" type="password">
            <input type="submit" value="send">
        </form>
    </body>
</html>
    