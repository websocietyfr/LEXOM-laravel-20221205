<h1>{{ $title }}</h1>
<ul>
    @foreach ($annonces as $annonce)
        <li>{{ $annonce['name'] }}</li>
    @endforeach
</ul>
