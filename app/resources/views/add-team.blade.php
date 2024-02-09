<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Team</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
    <form method="GET" action="{{ route('teams.store') }}">
        @csrf

        <label for="name">Nom de l'équipe :</label>
        <input name="name" id="name" placeholder="Nom de l'équipe" type="text">

        @error('name')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <input type="submit" value="Créer l'équipe">
    </form>
    </body>
</html>
    