@extends('layouts.app')

@section('content')
<h1>Résultats de la recherche</h1>

@if($results->isEmpty())
<p>Aucun résultat trouvé.</p>
@else
<ul>
    @foreach($results as $result)
    <li>{{ $result->name }}</li>
    @endforeach
</ul>
@endif
@endsection