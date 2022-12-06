<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Bienvenue !') | MonAnnonce</title>
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
    <main>
        @yield('content')
    </main>
    <footer>
        <div>Section1</div>
        <div>Section2</div>
        <div>Section3</div>
        <div>Section4</div>
    </footer>
    @stack('script')
</body>
</html>
