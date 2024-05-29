@extends('layout')

@section('content')
<div>
    <h2>Mon compte</h2>
    <p>Historique des réservations :</p>
    <p>Réservation en cours :</p>
    <table>
        <tr>
            <th>Titre</th>
            <th>Type de document</th>
            <th>Auteur/réalisateur</th>
            <th>Nombre d'exemplaire</th>
        </tr>
        <tr>
            <td>Titanic</td>
            <td>Film</td>
            <td>James Cameron</td>
            <td>3</td>
        </tr>
        <tr>
            <td>Harry Potter</td>
            <td>Livre</td>
            <td>JK Rowling</td>
            <td>4</td>
        </tr>
    </table>
    <p>Réservations en passés :</p>
    <table>
        <tr>
            <th>Titre</th>
            <th>Type de document</th>
            <th>Auteur/réalisateur</th>
            <th>Nombre d'exemplaire</th>
        </tr>
        <tr>
            <td>Titanic</td>
            <td>Film</td>
            <td>James Cameron</td>
            <td>3</td>
        </tr>
        <tr>
            <td>Harry Potter</td>
            <td>Livre</td>
            <td>JK Rowling</td>
            <td>4</td>
        </tr>
    </table>
</div>
<div>
    <h2>Details du compte</h2>
    <ul>
        <li>Nom Prénom</li>
        <li>adresse@mail.com</li>
        <li>000 rue de l’adresse</li>
        <li>Toulon</li>
    </ul>
    <button>ÉDITER <i class="fa-solid fa-arrow-right" style="color: #6887f6;"></i></button>
</div>
@endsection