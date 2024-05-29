@extends('layout')

@section('content')
<div>
    <h2>Mon Compte</h2>
    <p><b>Historique des réservations :</b></p>
    <p>Emprûnts en cours :</p>
    <table id="currentTable">
        <thead>
            <tr>
                <td>Nom du document</td>
                <td>Date de réservation</td>
                <td>Date de rendu</td>
                <td>Numéro de réservation</td>
            </tr>
        </thead>
    </table>
    <p>Emprûnts passées :</p>
    <table id="passedTable">
        <thead>
            <tr>
                <td>Nom du document</td>
                <td>Date de réservation</td>
                <td>Date de rendu</td>
                <td>Numéro de réservation</td>
            </tr>
        </thead>
    </table>
</div>
<div>
    <h2>Détails du compte</h2>
    <p id="userName"></p>
    <p id="userMail"></p>
    <p id="userAddress"></p>
    <button>Editer</button>
    <button id="deconnect">Me déconnecter</button>
</div>
@endsection