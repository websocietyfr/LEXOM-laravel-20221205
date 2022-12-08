@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
    <form action="{{ route('authentication') }}" method="POST">
        @csrf
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" placeholder="Email de connexion" value="{{ old('email') }}" required/>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required/>
        <input type="submit" value="Connexion" @class(['btn', 'btn-primary']) />
    </form>
@endsection
