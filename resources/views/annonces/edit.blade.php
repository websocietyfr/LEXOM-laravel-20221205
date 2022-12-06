@extends('layouts.app')

@section('title', 'Modification de l\'annonce')

@section('content')
    @include('annonces._form', [ 'name' => $annonce['name'], 'description' => $annonce['description'] ])
@endsection
