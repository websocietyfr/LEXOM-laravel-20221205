@extends('layouts.app')

@section('title', 'Modification de l\'annonce')

@section('content')
    @include('annonces._form', [ 'name' => $annonce->name, 'description' => $annonce->description, 'price' => $annonce->price, 'action' => route('annonce.update', [ 'annonce' => $annonce->id ]), 'verb' => 'PUT', 'submit' => 'Mettre à jour l\'annonce' ])

    <form action="{{ route('annonce.destroy', [ 'annonce' => $annonce->id ]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Supprimer l'annonce" />
    </form>
@endsection
