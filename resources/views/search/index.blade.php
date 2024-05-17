@extends('layouts.app')

@section('content')
<h1>Recherche</h1>

<form action="{{ route('search.results') }}" method="GET">
    <input type="text" name="query" placeholder="Rechercher...">
    <button type="submit">Rechercher</button>
</form>
@endsection