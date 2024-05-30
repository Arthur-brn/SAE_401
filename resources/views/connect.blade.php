@extends('layout')

@section('content')
<section>
    <p>TELOCULTURE</p>
    <form id="connect-form">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <button type="submit">Se connecter</button>
    </form>
</section>
@endsection