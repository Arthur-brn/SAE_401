@extends('layout')

@section('content')
<h2>Votre Panier</h2>

<div class="panier-container"></div>
<div class="panier-vide" style="display: none;">
    <p>Le panier est vide.</p>
</div>

<button id="btn-reserver">Réserver !
</button>
@endsection