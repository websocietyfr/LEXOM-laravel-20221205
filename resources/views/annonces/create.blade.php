@extends('layouts.app')

@section('title', 'Créer un nouvelle Annonce')

@section('content')
    @include('annonces._form', [ 'action' => route('annonce.store'), 'name' => $name, 'description' => $description, 'price' => $price ])
@endsection
