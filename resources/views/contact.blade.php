@extends('layout')

@section('content')

<section>
    <h2>Nous contacter !</h2>
</section>

<section id="principale">
    <form method="POST" action="#">
        <label for="motif">Motif</label>
        <select name="motif" id="motif">
            <option value="">sélectionner un motif</option>
            <option value="motif1">motif 1</option>
            <option value="motif2">motif 2</option>
        </select>
        <label for="nom">Nom</label>
        <input type="text" name="nom" placeholder="Nom">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" placeholder="Prenom">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email">
        <label for="message">Message</label>
        <textarea name="message" id="message" cols="80" rows="10" placeholder="Votre message"></textarea>
        <input type="submit" name="submit" value="Envoyer">
    </form>
    <div class="carte">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1016.492368333706!2d5.938709361145863!3d43.12096107324639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c91b0a6b2cea6f%3A0xa865e0843e39d84e!2sIUT%20MMI!5e0!3m2!1sfr!2sfr!4v1717080144581!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <h6>Université de Toulon - CS 60584 - 83041 TOULON CEDEX 9</h6>
    </div>
</section>

@endsection