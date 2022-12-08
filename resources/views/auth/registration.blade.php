@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" />
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" />
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" />
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" />
        <label for="password_confirmation">Confirmation de mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" />
        <input type="submit" class="btn btn-success" value="Inscription" />
    </form>
@endsection
