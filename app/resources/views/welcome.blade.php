<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="flex flex-col min-h-screen sm:pt-0 bg-gray-900 dark:bg-gray-900">
        <h1 class="text-gray-100 mb-4 text-4xl text-center font-extrabold leading-none tracking-tight dark:text-white">Gestionnaire de mot de passe ;)</h1>
            <div class="flex grow flex-row sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900 dark:bg-gray-900">
                <a class="text-gray-100" href="{{ route('register') }}">Sign in</a>
                <a class=" m-4 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" href="{{ route('login') }}">Log in</a>
            </div>
        </div>
    </body>
</html>

