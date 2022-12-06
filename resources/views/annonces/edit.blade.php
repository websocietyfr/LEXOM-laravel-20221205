@extends('layouts.app')

@section('title', 'Modification de l\'annonce')

@section('content')
    <form action="" method="">
        <input type="text" name="name" value="{{ $annonce['name'] }}" />
        <textarea name="description">{{ $annonce['description'] }}</textarea>
        <input type="submit" value="Enregistrer l'annonce" />
    </form>
@endsection
