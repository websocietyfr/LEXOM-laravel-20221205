@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <a href="{{ route('annonce.create') }}" @class(['btn', 'btn-success'])>Ajouter une nouvelle annonce</a>
    <ul>
        @foreach ($annonces as $annonce)
            <li><a href="{{ route('annonce.show', [ 'annonce' => $annonce->id ]) }}">{{ $annonce->name }}</a></li>
        @endforeach
    </ul>
@endsection
