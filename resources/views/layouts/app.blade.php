<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Bienvenue !') | MonAnnonce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @stack('style')
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>Accueil</li>
                <li>Mes annonces</li>
                <li>Connexion</li>
            </ul>
        </nav>
    </header>
    <div>
        @include('_errors')
    </div>
    <main>
        @yield('content')
    </main>
    <footer>
        <div>Section1</div>
        <div>Section2</div>
        <div>Section3</div>
        <div>Section4</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    @stack('script')
</body>
</html>
