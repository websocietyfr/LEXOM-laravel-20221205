@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <ul>
        @foreach ($annonces as $annonce)
            @if($annonce['status'])
                <li>{{ $annonce['name'] }}</li>
            @endif
        @endforeach
    </ul>
@endsection
