@extends('layouts.app')

@section('title', 'Annonce ' . $annonce['name'])

@section('content')
    <h1>{{ $annonce['name'] }}</h1>
    <p>{{ $annonce['description'] }}</p>
@endsection
